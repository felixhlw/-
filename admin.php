<?php
include_once "base.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>健康促進網</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-1.9.1.min.js"></script>
<script src="./js/js.js"></script>
</head>

<body>
<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
	<pre id="ssaa"></pre>
</div>

	<div id="all">
    	<div id="title">
		<?php
			if (empty($_SESSION['total'])) {
				$chk=nums("total",["date"=>date("Y-m-d")]);
				if ($chk>0) {
					$data=find("total",["date"=>date("Y-m-d")]);
					$_SESSION['total']=$data["total"]+1;
					$data['total']=$data['total']+1;
					save("total",$data);

				}else{
					$data=["date"=>date("Y-m-d"),"total"=>1];
					$_SESSION["total"]=1;
					save("total",$data);
				}
			}
			$sum=q("select sum(`total`) from `total`");
		?>
		<?=date("m 月 d 號 l");?> | 今日瀏覽: <?=$_SESSION['total'];?> | 累積瀏覽: <?=$sum[0][0];?>  
		<span style="float: right"><a href="index.php"> 回首頁</a></span>	
		</div>
		
        <div id="title2">
        	<img src="./icon/02B01.jpg" alt="">
        </div>
        <div id="mm">
        	<div class="hal ct" id="lef">
            	                	    <a class="blo" href="?do=admin">帳號管理</a>
               	                     	    <a class="blo" href="?do=po">分類網誌</a>
               	                     	    <a class="blo" href="?do=news">最新文章管理</a>
               	                     	    <a class="blo" href="?do=know">講座管理</a>
               	                     	    <a class="blo" href="?do=que">問卷管理</a>
               	                 </div>
            <div class="hal" id="main">
			<div>
            	<span style="width: 80%;display:inline-block;"><marquee behavior="" direction="">請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章</marquee></span>	
				<span style="width:18%; display:inline-block;">
				<?php
				if (empty($_SESSION['user'])) {
					?>
					<a href="?do=login">會員登入</a>
					<?php
				}else{
					if ($_SESSION['user']=='admin') {
						?>
						 歡迎 <?=$_SESSION['user'];?>
						 <br>
						 <button onclick="javascript:location.href='admin.php'">管理</button>
						 <button onclick="javascript:location.href='./api/logout.php'">登出</button>
						 <?php
						}else{
							?>
							歡迎 <?=$_SESSION['user'];?>
							<button onclick="javascript:location.href='./api/logout.php'">登出</button>
						<?php
						}
				}
				?>
												
				</span>
				<div class="">
                		                        
				<?php
					$do=(!empty($_GET['do']))?$_GET['do']:"home";
					$path="./admin/".$do.".php";	
					if (file_exists($path)) {
						include $path;
					}else{
						include "./front/home.php";
					}
					
				?>	
				</div>
            </div>
        </div>
        <div id="bottom">
    	    <!-- 本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2020健康促進網社群平台 All Right Reserved  -->
			<div style="display: inline-block" class="btxt">
				<div >
					Copyright © 2020健康促進網社群平台 All Right Reserved 
				</div> 
				<div>
					服務信箱：health@test.labor.gov.tw
				</div>
			</div>					
			<div style="display: inline-block" class="bimg">
				 <img src="icon/02B02.jpg" width="45">
			</div>
        </div>
    </div>

</body></html>