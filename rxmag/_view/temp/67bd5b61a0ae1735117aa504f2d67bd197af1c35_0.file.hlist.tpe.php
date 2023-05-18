<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:29:41
  from 'C:\wamp64\www\rxmag\_view\hlist.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458b2f503c0f0_68968550',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67bd5b61a0ae1735117aa504f2d67bd197af1c35' => 
    array (
      0 => 'C:\\wamp64\\www\\rxmag\\_view\\hlist.tpe',
      1 => 1599817839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458b2f503c0f0_68968550 (Smarty_Internal_Template $_smarty_tpl) {
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
				$(".rxImg").click(function(){
					window.open($(this).attr("src"));
				});
			});
			function btnClick(act,aid,enb,phname){
				$("input[name=act]").val(act);
				$("input[name=val]").val(aid);
				$("input[name=enb]").val(enb);
				if(enb==1){
					if(confirm("確認關閉"+phname+'?'))
						$("#mform").submit();
				}else
					$("#mform").submit();
			}
		<?php echo '</script'; ?>
>
	</head>
	<body>
		<div style="width:100%;text-align:center;margin-bottom:30px;">
			<span style="font-size:36pt;font-weight:bolder;">藥局列表</span>
		</div>
		<form id="mform" class="srcform" action="/z/hlist" method="post" >
			<input type="hidden" name="act">
			<input type="hidden" name="val">
			<input type="hidden" name="enb">
			狀態:
			<select name="ihtype" class="srcSel form-control tw-sel" onchange="$('#mform').submit();">
				<option value="1" <?php ob_start();
if ($_smarty_tpl->tpl_vars['ihtype']->value == "1") {
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
selected<?php ob_start();
}
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
>啟用</option>
				<option value="2" <?php ob_start();
if ($_smarty_tpl->tpl_vars['ihtype']->value == "2") {
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
			<div class="mtable">
			<table class="table table-sm table-dark">
				<thead>
					<tr>
						<th scope="col">藥局名稱</th>
						<th scope="col">登記字號</th><!-- 配許可執照-->
						<th scope="col">負責藥師</th><!-- 配藥師執照-->
						<th scope="col">藥局資訊</th><!-- 電話、地址-->
						<th scope="col">藥局外觀</th>
						<th scope="col">狀態</th>
						<th scope="col">操作</th>
					</tr>
				</thead>
				<tbody >
				<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['iph']->value, 'ph');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ph']->value) {
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

				<tr>
					<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag003'];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
</td>
					<td>
						<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag002'];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

						<br>
						<img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['imgUrl']->value;
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
photo/ph_img/img<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag001'];
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
_license.jpg?<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
" class="rxImg">
					</td>
					<td>
						<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag011'];
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>

						<br>
						<img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['imgUrl']->value;
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
photo/ph_img/img<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag001'];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
_PHlicense.jpg?<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
" class="rxImg">
					</td>
					<td class="mtd">
						<div style="float:left;text-align:right;">
							申請時間&nbsp;:&nbsp;	
							<br>最後登入&nbsp;:&nbsp;	
							<br>電話&nbsp;:&nbsp;	
							<br>地址&nbsp;:&nbsp;
						</div>
						<div style="float:left;text-align:left;">
							<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag009'];
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>

							<br><?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag010'];
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>

							<br><?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag014'];
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>

							<br><?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag006'];
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;
ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag007'];
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>

							<br><?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag008'];
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>

						</div>
					</td>
					<td>
						<img src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['imgUrl']->value;
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>
photo/ph_img/img<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag001'];
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;?>
_photo.jpg?<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable30 = ob_get_clean();
echo $_prefixVariable30;?>
" class="rxImg">
					</td>
					<td>
						<?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value['pag005'] == 1) {
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>

							<span style="color:lime;">啟用</span>
						<?php ob_start();
} elseif ($_smarty_tpl->tpl_vars['ph']->value['pag005'] == 0) {
$_prefixVariable32 = ob_get_clean();
echo $_prefixVariable32;?>

							<span style="color:#9ac4f7;">新申請</span>
						<?php ob_start();
} else {
$_prefixVariable33 = ob_get_clean();
echo $_prefixVariable33;?>

							<span style="color:red;">停用</span>
						<?php ob_start();
}
$_prefixVariable34 = ob_get_clean();
echo $_prefixVariable34;?>

					</td>
					<td>
						<input class="btn <?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value['pag005'] == 1) {
$_prefixVariable35 = ob_get_clean();
echo $_prefixVariable35;?>
btn-danger<?php ob_start();
} else {
$_prefixVariable36 = ob_get_clean();
echo $_prefixVariable36;?>
btn-success<?php ob_start();
}
$_prefixVariable37 = ob_get_clean();
echo $_prefixVariable37;?>
" type="button" onclick="btnClick('okt',<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag001'];
$_prefixVariable38 = ob_get_clean();
echo $_prefixVariable38;?>
,<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag005'];
$_prefixVariable39 = ob_get_clean();
echo $_prefixVariable39;?>
,'<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph']->value['pag003'];
$_prefixVariable40 = ob_get_clean();
echo $_prefixVariable40;?>
');" value="<?php ob_start();
if ($_smarty_tpl->tpl_vars['ph']->value['pag005'] == 1) {
$_prefixVariable41 = ob_get_clean();
echo $_prefixVariable41;?>
停用<?php ob_start();
} else {
$_prefixVariable42 = ob_get_clean();
echo $_prefixVariable42;?>
啟用<?php ob_start();
}
$_prefixVariable43 = ob_get_clean();
echo $_prefixVariable43;?>
">
					</td>
				</tr>
				<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable44 = ob_get_clean();
echo $_prefixVariable44;?>

			  </tbody>
			</table>
			</div>
		</form>
	</body>
</html><?php }
}
