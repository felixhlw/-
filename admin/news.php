<fieldset>
<legend>最新文章管理</legend>
<button onclick="javascript:location.href='admin.php?do=addnews'">新增文章</button>

<form action="./api/editnews.php" method="post">
    <table class="ct" width="80%" style="margin: auto">
        <tr >
            <td width="10%">編號</td>
            <td>內容</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
        </tr>
        <?php
        $total=nums("news");
        $div=3;
        $pages=ceil($total/$div);
        $now=(!empty($_GET['p']))?$_GET['p']:1;
        $start=($now-1)*$div;
        $news=all("news",[]," limit $start, $div");
    
        foreach ($news as $k => $n) {
        ?>
            <tr >
            
            <td class="clo"><?=$k+1+$start;?></td>
            <td><?=$n['title'];?></td>
            <td><input type="checkbox" name="sh[]"  <?=($n['sh']==1)?"checked":"";?> value="<?=$n['id'];?>"></td>
            <td><input type="checkbox" name="del[]"  value="<?=$n['id'];?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?=$n['id'];?>">
    <?php        
        }
        ?>
    </table>
    <div class="ct">

    <?php
        if(($now-1)>0){
            echo "<a href='admin.php?do=news&p=".($now-1)."'> < </a>";
        }

        for ($i=1; $i <= $pages; $i++) { 
            $fontSize=($i==$now)?"26px":"18px";
            echo "<a href='admin.php?do=news&p=$i' style='font-size:$fontSize'> ".$i." </a>";
        }

        if (($now+1)<= $pages) {
            echo "<a href='admin.php?do=news&p=".($now+1)."'> > </a>";
        }
    ?>

    </div>
    <div class="ct">
        <input type="submit" value="確定修改">
        
    </div>
</form>
    

</fieldset>

