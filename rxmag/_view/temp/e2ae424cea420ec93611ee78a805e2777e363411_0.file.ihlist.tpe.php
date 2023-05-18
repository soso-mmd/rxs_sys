<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:29:46
  from 'C:\wamp64\www\rxmag\_view\ihlist.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458b2fa66f341_33680018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2ae424cea420ec93611ee78a805e2777e363411' => 
    array (
      0 => 'C:\\wamp64\\www\\rxmag\\_view\\ihlist.tpe',
      1 => 1589365209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458b2fa66f341_33680018 (Smarty_Internal_Template $_smarty_tpl) {
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
			function btnClick(act,aid){
				$("input[name=act]").val(act);
				$("input[name=val]").val(aid);
				$("#mform").submit();
			}
		<?php echo '</script'; ?>
>
	</head>
	<body>
		<div style="width:100%;text-align:center;margin-bottom:30px;">
			<span style="font-size:36pt;font-weight:bolder;">推薦藥局</span>
		</div>
		<form id="mform" class="srcform" action="/z/ihlist" method="post" >
			<input type="hidden" name="act">
			<input type="hidden" name="val">
			狀態:
			<select name="ihtype" class="srcSel form-control tw-sel" onchange="$('#mform').submit();">
				<option value="0" <?php ob_start();
if ($_smarty_tpl->tpl_vars['ihtype']->value == "0") {
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
selected<?php ob_start();
}
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
>未處理</option>
				<option value="1" <?php ob_start();
if ($_smarty_tpl->tpl_vars['ihtype']->value == "1") {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
selected<?php ob_start();
}
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
>以處理</option>
				<option value="a" <?php ob_start();
if ($_smarty_tpl->tpl_vars['ihtype']->value == "a") {
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
selected<?php ob_start();
}
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
>全部</option>
			</select>
			<table class="table table-sm table-dark">
				<thead>
					<tr>
						<th scope="col">名稱</th>
						<th scope="col">地址</th>
						<th scope="col">時間</th>
						<th scope="col">狀態</th>
						<th scope="col">操作</th>
					</tr>
				</thead>
				<tbody>
				<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['iph']->value, 'ph');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ph']->value) {
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

				<tr>
					<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[1];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
</td>
					<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[2];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
</td>
					<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[3];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
</td>
					<td>
						<?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value[4] == 0) {
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

							<span style="color:red;">未處理</span>
						<?php ob_start();
} elseif ($_smarty_tpl->tpl_vars['ph']->value[4] == 1) {
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>

							<span style="color:green;">已完成</span>
						<?php ob_start();
}
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>

					</td>
					<td>
						<?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value[4] == 0) {
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>

							<input class="btn btn-xs btn-success" type="button" onclick="btnClick('okt',<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[0];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
);" value="處理">
						<?php ob_start();
}
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>

					</td>
				</tr>
				<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>

			  </tbody>
			</table>
		</form>
	</body>
</html><?php }
}
