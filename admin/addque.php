<fieldset>
<legend>新增問卷</legend>
<form action="./api/addque.php" method="post">
    <table width="100%">
        <tr>
            <td class="clo">問卷名稱 </td>
            <td><input type="text" name="subj" ></td>
        </tr>
        <tr class="clo" >
            <td colspan="2" class="item">選項<input type="text" name="items[]" >
            <input type="button" value="更多" onclick="more()">
        </td>
            
        </tr>
    </table>
    <div>
        <input type="submit" value="新增"> | <input type="reset" value="清空">
    </div>
</form>


</fieldset>
<script>
    function more(){

        let items='選項<input type="text" name="items[]">'
        $(".item").prepend(items+"<br>")
    }


</script>