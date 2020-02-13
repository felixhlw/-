<?php include_once "./base.php"; ?>
<fieldset style="width: 50%;margin:auto">
<legend>帳號管理</legend>
<form action="./api/userdel.php" method="post">
    <table class="ct" width="100%">
        <tr class="clo">
            <td >帳號</td>
            <td >密碼</td>
            <td >刪除</td>
        </tr>
        <?php
        $user=all("user");
        foreach ($user as $u) {
        ?>     
        <tr>
            <td><?=$u['acc'];?></td>
            <td><?=str_repeat("*",mb_strlen($u['pw']));?></td>
            <td><input type="checkbox" name="del[]" id="" value="<?=$u['id'];?>"></td>
        </tr>
    <?php
    }
    ?>
    </table>
    <div class="ct">
        <br>
        <input type="submit" value="確認刪除">
        <input type="reset" value="清空選取">
    </div>

    </form>

    <h1>新增會員</h1>

    <div style="color: red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>

<table>
    <tr>
        <td>Step 1: 登入帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td>Step 2: 登入密碼</td>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td>Step 3: 再次確認密碼</td>
        <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
        <td>Step 4: 信箱(忘記密碼時使用)</td>
        <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
        <td><button id="reg">註冊</button>
        <button id="reset">清除</button></td>
        <td></td>
    </tr>
</table>
</fieldset>

<script>
$("#reset").on("click",function(){
    $("#acc,#pw,#pw2,#email").val("")
})

$("#reg").on("click",function(){
    let acc=$("#acc").val()
    let pw=$("#pw").val()
    let pw2=$("#pw2").val()
    let email=$("#email").val()
    if (acc.length>12) {
        alert("帳號超過12個字元!")
    }else{
        if(acc=="" || pw=="" || pw2=="" || email==""){
            alert("不可空白!")
        }else{
            $.post("./api/chkacc.php",{acc},function(sta){
                if(sta===1){
                    alert("帳號已被註冊!")
                }else{
                    if (pw==pw2) {
                        $.post("./api/reg.php",{acc,pw,email},function(sta){
                        console.log(status);
                            if (sta==1) {
                                alert("註冊成功，歡迎加入!")
                                location.reload();
                            }
                        })
                    }else{
                        alert("密碼不一致喔!")
                    }

                }
            })
        }
    }
})


</script>   

