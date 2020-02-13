<fieldset>
<legend>新增文章</legend>

<form action="./api/addnews.php" method="post">
    <table class="ct" width="80%" style="margin: auto">
        <tr >
            <td >文章標題</td>
            <td class="lt" ><input type="text" name="title" id="title" style="width: 92%;"></td>
        </tr>
        <tr>
            <td>文章分類</td>
            <td class="lt">
                <select name="sort" id="sort">
                    <option value="1">健康新知</option>
                    <option value="2">菸害防治</option>
                    <option value="3">癌症防治</option>
                    <option value="4">慢性病防治</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>文章內容</td>
            <td class="lt"><textarea name="body" id="body" cols="30" rows="10" style="width: 90%;"></textarea></td>
        </tr>
        
    </table>
    <div class="ct">
        <input type="submit" value="新增"><input type="reset" value="重置">
    
    </div>
</form>
    

</fieldset>

<script>


</script>