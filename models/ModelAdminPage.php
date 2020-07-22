<?php


class ModelAdminPage
{
    private $db;

    public  function __construct()
    {
        include_once ROOT . "/components/Db.php";
        $this->db = new Db();
    }
    public  function JSON_File(){

        $current = file_get_contents(ROOT . '/views/ViewAdminPage/logInfo.json');
        echo json_encode($current);
    }

}