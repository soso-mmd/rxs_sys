<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:29:50
  from 'C:\wamp64\www\rxmag\_view\qalist.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458b2fee9df75_34867801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad2dd8b2289e7ef17ff8daa1479d693d5e9fd012' => 
    array (
      0 => 'C:\\wamp64\\www\\rxmag\\_view\\qalist.tpe',
      1 => 1589368119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458b2fee9df75_34867801 (Smarty_Internal_Template $_smarty_tpl) {
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
				$("input[name=qq]").val($("#qq"+aid).val());
				$("input[name=qa]").val($("#qa"+aid).val());
				$("input[name=qtype]").val($("#qtype"+aid).val());
				$("input[name=qenb]").val($("#qenb"+aid).val());
				
				if(act=="del"){
					if(confirm("確認刪除問題?"))
						$("#mform").submit();
				}else{
					$("#mform").submit();
				}
					
			}
		<?php echo '</script'; ?>
>
	</head>
	<body>
		<div style="width:100%;text-align:center;margin-bottom:30px;">
			<span style="font-size:36pt;font-weight:bolder;">FQA管理</span>
		</div>
		<form id="mform" class="srcform" action="/z/qalist" method="post" >
			<input type="hidden" name="act">
			<input type="hidden" name="val">
			<input type="hidden" name="qq">
			<input type="hidden" name="qa">
			<input type="hidden" name="qtype">
			<input type="hidden" name="qenb">
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
>啟用</option>
				<option value="1" <?php ob_start();
if ($_smarty_tpl->tpl_vars['ihtype']->value == "1") {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
selected<?php ob_start();
}
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
>停用</option>
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
						<th scope="col">問題</th>
						<th scope="col">解答</th>
						<th scope="col">類型</th>
						<th scope="col">狀態</th>
						<th scope="col">操作</th>
					</tr>
				</thead>
				<tbody>
				<tr style="background-color: #4c4b4b;">
					<td>
						<textarea class="form-control" id="qqn" style="height: 100px;"></textarea>
					</td>
					<td>
						<textarea class="form-control" id="qan" style="height: 100px;"></textarea>
					</td>
					<td>
						<select id="qtypen"  class="srcSel form-control tw-sel">
							<option value="0" >文字</option>
							<option value="1" >影片</option>
						</select>
					</td>
					<td>
						<select id="qenbn"  class="srcSel form-control tw-sel">
							<option value="0" >啟用</option>
							<option value="1" >停用</option>
						</select>
					</td>
					<td>
						<input class="btn btn-primary" type="button" onclick="btnClick('new','n');" value="新增">
					</td>
				</tr>
				<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['iph']->value, 'ph');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ph']->value) {
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

				<tr>
					<td>
						<textarea class="form-control" id="qq<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[0];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
" style="height: 100px;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[1];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
</textarea>
					</td>
					<td>
						<textarea class="form-control" id="qa<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[0];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
" style="height: 100px;"><?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value[3] == 1) {
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
https://youtu.be/<?php ob_start();
}
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;
ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[2];
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
</textarea>
					</td>
					<td>
						<select id="qtype<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[0];
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
"  class="srcSel form-control tw-sel">
							<option value="0" <?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value[3] == 0) {
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
selected<?php ob_start();
}
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
>文字</option>
							<option value="1" <?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value[3] == 1) {
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>
selected<?php ob_start();
}
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>
>影片</option>
						</select>
					</td>
					<td>
						<select id="qenb<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[0];
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>
"  class="srcSel form-control tw-sel">
							<option value="0" <?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value[4] == 0) {
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>
selected<?php ob_start();
}
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>
>啟用</option>
							<option value="1" <?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value[4] == 1) {
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>
selected<?php ob_start();
}
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>
>停用</option>
						</select>
						<br>
						<?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value[4] == 0) {
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;?>

							<span style="color:green;">啟用</span>
						<?php ob_start();
} elseif ($_smarty_tpl->tpl_vars['ph']->value[4] == 1) {
$_prefixVariable30 = ob_get_clean();
echo $_prefixVariable30;?>

							<span style="color:red;">停用</span>
						<?php ob_start();
}
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>

						
					</td>
					<td>
						<input class="btn btn-success" type="button" onclick="btnClick('sav',<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[0];
$_prefixVariable32 = ob_get_clean();
echo $_prefixVariable32;?>
);" value="儲存">
						<input class="btn btn-danger" type="button" onclick="btnClick('del',<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value[0];
$_prefixVariable33 = ob_get_clean();
echo $_prefixVariable33;?>
);" value="刪除">
					</td>
				</tr>
				<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable34 = ob_get_clean();
echo $_prefixVariable34;?>

			  </tbody>
			</table>
		</form>
	</body>
</html><?php }
}
