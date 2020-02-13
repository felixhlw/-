<?php
include_once "../base.php";

$id=$_POST['id'];
$data=find("que",$id);
$data['sh']=($data['sh']==1)?0:1;
if ($data['sh']==1) {
    echo 1;
}else{
    echo 0;
}
save("que",$data);


?>