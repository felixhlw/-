<style>
.line{
    display: inline-block;
}
.stripe{
    /* display: block; */
    background: lightgray;
    /* width: 300px; */
    height: 30px;
    vertical-align:middle;

}
.item{
    width:40%;
}


</style>
<fieldset>

<?php
include_once "./base.php";
$subjid=$_GET['id'];
$subj=find("que",["id"=>$_GET['id']]);
$items=all("que",["parent"=>$subjid]);
?>

<legend>目前位置：首頁 > 問卷調查 > <?=$subj['text'];?></legend>


    <h3><?=$subj['text'];?></h3>
    
    <?php
    $total=($subj['count']>0)?$subj['count']:1;
    foreach ($items as $k => $i) {
        $rate=round(($i['count']/$total)*100)/100;
        ?>
        <div>
            <div class="line item"><?=($k+1).'.'.$i['text'];?></div class="line">
            <div class="line stripe" style="width:<?=($rate*45)."%";?>"></div>
            <div class="line"><?=$i['count'];?>票(<?=($rate*100)."%";?> )</div>
        </div>

    <?php
    }
    ?>
    <br>
    <div class="ct"><button onclick="location.href='index.php?do=que'">返回</button></div>
    <!-- <div class="ct"><button onclick="javascript:location.href='index.php?do=que'">返回</button></div> -->

</fieldset>