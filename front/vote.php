<fieldset>

<?php
include_once "./base.php";
$subjid=$_GET['id'];
$subj=find("que",["id"=>$_GET['id']]);
$items=all("que",["parent"=>$subjid]);
?>

<legend>目前位置：首頁 > 問卷調查 > <?=$subj['text'];?></legend>

<form action="./api/vote.php" method="post">
    <h3><?=$subj['text'];?></h3>
    
    <?php
    foreach ($items as $k => $i) {
    ?>
        <div>
            <input type="radio" name="items"  value="<?=$i['id'];?>"> <?=$i['text'];?>
        </div>
    <?php
    }
    ?>
    <input type="submit" value="我要投票">
</form>


</fieldset>