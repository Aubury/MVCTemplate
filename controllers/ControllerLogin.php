<?php


class ControllerLogin
{
  private  $v, $m;

  public function __construct()
    {
        include_once ROOT . "/views/ViewLogin/ViewLogin.php";
        include_once ROOT . "/models/ModelLogin.php";
        $this->v = new ViewLogin();
        $this->m = new ModelLogin();
    }

    public function actionShowLogIn()
    {
        $this->v->showLogIn();
    }

    public function actionLogIn()
    {
        $obj = [
            'email'   => $_POST['email'],
            'password'=> $_POST['password']
        ];
        $this->m->getIn($obj);
    }
    public function actionExit()
    {
        $obj = [
            'id'    => $_POST['id'],
            'table' => $_POST['table']
        ];

        $this->m->ExitSite($obj);
    }

}