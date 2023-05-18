<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:20:20
  from 'C:\wamp64\www\rxmag\_view\index.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458b0c40d4121_40298226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d35979ae0a6356fee87afa702b9e51aeedc6f94' => 
    array (
      0 => 'C:\\wamp64\\www\\rxmag\\_view\\index.tpe',
      1 => 1590166048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458b0c40d4121_40298226 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php echo '<script'; ?>
 type="text/javascript" src="/resource/js/jquery-1.11.3.min.js?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="/resource/js/bootstrap.min.js?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
"><?php echo '</script'; ?>
>
		<link href="/resource/css/bootstrap.min.css?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
" rel="stylesheet" type="text/css">
		<title>管理頁面</title>
		<style type="text/css">
			.mbtit{
				height: 50px;
				line-height: 50px;
				font-size: 16pt;
				font-weight: bolder;
			}
			.blacktop, #tophead,.navbar{
				background-color: #4c4b4b;
				color: white;
			}
			@media (max-width: 991px){
				#wtop{
					display:none;
				}
			}
			.getcenter{
				margin-right:auto;
				margin-left:auto;
				max-width:1000px;
			}
			.selbtn,.btn:focus,.btn:hover{
				background-color: darkgray;
				color: white;
			}
			.notic{
				background-color:red;
				color:white;
				display: none;
				width: 20px;
				border-radius: 60px;
				text-align:center;
			}
			button[name='topbtn']{
				width:100px;
			}
			#ntcAll{
				background-color:red;
				color:white;
				width: 20px;
				display:none;
				border-radius: 60px;
				text-align:center;
				position: absolute;
				bottom: 0px;
			}
		</style>
		<?php echo '<script'; ?>
>
			var ntcMid ={};
			$(function(){
				getNotice();
				window.setInterval(getNotice,1000*60);
			});
			function getNotice(){
				$.ajax({
					url: '/z/getNotice',
					data:ntcMid,
					type:'POST',
					dataType:'json',
					success:showNotice
				});
			}
			function showNotice(da){
				var ntcAll=0;
				for(var i in da){
					if(da[i].c>0){
						ntcAll+=Number(da[i].c);
						$('span[name=ntc_'+i+']').html(da[i].c);
						$('span[name=ntc_'+i+']').attr('seed',da[i].mid);
						$('span[name=ntc_'+i+']').css("display","inline-block");
					}else{
						$('span[name=ntc_'+i+']').hide();
					}
				}
				if(ntcAll>0){
					$('#ntcAll').html(ntcAll);
					$('#ntcAll').css("display","inline-block");
				}else{
					$('#ntcAll').hide();
				}
			}
			function getpage(p){
				if($('span[name=ntc_'+p+']').attr('seed')>0 ){
					ntcMid[p]=$('span[name=ntc_'+p+']').attr('seed');
					$('span[name=ntc_'+p+']').hide();
					var nall = Number($('#ntcAll').html());
					var np = Number($('span[name=ntc_'+p+']').html());
					nall -= np;
					if(nall>0)
						$('#ntcAll').html(nall);
					else
						$('#ntcAll').hide();
				}
				$("button[name='topbtn']").removeClass('selbtn');
				$("#mainf").attr('src','/z/'+p+'');
				$("#btn_"+p).addClass('selbtn');
			} 
			function SetCwinHeight(){
				var iframeid=document.getElementById("mainf"); //iframe id
				if (document.getElementById){
					if (iframeid && !window.opera){
						if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight){
							iframeid.height = iframeid.contentDocument.body.offsetHeight+100;
						}else if(iframeid.Document && iframeid.Document.body.scrollHeight){
							iframeid.height = iframeid.Document.body.scrollHeight+100;
						}
					}
				}
			}
		<?php echo '</script'; ?>
>
	</head>
	
	<body style="background-color:#333;font-family: 微軟正黑體，Meiryo, Meiryo UI, Microsoft JhengHei UI, Microsoft JhengHei, sans-serif;">
		<!-- 手機板選擇列 -->
		<nav class="navbar navbar-default visible-xs visible-sm" role="navigation">
			<div class="container">
				<div class="navbar-header blacktop">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">
							Toggle navigation
						</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span id="ntcAll">1</span>
					</button>
					<div class="mbtit">慢籤管理</div>
				</div>
				<div id="navbar" class="blacktop navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
					<ul class="nav navbar-nav">
						<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mpages']->value, 'pn', false, 'pk');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pk']->value => $_smarty_tpl->tpl_vars['pn']->value) {
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

							<li>
								<a onclick="getpage('<?php ob_start();
echo $_smarty_tpl->tpl_vars['pk']->value;
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
');" style="color:white;" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
									<?php ob_start();
echo $_smarty_tpl->tpl_vars['pn']->value;
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>

									<span class="notic"  name="ntc_<?php ob_start();
echo $_smarty_tpl->tpl_vars['pk']->value;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
">1</span>
								</a>
							</li>
						<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

					</ul>
				</div>
			</div>
		</nav>
		<!-- 網頁版列表 -->
		<div id="wtop" class="panel panel-default">
			<div id="tophead" class="panel-heading" style="text-align:center;">
				<div class="getcenter" style="display:flow-root;">
					<div style="margin-right:15px;float:left;font-size:19pt;font-weight:bolder;">慢籤管理</div>
					<div class="btn-group"  style="float:left;">
						<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mpages']->value, 'pn', false, 'pk');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pk']->value => $_smarty_tpl->tpl_vars['pn']->value) {
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

							<button id="btn_<?php ob_start();
echo $_smarty_tpl->tpl_vars['pk']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
" name="topbtn" class="btn btn-default" onclick="getpage('<?php ob_start();
echo $_smarty_tpl->tpl_vars['pk']->value;
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
');">
								<?php ob_start();
echo $_smarty_tpl->tpl_vars['pn']->value;
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

								<span class="notic" name="ntc_<?php ob_start();
echo $_smarty_tpl->tpl_vars['pk']->value;
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
" >1</span>
							</button>
						<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

					</div>
					
				</div>
			</div>
		</div>
		
		<div class="getcenter">
			<iframe  frameborder="0"   scrolling="no" id="mainf" style="width:100%;border: 0;"></iframe>
		</div>
	</body>
</html><?php }
}
