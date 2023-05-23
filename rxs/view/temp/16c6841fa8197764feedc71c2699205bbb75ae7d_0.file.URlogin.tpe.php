<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:01:11
  from 'C:\wamp64\www\rxs\view\URlogin.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458ac47229083_38572169',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16c6841fa8197764feedc71c2699205bbb75ae7d' => 
    array (
      0 => 'C:\\wamp64\\www\\rxs\\view\\URlogin.tpe',
      1 => 1600349115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458ac47229083_38572169 (Smarty_Internal_Template $_smarty_tpl) {
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
		.line{
			background-image:url(/resource/img/btn_login_base.png?<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable86 = ob_get_clean();
echo $_prefixVariable86;?>
);
			background-size:100% 100%;
			width:100px;
			margin-left:5px; 
			background-color: white;
			border: 0px;
		}
		.line:hover{
			background-image:url(/resource/img/btn_login_hover.png?<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable87 = ob_get_clean();
echo $_prefixVariable87;?>
);
		}
	</style>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(function(){
			$("#login_form").submit(function(e){
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
			});
			<?php ob_start();
if ($_smarty_tpl->tpl_vars['pAgent']->value) {
$_prefixVariable88 = ob_get_clean();
echo $_prefixVariable88;?>

				alert("已登入合作藥局，請先登出再登入會員");
			<?php ob_start();
}
$_prefixVariable89 = ob_get_clean();
echo $_prefixVariable89;?>

		});
	<?php echo '</script'; ?>
>
	
	<div style="margin-bottom:70px;">
		<?php ob_start();
if ($_smarty_tpl->tpl_vars['page']->value == "URlogin") {
$_prefixVariable90 = ob_get_clean();
echo $_prefixVariable90;?>

		<h1 style=" font-size: 40px;letter-spacing: 3px;line-height: 100%;text-align: center;">會員登入</h1>
		<?php ob_start();
}
$_prefixVariable91 = ob_get_clean();
echo $_prefixVariable91;?>

		<form id="login_form" method="post" autocomplete="false" class="login_form" action="/clogin">
			<div>
				<input id="email" name="email" type="email" placeholder="E-mail 信箱" autocomplete="email" class="form-control int">
				<input id="pwd" name="pwd" type="password" placeholder="密碼" class="form-control int">
				<div style="width:100%;">
					<input id="cap_code" name="cap_code" type="text" placeholder="驗證碼" class="form-control int" style="width:70%;float:left;">
					<img class="capimg" onClick="javascript:$(this).attr('src',$(this).attr('src')+'?'+Math.random());" src="/captcha/cap.php">  	
				</div>
			</div>
			<br><br>
			<input type="submit" class="btn btn-default btn-lg btn-block margin-bottom10 int" value="登入">
			<div class="text-center padding-bottom30">
				<a href="/URregist" class="pull-left btn btn-default">註冊新會員</a>
				<a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['linelogin_url']->value;
$_prefixVariable92 = ob_get_clean();
echo $_prefixVariable92;?>
?response_type=code&client_id=<?php ob_start();
echo $_smarty_tpl->tpl_vars['linelogin_code']->value;
$_prefixVariable93 = ob_get_clean();
echo $_prefixVariable93;?>
&redirect_uri=https://<?php ob_start();
echo $_smarty_tpl->tpl_vars['burl']->value;
$_prefixVariable94 = ob_get_clean();
echo $_prefixVariable94;?>
&state=NO_STATE&scope=openid%20email%20profile" class="line pull-left btn btn-default">&nbsp;&nbsp;&nbsp;</a>
				<a class="pull-right" href="/URforget" style="line-height: 50px;color: #8FC31F;">忘記密碼</a>
			</div>
		</form>
		
	</div><?php }
}
