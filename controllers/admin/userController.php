<?php
require __DIR__ . '/../../models/admin/adminModel.php';

class userController {
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
        $m = new adminModel($_GET["tablename"]);
        $m->insertOne('router.php?controller=index&section=admin');
    }

    function editview(){
        $m = new adminModel($_GET["tablename"]);
        $m->editOne($_GET["id"], 'router.php?controller=index&section=admin');
    }

    function deleteview(){
        $m = new adminModel($_GET["tablename"]);
        $m->deleteOne($_GET["id"], 'router.php?controller=index&section=admin');
    }
}
