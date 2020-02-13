
<fieldset style="width: 50%;margin:auto">
<legend>忘記密碼</legend>
<div>請輸入信箱以查詢密碼</div>
<input type="text" name="email" id="email">
<div id="res"></div>
<br>
<button id="find">尋找</button>


</fieldset>
<script>
$("#find").on("click",function(){
    let email=$("#email").val()
    $.post("./api/find_pw.php",{email},function(res){
        $("#res").html(res)
    })
})


</script>