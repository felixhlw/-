<?php
include_once "../base.php";
$itemid=$_POST['items'];
$item=find("que",['id'=>$itemid]);
$subj=find("que",['id'=>$item['parent']]);
$subjid=$item['parent'];
$item['count']=$item['count']+1;
$subj['count']=$subj['count']+1;
save("que",$subj);
save("que",$item);


to("../index.php?do=result&id=$subjid");


?>
