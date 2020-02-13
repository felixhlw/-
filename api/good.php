<?php
include_once "../base.php";

$news=find("news",$_POST['id']);
if($_POST['type']=='1'){
    $log['news']=$_POST['id'];
    $log['user']=$_POST['user'];
    $news['good']=$news['good']+1;
    save("log",$log);
    echo "1";
    save("news",$news);

}else{
    $log['news']=$_POST['id'];
    $log['user']=$_POST['user'];
    del("log",$log);
    echo "0";
    if ($news['good']>0) {
        $news['good']=$news['good']-1;
    }
    save("news",$news);

}


?>