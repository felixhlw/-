<?php
$subj=all("que",['parent'=>"0",'sh'=>1]);
?>
<fieldset>
<legend>目前位置：首頁 > 問卷調查</legend>
<table width="100%">
    <tr>
        <td class="clo ct" width="10%">編號</td>
        <td class="clo ct" width="50%">問卷題目</td>
        <td class="clo ct" width="10%">投票總數</td>
        <td class="clo ct" width="10%">結果</td>
        <td class="clo ct" width="20%">狀態</td>
    </tr>
<?php
foreach ($subj as $k => $s) {
?>
    <tr>	
        <td class="ct" width="10%" ><?=$k+1;?></td>
        <td class="ct" width="50%"><?=$s['text'];?></td>
        <td class="ct" width="10%"><?=$s['count'];?></td>
		<td class="ct" width="10%"><a href="index.php?do=result&id=<?=$s['id'];?>">結果</a></td>
		<td class="ct" width="20%">
		<?php
		if(empty($_SESSION['user'])){
			echo "<a href='index.php?do=login'>請先登入</a>";
		}else{
			?>
			<a href="index.php?do=vote&id=<?=$s['id'];?>">參與投票</a>
			<?php
		}
		?>
	</td>
    </tr>
<?php
}	
?>
</table>





</fieldset>