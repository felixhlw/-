<style>

fieldset{
	display: inline-block;
	vertical-align: top;
}

li{

	list-style-type: none;
	color: blue;
}

</style>
<div>目前位置：首頁 > 分類網誌 > <span id="nav"></span></div>
<table>
	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
<fieldset class="title" style="width: 15%;text-align:left;cursor:pointer">
<legend>網誌分類</legend>
	<li data-sort="1">健康新知</li>
	<li data-sort="2">菸害防治</li>
	<li data-sort="3">癌症防治</li>
	<li data-sort="4">慢性病防治</li>
</fieldset >

<fieldset style="width: 72%;">
<legend>文章列表</legend>
<div class="list" style="cursor: pointer"></div>

</fieldset>

<script>
$(".title li").on("click",function(){
	let sort=$(this).data("sort")
	$("#nav").text($(this).text())
	getList(sort)
})	
getList(1)

function getList(sort){

	$.get("./api/getnews.php",{sort},function(res){
		$(".list").html(res)
			$(".list div").on("click",function(){
			let id=$(this).data("id")
			$.get("./api/getnews.php",{id},function(res){
				$(".list").html("")
				$(".list").html(res)
			})
		})
				
	})
}	


</script>