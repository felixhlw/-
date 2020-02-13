<style>
.gray{
    background: lightgray;
}
</style>
<?php
$subj=all("que",['parent'=>"0"]);
?>
<div><button onclick="javascript:location.href='admin.php?do=addque'">新增問卷</button></div>
<fieldset>
<legend>問卷列表</legend>
<table width="100%">
    <tr>
        <td class="clo ct" width="80%">問卷名稱</td>
        <td class="clo ct" width="10%">投票數</td>
        <td class="clo ct" width="10%">開放</td>
    </tr>
<?php
foreach ($subj as $key => $s) {
?>
    <tr>
        <td width="80%"><?=$s['text'];?></td>
        <td class="ct"><?=$s['count'];?></td>
        <td class="ct"><button class="sh<?=$s['id'];?>" onclick="qsh('<?=$s['id'];?>')"><?=($s['sh']==1)?"開放":"關閉";?></button></td>
    </tr>
<?php
}
?>
</table>

</fieldset>

<script>


function qsh(id){

	$.post("./api/qsh.php",{id},function(sta)
	{
		console.log(sta);
		
		if(sta=="1")
		{
			$(".sh"+id).text("開放").removeClass("gray").attr("onclick","qsh('"+id+"')")
		}
		else
		{
			$(".sh"+id).text("關閉").addClass("gray").attr("onclick","qsh('"+id+"')")
		}
	})
}
</script>

