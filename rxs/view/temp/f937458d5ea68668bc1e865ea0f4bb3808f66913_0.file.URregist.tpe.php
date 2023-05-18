<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:14:14
  from 'C:\wamp64\www\rxs\view\URregist.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458af5661fdf4_35020136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f937458d5ea68668bc1e865ea0f4bb3808f66913' => 
    array (
      0 => 'C:\\wamp64\\www\\rxs\\view\\URregist.tpe',
      1 => 1599124299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458af5661fdf4_35020136 (Smarty_Internal_Template $_smarty_tpl) {
?>	<style>
		.regist_input{
			padding-left: 8px;
			border-style: solid;
			border-width: 0;
			border-bottom: 1px solid #676f77;
			width:100%;
			height: 35px;
			font-size: 15pt;
			line-height: 15px;
			color: #21272a;
			font-weight: bolder;
			margin-top:15px;
		}
		.regist_form{
			text-align:center;
			max-width:500px;
			margin-left:auto;
			margin-right:auto;
		}
	</style>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(function(){
			$("#register_form").submit(function(e){
				if($("#uname").val()==''){
					alert('姓名不能空白');
					$("#uname").focus();
					return false;
				}
				if($("#email").val()==''){
					alert('e-mail信箱不能空白');
					$("#email").focus();
					return false;
				}
				if($("#pwd").val()==''){
					alert('密碼不能空白');
					$("#pwd").focus();
					return false;
				}
				if($("#phonenum").val()==''){
					alert('手機不能空白');
					$("#phonenum").focus();
					return false;
				}
				if($("#pwd_chk").val() != $("#pwd").val()){
					alert('確認密碼不一致');
					$("#pwd_chk").focus();
					return false;
				}
				$("#lineCode").attr("disabled",false);
			});
		});
		function lineSet(){
			var URL = 'https://notify-bot.line.me/oauth/authorize?';
			URL += 'response_type=code';
			URL += '&client_id=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ln_id']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
';
			URL += '&redirect_uri='+location.href;
			URL += '&scope=notify';
			URL += '&state=NO_STATE';
			URL += '&response_mode=form_post';
			window.location.href = URL;
		}
	<?php echo '</script'; ?>
>
	
	<div style="margin-bottom:70px;">
		<h1 style=" font-size: 40px;letter-spacing: 3px;line-height: 100%;text-align: center;">會員註冊</h1>
		<form id="register_form" method="post" autocomplete="false" class="regist_form" action="/URadd">
			<div style="margin-bottom: 15px;">
				<div style="width:100%;display:flow-root;">
					<input id="lineCode" name="lineCode" type="text" placeholder="請點選`line通知`完成line通知設定" class="regist_input" style="float:left;width:75%;" disabled="disabled" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['code']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
">
					<input type="button" class="btn btn-success" style="float:left;width:25%;height: 35px;font-size: 15pt;margin-top:15px;" value="line通知" onclick="lineSet();">
				</div>
				<input id="uname" name="uname" type="text" placeholder="*姓名" class="regist_input">
				<input id="email" name="email" type="email" placeholder="*E-mail 信箱" autocomplete="email" class="regist_input">
				<input id="pwd" name="pwd" type="password" placeholder="*密碼" class="regist_input">
				<input id="pwd_chk" type="password" placeholder="*確認密碼" class="regist_input">
				<input id="phonenum" name="phonenum" type="tel" placeholder="*手機" autocomplete="tel" class="regist_input">
				<div style="width:100%;display:flow-root;">
					<input id="cap_code" name="cap_code" type="text" placeholder="*驗證碼" class="regist_input" style="width:70%;float:left;">
					<img class="capimg" onClick="javascript:$(this).attr('src',$(this).attr('src')+'?'+Math.random());" src="/captcha/cap.php">  	
				</div>
			</div>
			<div class="col-md-12 text-center">
				<input type="submit" class="btn btn-default btn-lg" value="完成註冊">
				<br>
				<font color="red">*號必填</font>
				<br>
				<font>
					建議預設瀏覽器為google chrom
				</font>
			</div>
		</form>
	</div><?php }
}
