<?php
/* Smarty version 3.1.33, created on 2023-05-08 09:04:59
  from 'C:\wamp64\www\rxs\view\introPH.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458bb3bbfc999_02536329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe4787bbc7ecf96a9760caf64f516654629a5b41' => 
    array (
      0 => 'C:\\wamp64\\www\\rxs\\view\\introPH.tpe',
      1 => 1579706723,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458bb3bbfc999_02536329 (Smarty_Internal_Template $_smarty_tpl) {
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
				var item ={
					'pname':'input',
					'paddress':'input',
					'cap_code':'input',
				};
				for(var i in item){
					var obj = $(item[i]+'[name='+i+']');
					if(obj.val()==''){
						alert('資料有缺，請填寫完整');
						obj.focus();
						return false;
					}
					
				}
			});
			<?php ob_start();
if ($_smarty_tpl->tpl_vars['msg']->value != '') {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

				alert('<?php ob_start();
echo $_smarty_tpl->tpl_vars['msg']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
');
			<?php ob_start();
}
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>

		});
	<?php echo '</script'; ?>
>
	
	<div style="margin-bottom:70px;">
		<h1 style=" font-size: 40px;letter-spacing: 3px;line-height: 100%;text-align: center;">推薦藥局</h1>
		<form id="register_form" method="post" autocomplete="false" class="regist_form" action="/introPH">
			<div style="margin-bottom: 15px;">
				<input name="sa" type="hidden" value="s">
				<input name="pname" type="text" placeholder="藥局名稱" class="regist_input">
				<input name="paddress" type="text" placeholder="藥局地址" class="regist_input">
				<div style="width:100%;display:flow-root;">
					<input name="cap_code" type="text" placeholder="驗證碼" class="regist_input" style="width:70%;float:left;">
					<img class="capimg" onClick="javascript:$(this).attr('src',$(this).attr('src')+'?'+Math.random());" src="/captcha/cap.php">  	
				</div>
			</div>
			<div class="col-md-12 text-center">
				<input type="submit" class="btn btn-default btn-lg" value="推薦">
			</div>
		</form>
	</div><?php }
}
