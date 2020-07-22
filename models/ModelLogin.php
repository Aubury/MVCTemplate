<?php


class ModelLogin
{
    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();

    }
//---------------------------------------------------------------------------------------------------------------------------------
    public function dbSelect($obj, $name, $table){

        $prep = $this->db->con->prepare("SELECT * FROM  `$table` WHERE `$name` = '{$obj[$name]}'");
        $prep->execute();
        return  $prep->fetchAll();

    }

//------------------------------------------------------------------------------------------------------------------------------
    public function getIn($arr)
    {
//       echo var_dump($arr);

        $admin = $this->dbSelect($arr,'login', 'admin');

        if(count($admin)>0){

            if($admin[0]['password'] == $arr['password']){

                $str = $this->db->con->prepare("UPDATE `admin` SET `last_visit`= NOW() WHERE `login`='{$arr['login']}'");
                $str->execute();


                echo json_encode([
                    SITE . "/show/Admin",
                    $this->addUserLog($admin[0], 'adm')]);

                }else{

                    echo json_encode("Проверьте введенные данные");
                }

        }else{

            echo json_encode("Такого пользователя нет");

        }

    }
    private function addUserLog($user, $tab){

        $log = $this->db->con->prepare("SELECT * FROM `login` WHERE `admin_id` = '{$user['id']}'");
        $log->execute();
        $arr = $log->fetchAll();

        if(count($arr) == 0){

            $uPd = password_hash(time() . $user['login'], PASSWORD_BCRYPT);
            $strInsert = "INSERT INTO `login`(`table`, `name`, `admin_id`, `uPd`)
                                 VALUES ('{$tab}','{$user['name']}', '{$user['id']}', '${uPd}')";
            $this->db->con->exec($strInsert);

            $logIn = $this->db->con->prepare("SELECT * FROM `login` WHERE `admin_id` = '{$user['id']}'");
            $logIn->execute();
            $arrIn = $logIn->fetchAll();

            file_put_contents(ROOT . '/views/ViewAdminPage/logInfo.json', $arrIn);
            return [$tab, $user['name'], $user['id'], $uPd];

        }else{

            file_put_contents(ROOT . '/views/ViewAdminPage/logInfo.json', $arr);
            return [$arr[0]['table'], $arr[0]['name'], $arr[0]['id'], $arr[0]['uPd']];

        }
    }

}