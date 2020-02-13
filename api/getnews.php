<?php
include_once "../base.php";

if (!empty($_GET['sort'])) {
    $sort=$_GET['sort'];
    
    $news=all("news",["sort"=>$sort]);
    foreach ($news as $key => $n) {
        echo "<div data-id='".$n['id']."'>".$n['title']."<br></div>";
    }
    
}else{

    $id=$_GET['id'];
    $doc=find("news",["id"=>$id]);
    echo "<pre>".$doc['body']."</pre>";

}

?>