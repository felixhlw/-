<?php
include_once "../base.php";
$email=$_POST['email'];
$chk=nums("user",["email"=>$email]);
if ($chk>0) {
    $info=find("user",["email"=>$email]);
    echo "您的帳號是: ".$info['acc'].
         "<br>您的密碼是: ".$info['pw'];

}else{
    echo "查無此信箱資料!";
}



?>