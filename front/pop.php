<style>
.full{

	background: rgba(0,0,0,0.5);
	width: 300px;
	height:380px;
	color: white;
	display: none;
	overflow: auto;
	position: absolute;
	z-index: 999;
	top:35px;
	left: 10px;



}

</style>

<fieldset>
<legend>目前位置：首頁 > 人氣文章區</legend>

<form action="./api/editnews.php" method="post">
    <table class="ct" width="100%" style="margin: auto">
        <tr >
            <td width="40%">標題</td>
            <td>內容</td>
            <td width="40%">內容</td>
            <td width="20%"></td>
        </tr>
        <?php
        $total=nums("news");
        $div=5;
        $pages=ceil($total/$div);
        $now=(!empty($_GET['p']))?$_GET['p']:1;
        $start=($now-1)*$div;
        $news=all("news",["sh"=>1]," limit $start, $div");
    
        foreach ($news as $k => $n) {
        ?>
            <tr >
            
			<td class="clo title" style="cursor: pointer;"><?=$n['title'];?></td>
			<td width="40%" class="body" style="position:relative;">
				<div class="short">
					<?=mb_substr($n['body'],0,15)."...";?>
				</div>
				<div class="full" style="display:none;">
					<?=$n['body'];?>
				</div>
			</td>
            <td>
				<span id="vie<?=$n['id'];?>"><?=$n['good'];?></span> 個人說 <img src="./icon/02B03.jpg" alt="" style="width: 20px;">
				<?php
				if (!empty($_SESSION['user'])) {
					$chk=nums("log",["news"=>$n['id'],"user"=>$_SESSION['user']]);
					if ($chk>0) {
				?>
						<a id="good<?=$n['id'];?>" onclick="good('<?=$n['id'];?>','2','<?=$_SESSION['user'];?>')">收回讚</a>
				<?php						
					}else{
						?>	
					 	<a id="good<?=$n['id'];?>" onclick="good('<?=$n['id'];?>','1','<?=$_SESSION['user'];?>')">讚</a>

				<?php
					}
				}
				?>
			</td>
            </tr>
            <input type="hidden" name="id[]" value="<?=$n['id'];?>">
    <?php        
        }
        ?>
    </table>
    <div class="ct">

    <?php
        if(($now-1)>0){
            echo "<a href='index.php?do=news&p=".($now-1)."'> < </a>";
        }

        for ($i=1; $i <= $pages; $i++) { 
            $fontSize=($i==$now)?"26px":"18px";
            echo "<a href='index.php?do=news&p=$i' style='font-size:$fontSize'> ".$i." </a>";
        }

        if (($now+1)<= $pages) {
            echo "<a href='index.php?do=news&p=".($now+1)."'> > </a>";
        }
    ?>

    </div>

</form>
    

</fieldset>
<script>
$(".title").hover(function(){
	/* alert("test") */
	$(this).next("td").children(" .full").toggle()
})
$(".body").hover(function(){
	/* alert("test") */
	$(this).children(" .full").toggle()
})

</script>

