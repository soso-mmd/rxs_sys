<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:28:05
  from 'C:\wamp64\www\rxs\view\PHlogin.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458b29527c4c2_87899502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16aa10136c3f4589dfc233c5687d8a5adc162768' => 
    array (
      0 => 'C:\\wamp64\\www\\rxs\\view\\PHlogin.tpe',
      1 => 1590509740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458b29527c4c2_87899502 (Smarty_Internal_Template $_smarty_tpl) {
?>	<style>
		.login_form{
			text-align:center;
			max-width:500px;
			margin-left:auto;
			margin-right:auto;
		}
		.int{
			margin-top:15px;
		}
	</style>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(function(){
			$("#login_form").submit(function(e){
				if($("#ph_id").val()==''){
					alert('藥局登記字號不能空白');
					$("#ph_id").focus();
					return false;
				}
				if($("#pwd").val()==''){
					alert('密碼不能空白');
					$("#pwd").focus();
					return false;
				}
			});
		});
	<?php echo '</script'; ?>
>
	
	<div style="margin-bottom:70px;">
		<h1 style=" font-size: 40px;letter-spacing: 3px;line-height: 100%;text-align: center;">合作藥局登入</h1>
		<form id="login_form" method="post" autocomplete="false" class="login_form" action="/plogin">
			<div>
				<input id="ph_id" name="ph_id" type="text" placeholder="藥局登記字號" autocomplete="email" class="form-control int">
				<input id="pwd" name="pwd" type="password" placeholder="密碼" class="form-control int">
				<div style="width:100%;">
					<input id="cap_code" name="cap_code" type="text" placeholder="驗證碼" class="form-control int" style="width:70%;float:left;">
					<img class="capimg" onClick="javascript:$(this).attr('src',$(this).attr('src')+'?'+Math.random());" src="/captcha/cap.php">  	
				</div>
			</div>
			<br><br>
			<input type="submit" class="btn btn-default btn-lg btn-block margin-bottom10 int" value="登入">
			<div class="text-center padding-bottom30">
				<a href="/PHregister" class="pull-left btn btn-default">合作藥局註冊</a>
				<a href="/PHforget" class="pull-right" href="" style="line-height: 50px;color: #8FC31F;">忘記密碼</a>
			</div>
		</form>
		
	</div><?php }
}
