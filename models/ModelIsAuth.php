<?php


class ModelIsAuth
{

    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();
    }
    public function checkLog($uid, $upd, $tab)
    {
        $p = $this->db->con->prepare("SELECT * FROM `login` WHERE `admin_id`='{$uid}'");
        $p->execute();
        $arr = $p->fetchAll();

        if(count($arr) > 0)
        {
            if(hash_equals($upd, $arr[0]['uPd']) && $tab == $arr[0]['table'])
            {
                $this->lastVisit($uid);
                return true;
            }
        }
        return false;
    }
    //---------------------------------------------------------------------------------------------------------------------------------
    private  function lastVisit($obj)
    {
        $prep = $this->db->con->prepare("UPDATE `admins` SET `last_visit`= NOW() WHERE `id` = '${obj}'");
        $prep->execute();
    }

}