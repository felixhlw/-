<?php
include_once "../base.php";
$subj['text']=$_POST['subj'];
$subj['parent']=0;
$subj['count']=0;
save("que",$subj);

$parentid=q("select max(id) from que")[0][0];
foreach ($_POST['items'] as $i) {
    $items['text']=$i;
    $items['count']=0;
    $items['parent']=$parentid;
    save("que",$items);

}
to("../admin.php?do=que");





?>