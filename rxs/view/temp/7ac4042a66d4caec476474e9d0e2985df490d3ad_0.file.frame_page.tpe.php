<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:01:11
  from 'C:\wamp64\www\rxs\view\frame_page.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458ac470c1a29_40107793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ac4042a66d4caec476474e9d0e2985df490d3ad' => 
    array (
      0 => 'C:\\wamp64\\www\\rxs\\view\\frame_page.tpe',
      1 => 1606753022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458ac470c1a29_40107793 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html>
<head>   
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>慢箋雲端</title>
	<link rel="shortcut icon" href="/resource/img/favicon.ico?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
" type="image/x-icon">
	<link rel="icon" href="/resource/img/favicon.ico?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
" type="image/x-icon" />
	<?php echo '<script'; ?>
 type="text/javascript"> 
		var imgPress = '<?php ob_start();
echo $_smarty_tpl->tpl_vars['imgPress']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
';
	<?php echo '</script'; ?>
>
	<!--
	<meta name="description" content="鮮乳坊希望能作為消費者和酪農的橋樑，協助小農成立自有品牌，提供成分無調整、高品質的鮮乳。我們可以用消費的力量給予他們所需的支持，藉此改變乳業生態。"><!--不超過150的字符
	<meta name="keywords" content="鮮乳, 鮮奶, 小農">

	<meta property="og:site_name" content="鮮乳坊">
	<meta property="og:url" content="https://www.ilovemilk.com.tw/">
	<meta property="og:title" content="慢箋雲端">
	<meta property="og:description" content="鮮乳坊希望能作為消費者和酪農的橋樑，協助小農成立自有品牌，提供成分無調整、高品質的鮮乳。我們可以用消費的力量給予他們所需的支持，藉此改變乳業生態。">
	<meta property="og:image" content="http://ilovemilk.com.tw/images/ilovemilk_logo.png">
	
	<?php echo '<script'; ?>
 type="text/javascript" src="/resource/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
	<link href="/resource/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" type="text/css">
	
	-->
	 
	<?php echo '<script'; ?>
 type="text/javascript" src="/resource/js/jquery-1.11.3.min.js?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="/resource/js/bootstrap.min.js?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="/resource/js/misc/main.js?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
"><?php echo '</script'; ?>
>
	
	<link href="/resource/css/bootstrap.min.css?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
" rel="stylesheet" type="text/css">
	<link href="/resource/css/misc/main.css?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
" rel="stylesheet" type="text/css">
	<link href="/resource/css/misc/font-awesome.min.css?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
" rel="stylesheet" type="text/css">
	
	<style type="text/css">
        /* define bootstrap 5 columns */
        .col-xs-1-5,
        .col-sm-1-5,
        .col-md-1-5,
        .col-lg-1-5 {
            position: relative;
            min-height: 1px;
            padding-right: 10px;
            padding-left: 10px;
        }

        .col-xs-1-5 {
            width: 33%;
            float: left;
        }
		.acc_img{
			height: 30px;
			width: 30px;
			border-radius: 50%;
			display: inline-block;
			vertical-align: middle;
		}
		@media (min-width: 768px) {
			.col-sm-1-5 {
                width: 33%;
                float: left;
            }
			
			.acc_img{
				height: 25px;
				width: 25px;
			}
        }
        @media (min-width: 992px) {
            .col-md-1-5 {
                width: 33%;
                float: left;
            }
		}
		@media (min-width: 1200px) {
            .col-lg-1-5 {
                width: 33%;
                float: left;
            }
        }
		.phdiv{
			margin-top:20px;
		}
		a[href^="http://getbutton.io"]{
			display:none;
		}
		.ntc{
			display: none;
			width: 20px;
			background-color:red;
			color:white;
			border-radius:10px;
			text-align: center;
			height:20px;
			line-height: 20px;
			font-size:x-small;
		}
		
		.itemBtn{
			background-color:rgba(114, 114, 114, 1);
			cursor:pointer !important;
			transition:color 0.4s ease 0s;  
			color:#FFFFFF;
			white-space:nowrap;
			font-size: 15pt;
			padding: 5px;
			box-shadow:2.83px 2.83px 4px 1px rgba(0,0,0,0.3);
		}
		.itemBtn:active{
			position:relative;
			top:1px;
		}
		.itemBtn:hover{
			background-color:rgba(204,204,204,1);
		}
</style>
	<?php echo '<script'; ?>
>
		var ctype = '<?php ob_start();
echo $_smarty_tpl->tpl_vars['ctype']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
';
		var shiny=0;
		var ntcNum = 0;
		var chtn=0;
		$(function(){
			$("span[name='ntcn']").hide();
			if(ctype){
				chkOrder();
				setInterval(titShiny,1000);
			}
			//line fb 套件
			var options = {
				<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgAry']->value, 'i', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['i']->value) {
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>

					<?php ob_start();
echo $_smarty_tpl->tpl_vars['k']->value;
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
:"<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
",
				<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

				call_to_action: "聯絡我們", // Call to action
				button_color: "#129BF4", // Color of button
				position: "right", // Position may be 'right' or 'left'
				order: "line,facebook", // Order of buttons
			};
			var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
			var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
			s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
			var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
		
			
			
		});
		var titShiny = function(){
			var titStr = '慢箋雲端';
			var n = chtn+ntcNum;
			if(shiny==0){
				shiny=1;
				if(n>0)
					titStr=titStr+'【'+n+'】';
			}else{
				shiny=0;
				if(n>0)
					titStr=titStr+'【 】';
			}
			$("title").html(titStr);
		};
		function chkOrder(){
			if('<?php ob_start();
echo $_smarty_tpl->tpl_vars['page']->value;
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
'!='Cmsg'){
				var da={};
				da['ac'] = 2;
				send('action/chatAjax',da,function(da){
					if(da["rs"] && Number(da["rs"])>0){
						$("span[name='chtn']").html(da["rs"]);
						$("span[name='chtn']").css('display',"inline-block");
						chtn = Number(da["rs"]);
					}else{
						$("span[name='chtn']").hide();
					}
				});
			}
			var oda={};
			oda["type"] = ctype;
			send('action/chkOrder',oda,function(da){
				if(da["rs"] && Number(da["rs"])>0){
					ntcNum = Number(da["rs"]);
					$("span[name='ordn']").html(ntcNum);
					$("span[name='ordn']").css('display',"inline-block");
				}else{
					$("span[name='ordn']").hide();
				}
				if(chtn+ntcNum >0){
					$("span[name='ntcn']").html(chtn+ntcNum);
					$("span[name='ntcn']").css('display',"inline-block");
				}else{
					$("span[name='ntcn']").hide();
				}
			});
			
			setTimeout(chkOrder,1000*20);
		}
	<?php echo '</script'; ?>
>
</head>

<body style="font-family: 微軟正黑體，Meiryo, Meiryo UI, Microsoft JhengHei UI, Microsoft JhengHei, sans-serif;">
	<!-- 上方滑動導覽列
	================================================== -->
	<div class="container-fluid nava-div" style="top: -100px; display: block; opacity: 1;">
		<div class="container center-block">
			<div id="top-nav" class="row">
				<div class="pull-left col-md-1 windth13p text-center">
					<a href="/">
						<img src="/resource/img/logo.jpg?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
" class="hidden-sm" alt="" style="height:80px;">
						<!--img src="/resource/img/logo_m.png" class="visible-sm" alt="" style="height:80px;"-->
					</a>
				</div>
				<div class="pull-right">
					<!--認識我們-->
					<div class="col-md-1 windth85px text-center nava-vi">
						<a href="/">
							<img src="/resource/img/top_about.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
" alt="">
							<p>認識慢箋雲端</p>
						</a>
					</div>
					
					<!--慢箋上傳-->
					<div class="col-md-1 windth85px text-center nava-vi">
						<a href="/RXmain">
							<img src="/resource/img/top_rx.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
" alt="">
							<p>慢箋上傳</p>
						</a>
					</div>

									
					<!--尋找藥局-->
					<div class="col-md-1 windth85px text-center nava-vi">
						<a href="/AgentMap">
							<img src="/resource/img/top_local.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
" alt="">
							<p>尋找藥局</p>
						</a>
					</div>
					
					<!--Q&A-->
					<div class="col-md-1 windth85px text-center nava-vi">
						<a href="/fqa">
							<img src="/resource/img/top_qa.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
" alt="">
							<p>常見問題FAQ</p>
						</a>
					</div>
					<!--合作藥局專區-->
					<div class="col-md-1 windth85px text-center nava-vi">
						<a href="/PHmain">
							<img src="/resource/img/top_par.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
" alt="">
							<p>合作藥局專區</p>
						</a>
					</div>

					<div class="pull-left text-center topnav-div">
						<!--分隔線-->
					</div>
					<?php ob_start();
if ($_smarty_tpl->tpl_vars['pAgent']->value) {
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>

						<div class="col-md-1 windth85px text-center nava-vi phdiv">
							<a href="/PHmain" style="font-size: 12pt;font-weight: bolder;">
								<?php ob_start();
echo $_smarty_tpl->tpl_vars['pAgent']->value["pname"];
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>

								<span class="ntc" name="ntcn"></span>
							</a>
						</div>
						<div class="col-md-1 windth85px text-center nava-vi">
							<a href="/Cmsg">
								<img style="height:55px;" src="/resource/img/mtk.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>
" alt="雲端通"  class="chtimg">
								<p>
									雲端通<span class="ntc" name="chtn"></span>
								</p>
								
							</a>
						</div>
						<div class="col-md-1 windth85px text-center nava-vi">
							<a href="/URlogout">
								<img src="/resource/img/logout.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>
" alt="">
								<p>登出</p>
							</a>
						</div>
					<?php ob_start();
} elseif ($_smarty_tpl->tpl_vars['ud']->value) {
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>

						<div class="col-md-1 windth85px text-center nava-vi">
							<a href="/URmain">
								<img src="/resource/img/acc.jpg?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>
" alt="" style="wdith:55px;height:55px;">
								<p>
									<?php ob_start();
echo $_smarty_tpl->tpl_vars['ud']->value["name"];
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>

									<span class="ntc" name="ntcn"></span>
								</p>
								
							</a>
						</div>
						<div class="col-md-1 windth85px text-center nava-vi">
							<a href="/Cmsg">
								<img style="height:55px;" src="/resource/img/mtk.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;?>
" alt="雲端通" class="chtimg">
								<p>
									雲端通<span class="ntc" name="chtn"></span>
								</p>
								
							</a>
						</div>
						<div class="col-md-1 windth85px text-center nava-vi">
							<a href="/URlogout">
								<img src="/resource/img/logout.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable30 = ob_get_clean();
echo $_prefixVariable30;?>
" alt="">
								<p>登出</p>
							</a>
						</div>
					<?php ob_start();
} else {
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>

						<div class="col-md-1 windth85px text-center nava-vi">
							<a href="/URlogin">
								<img src="/resource/img/top_member.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable32 = ob_get_clean();
echo $_prefixVariable32;?>
" alt="">
								<p>登入</p>
							</a>
						</div>
						<div class="col-md-1 windth85px text-center nava-vi">
							<a href="/URregist">
								<img src="/resource/img/top_member.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable33 = ob_get_clean();
echo $_prefixVariable33;?>
" alt="">
								<p>註冊</p>
							</a>
						</div>
					<?php ob_start();
}
$_prefixVariable34 = ob_get_clean();
echo $_prefixVariable34;?>

				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-default visible-xs visible-sm" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">
						Toggle navigation
					</span>
					<span class="icon-bar">
					</span>
					<span class="icon-bar">
					</span>
					<span class="icon-bar">
					</span>
					<span class="ntc" name="ntcn" style="position: absolute;bottom: 0px;"></span>
				</button>
				<a class="navbar-brand" href="/">
					<img alt="Brand" src="/resource/img/top_logo.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable35 = ob_get_clean();
echo $_prefixVariable35;?>
" style="height:40px;">
				</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
				<ul class="nav navbar-nav">
					<li><a href="/">認識慢箋雲端</a></li>
					<li><a href="/RXmain">慢箋上傳</a></li>
					<li><a href="/AgentMap">尋找藥局</a></li>
					<li><a href="/fqa">常見問題FAQ</a></li>
					<li><a href="/PHmain">合作藥局專區</a></li>
					<?php ob_start();
if ($_smarty_tpl->tpl_vars['pAgent']->value) {
$_prefixVariable36 = ob_get_clean();
echo $_prefixVariable36;?>

						<li><a href="/PHmain">
								<?php ob_start();
echo $_smarty_tpl->tpl_vars['pAgent']->value["pname"];
$_prefixVariable37 = ob_get_clean();
echo $_prefixVariable37;?>

								<span class="ntc" name="ntcn" ></span>
							</a>
						</li>
						<li><a href="/Cmsg">
							<img src="/resource/img/mtk.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable38 = ob_get_clean();
echo $_prefixVariable38;?>
" alt="" class="acc_img chtimg">
							<span class="msgtit">雲端通</span>
							<span class="ntc" name="chtn"></span>
						</a></li>
						<li><a href="/URlogout">登出</a></li>
					<?php ob_start();
} elseif ($_smarty_tpl->tpl_vars['ud']->value) {
$_prefixVariable39 = ob_get_clean();
echo $_prefixVariable39;?>

						<li>
							<a href="/URmain">
								<img src="/resource/img/acc.jpg?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable40 = ob_get_clean();
echo $_prefixVariable40;?>
" alt="" class="acc_img">
								<?php ob_start();
echo $_smarty_tpl->tpl_vars['ud']->value["name"];
$_prefixVariable41 = ob_get_clean();
echo $_prefixVariable41;?>

								<span class="ntc" name="ntcn" ></span>
							</a>
						</li>
						<li><a href="/Cmsg">
								<img src="/resource/img/mtk.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable42 = ob_get_clean();
echo $_prefixVariable42;?>
" alt="" class="acc_img chtimg">
								<span class="msgtit">雲端通</span>
								<span class="ntc" name="chtn"></span>
							</a>
						</li>
						<li><a href="/URlogout">登出</a></li>
					<?php ob_start();
} else {
$_prefixVariable43 = ob_get_clean();
echo $_prefixVariable43;?>

						<li><a href="/URlogin">登入</a></li>
						<li><a href="/URregist">註冊</a></li>
					<?php ob_start();
}
$_prefixVariable44 = ob_get_clean();
echo $_prefixVariable44;?>

				</ul>
			</div>
		</div>
	</nav>
	<div class="container rep_local">
		<!-- Header -->
		<div class="row" id="header">
			<div class="col-md-4 visible-lg visible-md">
				<a href="/" class="logo">
					<img src="/resource/img/logo.jpg?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable45 = ob_get_clean();
echo $_prefixVariable45;?>
" alt="慢箋雲端">
				</a>
			</div>
			<div class="col-md-8 text-right">
				<ul class="links visible-md visible-lg" style="font-size:18pt;font-weight: bolder;height: 40px;line-height: 40px;">
					<?php ob_start();
if ($_smarty_tpl->tpl_vars['pAgent']->value) {
$_prefixVariable46 = ob_get_clean();
echo $_prefixVariable46;?>

						<li class="link-accout">
							<a href="/PHmain">
								<?php ob_start();
echo $_smarty_tpl->tpl_vars['pAgent']->value["pname"];
$_prefixVariable47 = ob_get_clean();
echo $_prefixVariable47;?>
<span class="ntc" name="ntcn" ></span>
							</a>
						</li>
						<li class="link-accout">
							<a href="/Cmsg" title="雲端通"><img style="height:30px;" src="/resource/img/mtk.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable48 = ob_get_clean();
echo $_prefixVariable48;?>
" alt="雲端通" class="chtimg">雲端通</a>
							<span class="ntc" name="chtn"></span>
						</li>
						<li><a href="/URlogout"  class="itemBtn">登出</a></li>
					<?php ob_start();
} elseif ($_smarty_tpl->tpl_vars['ud']->value) {
$_prefixVariable49 = ob_get_clean();
echo $_prefixVariable49;?>

						<li class="link-accout">
							<img src="/resource/img/acc.jpg?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable50 = ob_get_clean();
echo $_prefixVariable50;?>
" alt="" class="acc_img">
							<a href="/URmain">
								<?php ob_start();
echo $_smarty_tpl->tpl_vars['ud']->value["name"];
$_prefixVariable51 = ob_get_clean();
echo $_prefixVariable51;?>
<span class="ntc" name="ntcn" ></span>
							</a>
						</li>
						<li class="link-accout">
							<a href="/Cmsg" title="雲端通"><img style="height:30px;" src="/resource/img/mtk.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable52 = ob_get_clean();
echo $_prefixVariable52;?>
" alt="雲端通" class="chtimg" >雲端通</a>
							<span class="ntc" name="chtn"></span>
						</li>
						<li><a href="/URlogout"  class="itemBtn">登出</a></li>
					<?php ob_start();
} else {
$_prefixVariable53 = ob_get_clean();
echo $_prefixVariable53;?>

						<li ><a href="/URlogin"  class="itemBtn">登入</a></li>
						<li ><a href="/URregist" class="itemBtn">註冊</a></li>
					<?php ob_start();
}
$_prefixVariable54 = ob_get_clean();
echo $_prefixVariable54;?>

				</ul>
			</div>

			<div class="col-md-12 visible-md visible-lg">
				<ul id="nav" class="clearfix">
					<li><a href="/">		
						<img src="/resource/img/top_about.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable55 = ob_get_clean();
echo $_prefixVariable55;?>
" alt="">
						<br>認識慢箋雲端</a></li>
					<li><a href="/RXmain">		
						<img src="/resource/img/top_rx.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable56 = ob_get_clean();
echo $_prefixVariable56;?>
" alt="">
						<br>慢箋上傳</a></li>
					<li><a href="/AgentMap">		
						<img src="/resource/img/top_local.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable57 = ob_get_clean();
echo $_prefixVariable57;?>
" alt="">
						<br>尋找藥局</a></li>
					<li><a href="/fqa">	
						<img src="/resource/img/top_qa.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable58 = ob_get_clean();
echo $_prefixVariable58;?>
" alt="">
						<br>常見問題FAQ</a></li>
					<li><a href="/PHmain">		
						<img src="/resource/img/top_par.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable59 = ob_get_clean();
echo $_prefixVariable59;?>
" alt="">
						<br>合作藥局專區</a></li>
				</ul>
			</div>
		</div>
		<?php ob_start();
if ($_smarty_tpl->tpl_vars['page']->value != "index") {
$_prefixVariable60 = ob_get_clean();
echo $_prefixVariable60;?>

			<ol class="breadcrumb">
				<li><img src="/resource/img/home.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable61 = ob_get_clean();
echo $_prefixVariable61;?>
" alt=""> <a href="/">首頁</a></li>
				<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['page_org']->value, 'pgName', false, 'pg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pg']->value => $_smarty_tpl->tpl_vars['pgName']->value) {
$_prefixVariable62 = ob_get_clean();
echo $_prefixVariable62;?>

					<li><a href="/<?php ob_start();
echo $_smarty_tpl->tpl_vars['pg']->value;
$_prefixVariable63 = ob_get_clean();
echo $_prefixVariable63;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['pgName']->value;
$_prefixVariable64 = ob_get_clean();
echo $_prefixVariable64;?>
</a></li>
				<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable65 = ob_get_clean();
echo $_prefixVariable65;?>

				<li class="active"><?php ob_start();
echo $_smarty_tpl->tpl_vars['page_name']->value;
$_prefixVariable66 = ob_get_clean();
echo $_prefixVariable66;?>
</li>
			</ol>
		<?php ob_start();
}
$_prefixVariable67 = ob_get_clean();
echo $_prefixVariable67;?>

		<div style="min-height:700px;">
		<!-- Main Body -->
		<?php ob_start();
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['page']->value).".tpe", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_prefixVariable68 = ob_get_clean();
echo $_prefixVariable68;?>

		</div>
	</div>
	
	<!-- bottom -->
	<div class="container-fluid footer m-padding0">
		
        <div class="row v-hight">
            <div class="col-md-1-5 text-center item" style="height: 179px;">
                <h5 class="footer_title" style="display: inline-block;width: 100%;">新手上路</h5>
                    <p class="col-sm-6 col-md-12"><a href="/">認識雲端慢箋</a></p>
                    <p class="col-sm-6 col-md-12"><a href="/fqa">雲端慢箋FAQ</a></p>
            </div>
            <div class="col-md-1-5 text-center item" style="height: 179px;">
                <h5 class="footer_title" style="display: inline-block;width: 100%;">慢箋上傳</h5>
					<p class="col-sm-6 col-md-12"><a href="/fqa?q=3">慢箋上傳方式</a></p>
					<p class="col-sm-6 col-md-12"><a href="/RXmain">慢箋上傳</a></p>
            </div>
                        
            <div class="col-md-1-5 text-center item" style="height: 179px;">
                
                <h5 class="footer_title" style="display: inline-block;width: 100%;">尋找藥局</h5>
					<p class="col-sm-6 col-md-12"><a href="/AgentMap">尋找合作藥局</a></p>
					<p class="col-sm-6 col-md-12"><a href="/introPH">推薦合作藥局</a></p>
			</div>
        </div>

		<div class="text-center">
			<div class="row">
				<p>Copyright © 2019 Prescription Cloud All Rights Reserved. 慢箋雲端 版權所有</p>
			</div>
		</div>
	</div>
</body>
</html><?php }
}
