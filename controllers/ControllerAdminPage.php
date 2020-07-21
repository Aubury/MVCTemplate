<?php


class ControllerAdminPage
{
    private $v, $m;

    public function __construct()
    {
        include_once ROOT . "/views/ViewAdminPage/ViewAdminPage.php";
        $this->v = new ViewAdminPage();
    }

    public function actionShowAdminPage()
    {
        $this->v->showAdminPage();
    }
}