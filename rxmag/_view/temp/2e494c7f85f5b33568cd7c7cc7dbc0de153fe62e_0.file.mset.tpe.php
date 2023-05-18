<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:33:32
  from 'C:\wamp64\www\rxmag\_view\mset.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458b3dc5809f7_74821728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e494c7f85f5b33568cd7c7cc7dbc0de153fe62e' => 
    array (
      0 => 'C:\\wamp64\\www\\rxmag\\_view\\mset.tpe',
      1 => 1599470611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458b3dc5809f7_74821728 (Smarty_Internal_Template $_smarty_tpl) {
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
		<?php echo '<script'; ?>
 type="text/javascript" src="/resource/js/main.js?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
"><?php echo '</script'; ?>
>
		<link href="/resource/css/bootstrap.min.css?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
" rel="stylesheet" type="text/css">
		<link href="/resource/css/main.css?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
" rel="stylesheet" type="text/css">
		<?php echo '<script'; ?>
>
			$(function(){
				top.SetCwinHeight();
			});
			function btnClick(aid,cmd){
				if(confirm('確認修改:'+cmd)){
					$("input[name=act]").val(aid);
					$("input[name=val]").val($("#val_"+aid).val());
					$("#mform").submit();
				}
			}
		<?php echo '</script'; ?>
>
	</head>
	<body>
		<div style="width:100%;text-align:center;margin-bottom:30px;">
			<span style="font-size:36pt;font-weight:bolder;">系統設定</span>
		</div>
		<form id="mform" class="srcform" action="/z/mset" method="post" >
			<input type="hidden" name="act">
			<input type="hidden" name="val">
			<table class="table table-sm table-dark">
				<thead>
					<tr>
						<th scope="col">設定</th>
						<th scope="col">說明</th>
						<th scope="col">操作</th>
					</tr>
				</thead>
				<tbody>
				<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['iph']->value, 'p', false, 'pt');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pt']->value => $_smarty_tpl->tpl_vars['p']->value) {
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>

				<tr>
					<th colspan=3 style="text-align:center;color:antiquewhite;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['pt']->value;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</th>
				</tr>
				<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['p']->value, 'ph');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ph']->value) {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

				<tr>
					<td>
						<input class="form-control" type="<?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value[0] == 'mailPass') {
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
password<?php ob_start();
} else {
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
text<?php ob_start();
}
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
" id="val_<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[0];
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
" value="<?php ob_start();
if (in_array($_smarty_tpl->tpl_vars['ph']->value[0],$_smarty_tpl->tpl_vars['YTset']->value)) {
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
https://youtu.be/<?php ob_start();
}
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;
ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[1];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
">
					</td>
					<td>
						<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[2];
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

					</td>
					<td>
						<input class="btn btn-success" type="button" onclick="btnClick('<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[0];
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
','<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[2];
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
');" value="儲存">
					</td>
				</tr>
				<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>

				<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>

			  </tbody>
			</table>
		</form>
	</body>
</html><?php }
}
