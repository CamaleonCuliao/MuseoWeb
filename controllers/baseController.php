<?php
require __DIR__ . '/../../models/model.php';

class baseController {
    function showIndex() {
        require __DIR__ . '/../../config/helpers.php';

        $db = new DB();
        $stm = $db->selectAll($_GET["tablename"]);

        require __DIR__ . '/../../view/admin/viewIndex.php';
    }

    function showInsert(){
        require __DIR__ . '/../../config/helpers.php';

        $db = new DB();
        $stm = $db->selectAll($_GET["tablename"]);

        require __DIR__ . '/../../view/admin/viewInsert.php';
    }

    function showEdit(){
        require __DIR__ . '/../../config/helpers.php';

        $db = new DB();
        $stm = $db->selectAll($_GET["tablename"]);

        require __DIR__ . '/../../view/admin/viewEdit.php';
    }

    function showDelete(){
        require __DIR__ . '/../../view/admin/viewDelete.php';
    }

    function createview(){
        $m = new model($_GET["tablename"]);
        $m->insertOne();
    }

    function editview(){
        $m = new model($_GET["tablename"]);
        $m->editOne($_GET["id"]);
    }

    function deleteview(){
        $m = new model($_GET["tablename"]);
        $m->deleteOne($_GET["id"]);
    }
}
