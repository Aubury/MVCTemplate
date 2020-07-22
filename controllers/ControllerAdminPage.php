<?php


class ControllerAdminPage
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewAdminPage/ViewAdminPage.php";
        include_once  ROOT . "/models/ModelAdminPage.php";
        $this->v = new ViewAdminPage();
        $this->m = new ModelAdminPage();
    }

    public function actionShowAdminPage()
    {
        $this->v->showAdminPage();
    }
    public  function  actionJSON(){
        $this->m->JSON_File();
    }
}