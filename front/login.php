<?php
include_once "./base.php";

?>

<fieldset style="width: 50%;margin:auto">

<legend>會員登入</legend>
<table>
    <tr>
        <td columspan="2">帳號: </td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td columspan>密碼: </td>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td><button id="login">登入</button>
        <button id="reset">清除</button></td>
        <td><a href="?do=find_pw">忘記密碼</a> | <a href="?do=reg">尚未註冊</a> </td>
    </tr>
</table>

</fieldset>
<script>
$("#reset").on("click",function(){
    $("#acc,#pw").val("")
})

$("#login").on("click",function(){
    let acc=$("#acc").val()
    let pw=$("#pw").val()
    $.post("./api/chkacc.php",{acc},function(sta){
        console.log(sta)
        if (sta=="1") {
            $.post("./api/chkpw.php",{acc,pw},function(chk){
                if (chk=="1") {
                    if (acc=='admin') {
                        alert(`歡迎，${acc}你好，登入成功!`)
                        location.href="admin.php"

                    }else{
                        alert(`歡迎，${acc}你好，登入成功!`)
                        location.href="index.php"
                    }
                }else{
                    alert("密碼錯誤，請確認輸入是否正確!")
                    $("#pw").val("")
                }
            })
            
        }else{
            alert('查無此帳號，請確認輸入是否正確!')
            $("#acc,#pw").val("")
        }


        
    })
})


</script>