<?php
include_once "../base.php";

    foreach ($_POST['id'] as $id) {
        if (!empty($_POST['del']) && in_array($id,$_POST['del'])) {
            del("news",$id);
            
        }else{
             $data=find("news",$id);
             $data['sh']=(in_array($id,$_POST['sh']))?1:0;
             save("news",$data);
            }
    }
    to("../admin.php?do=news")


?>