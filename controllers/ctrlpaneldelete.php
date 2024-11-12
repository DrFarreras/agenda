<?php 

function ctrlpaneldelete($users){
    if (isset($_GET['id'])){
        $id = (int)$_GET["id"];
        $users->delete($id);
        
        header(header: "Location: index.php?r=dashboard&deleted=$id");
        exit;
    } else {
        header("Location: index.php?r=dashboard&error=invalid_id");
        exit;
    }
}