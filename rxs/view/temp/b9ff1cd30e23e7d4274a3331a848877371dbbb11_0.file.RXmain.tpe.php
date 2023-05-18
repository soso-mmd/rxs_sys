<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:59:29
  from 'C:\wamp64\www\rxs\view\RXmain.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458b9f11a8680_48418294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9ff1cd30e23e7d4274a3331a848877371dbbb11' => 
    array (
      0 => 'C:\\wamp64\\www\\rxs\\view\\RXmain.tpe',
      1 => 1611916354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458b9f11a8680_48418294 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="resource/js/jquery.tablesorter.min.js?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
"><?php echo '</script'; ?>
>
<link href="/resource/css/theme.blue.min.css?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
" rel="stylesheet" type="text/css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="resource/js/artdialog/jquery.artDialog.js?skin=blue"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="resource/js/artdialog/plugins/iframeTools.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
	<?php ob_start();
if (count($_smarty_tpl->tpl_vars['rx_user']->value) == 0) {
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
 
		alert("請先新增慢箋使用者");
		location.href="/RXregister";
	<?php ob_start();
}
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

	$(function(){
		$("#orderTable").tablesorter({
			theme: "blue",
			widgets: ['zebra'],
			headers: {
				6:{
					sorter:false
				}
			}
		});
		if('<?php ob_start();
echo $_smarty_tpl->tpl_vars['msg']->value;
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
'!= '')
			alert('<?php ob_start();
echo $_smarty_tpl->tpl_vars['msg']->value;
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
');
		blink(".blind");
	});
	function blink(selector){
		$(selector).fadeOut('slow', function(){
			$(this).fadeIn('slow', function(){
				blink(this);
			});
		});
	}
	function printCmt(clv){
		for(var i=1; i<6; i++){
			if(i <= clv){
				$("li[clv='"+i+"']").css("background","url(/resource/img/star.png?<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
)");
			}else{
				$("li[clv='"+i+"']").css("background","url(/resource/img/nstar.png?<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
)");
			}
		}
		$("#sco").val(clv);
	}
	function cmt(oid,clv,cm){
		
		var cnt = function(){
			printCmt(clv);
			$(".rating li").hover(function(){
				var cclv = $(this).attr('clv');
				printCmt(cclv);
			});
			$("#cmt").val(cm);
		};
		var okFun = function(){
			if($("#sco").val()>0){
				$("#cmtForm").submit();
			}else{
				alert("尚未評分");
				return false;
			}
		};
		var dialog=art.dialog({
			id: 'testID',
			title: '慢箋編號:'+oid,
			padding: 0,
			content: $("#cmtTxt").text().replace("$oid",oid),
			cancel:true,
			cancelVal: '\u95dc\u9589',
			okVal:'確認',
			ok:okFun,
			lock:true,
			init:cnt,
		});
		dialog.show();
		
	}
	function btnAction(act,oid){
		switch(act){
			case "cls":
				if(!confirm('確認要取消慢箋編號:'+oid+'  ?'))
					return;
				break;
		}
		$("#act").val(act);
		$("#val").val(oid);
		$("#mapform").submit();
	}
	
<?php echo '</script'; ?>
>
<style>
	.rxItem{
		float:left;
		
	}
	.rxAdd{
		height:35px;
	}
	.rxmain{
		width:100%;
		text-align:center;
	}
	.rxstr{
		width:100%;
		text-align:center;
		font-size:6rem;
		font-weight:bolder;
		margin-bottom:30px;
	}
	.srcSel{
		width: auto;
		display: unset;
	}
	.defOpt{
		color:#848484;
	}
	.srcform{
		font-size:14pt;
		width:100%;
		text-align:center;
		margin-bottom:40px;
	}
	.tablesorter{
		width:1140px;
		margin-left:auto;
		margin-right:auto;
		font-size:14pt;
		text-align:center;
	}
	.tablesorter th,.aui_title{
		font-size:14pt;
	}
	.rating{
		margin-bottom:0px;
		padding:0px;
		width:175px;
		display:flow-root;
	}
	.rating li{
		float:left;
		width:25px;
		height:25px;
		background:url(/resource/img/nstar.png?<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
);
		cursor:pointer;
	}
	.btn{
		font-size:16pt;
	}
	.addfont{
		font-size: 21pt;
		font-weight: bolder;
		vertical-align: top;
	}
	.srchtop{
		margin-top:5px;
	}
	@media screen and (max-width: 991px){
		.addfont{
			display:none;
		}
	}
</style>
<textarea style="display:none;" id="cmtTxt">
	<form id="cmtForm" action="/RXmain" method="post" >
		<input name="act" value="cmtOrd" type="hidden">
		<input name="val" id="val" value="$oid" type="hidden">
		<input name="sco" id="sco" value="" type="hidden">
		<div style="width:300px;height:80px;padding:20px;">
			<div style="width:100%;" id="diaCnt">
				<ul class="rating"> 
					<li oid="$oid" clv="1" ></li> 
					<li oid="$oid" clv="2" ></li> 
					<li oid="$oid" clv="3" ></li> 
					<li oid="$oid" clv="4" ></li> 
					<li oid="$oid" clv="5" ></li> 
				</ul>
			</div>
			評論:
			<input type="text" id="cmt" name="cmt" style="width:175px;">
		</div>
	</form>
</textarea>

<div class="rxmain">
	<div style="width:100%;text-align:center;">
		<span style="font-size:36pt;font-weight:bolder;">慢箋管理</span>
	</div>
	<form id="mapform" class="srcform" style="" action="/RXmain" method="post" >
		<input type="hidden" value="" id="val" name="val">
		<input type="hidden" value="" id="act" name="act">
		<select name="rxuser" class="srcSel form-control tw-sel">
			<option value="" class="defOpt">慢箋使用者</option>
			<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rx_user']->value, 'rx');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rx']->value) {
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

				<option value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['rx']->value[0];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
" <?php ob_start();
if ($_smarty_tpl->tpl_vars['rx']->value[0] == $_smarty_tpl->tpl_vars['itemVal']->value['rxuser']) {
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
selected<?php ob_start();
}
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
><?php ob_start();
echo $_smarty_tpl->tpl_vars['rx']->value[1];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
</option>
			<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>

		</select>
		<select name="rxtype" class="srchtop srcSel form-control tw-sel">
			<option value="" class="defOpt">慢箋狀態</option>
			<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ORDER_TYPE']->value, 'ty', false, 'otype');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['otype']->value => $_smarty_tpl->tpl_vars['ty']->value) {
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

				<option value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['otype']->value;
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
" <?php ob_start();
if ($_smarty_tpl->tpl_vars['otype']->value == $_smarty_tpl->tpl_vars['itemVal']->value['rxtype']) {
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
selected<?php ob_start();
}
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
><?php ob_start();
echo $_smarty_tpl->tpl_vars['ty']->value;
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
</option>
			<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>

		</select>
		<select name="rxtime" class="srchtop srcSel form-control tw-sel">
			<option value="3" <?php ob_start();
if ($_smarty_tpl->tpl_vars['itemVal']->value['rxtime'] == 3) {
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>
selected<?php ob_start();
}
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>
>三個月內</option>
			<option value="6" <?php ob_start();
if ($_smarty_tpl->tpl_vars['itemVal']->value['rxtime'] == 6) {
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>
selected<?php ob_start();
}
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>
>半年內</option>
			<option value="12"<?php ob_start();
if ($_smarty_tpl->tpl_vars['itemVal']->value['rxtime'] == 12) {
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>
selected<?php ob_start();
}
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>
>一年內</option>
			<option value="24"<?php ob_start();
if ($_smarty_tpl->tpl_vars['itemVal']->value['rxtime'] == 24) {
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>
selected<?php ob_start();
}
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;?>
>兩年內</option>
		</select>
		<input type="submit" class="srchtop btn btn-sm btn-primary" value="搜尋">
		<a href="/RXupload" class="srchtop" style="float:right;position: absolute;right: 15px;">
			<img src="resource/img/rx_add.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable30 = ob_get_clean();
echo $_prefixVariable30;?>
" class="rxAdd" title="上傳慢箋">
			<font class="addfont">新增慢箋</font>
		</a>
	
		<div style="overflow-x:auto;width:100%;">
			<table class="tablesorter" id="orderTable">
				<thead>
					<th>編號</th>
					<th width="90px">狀態</th>
					<th>指定藥局</th>
					<th width="120px">上傳時間</th>
					<th>慢箋使用者</th>
					<th>就診醫院</th>
					<th width="200px">操作</th>
				</thead>
				<tbody>
					<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rx_order']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>

					<tr>
						<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[0];
$_prefixVariable32 = ob_get_clean();
echo $_prefixVariable32;?>
</td>
						<td <?php ob_start();
if ($_smarty_tpl->tpl_vars['order']->value[1] == 4 || ($_smarty_tpl->tpl_vars['order']->value[1] == 2 && time() > strtotime($_smarty_tpl->tpl_vars['order']->value[11]))) {
$_prefixVariable33 = ob_get_clean();
echo $_prefixVariable33;?>
style="color:red"<?php ob_start();
} elseif ($_smarty_tpl->tpl_vars['order']->value[1] == 2) {
$_prefixVariable34 = ob_get_clean();
echo $_prefixVariable34;?>
style="color:green;"<?php ob_start();
}
$_prefixVariable35 = ob_get_clean();
echo $_prefixVariable35;?>
>
							<?php ob_start();
echo $_smarty_tpl->tpl_vars['ORDER_TYPE']->value[$_smarty_tpl->tpl_vars['order']->value[1]];
$_prefixVariable36 = ob_get_clean();
echo $_prefixVariable36;?>

							<br>
							<a href="/Cmsg?rx=<?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[0];
$_prefixVariable37 = ob_get_clean();
echo $_prefixVariable37;?>
" title="雲端通"><img style="height:25px;" src="/resource/img/mtk.png"></a>
						</td>
						<td  title="<?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[6];
$_prefixVariable38 = ob_get_clean();
echo $_prefixVariable38;?>
">
							<a href="/AgentMap?ph=<?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[10];
$_prefixVariable39 = ob_get_clean();
echo $_prefixVariable39;?>
"  class="greenfont 
								<?php ob_start();
if ($_smarty_tpl->tpl_vars['order']->value[1] == 2 && time() > strtotime($_smarty_tpl->tpl_vars['order']->value[11])) {
$_prefixVariable40 = ob_get_clean();
echo $_prefixVariable40;?>

									blind
								<?php ob_start();
}
$_prefixVariable41 = ob_get_clean();
echo $_prefixVariable41;?>

							"><?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[4];
$_prefixVariable42 = ob_get_clean();
echo $_prefixVariable42;?>
</a>
						</td>
						<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[2];
$_prefixVariable43 = ob_get_clean();
echo $_prefixVariable43;?>
</td>
						<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[3];
$_prefixVariable44 = ob_get_clean();
echo $_prefixVariable44;?>
</td>
						<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[5];
$_prefixVariable45 = ob_get_clean();
echo $_prefixVariable45;?>
-<a style="color:blue;" href="/photo/rx_img/rx<?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[0];
$_prefixVariable46 = ob_get_clean();
echo $_prefixVariable46;?>
.jpg" target="_blank">慢箋</a></td>
						<td style="text-align: center;vertical-align: middle;">
							<?php ob_start();
if ($_smarty_tpl->tpl_vars['order']->value[1] == 4 && $_smarty_tpl->tpl_vars['order']->value[8] != '' && $_smarty_tpl->tpl_vars['order']->value[8] != null) {
$_prefixVariable47 = ob_get_clean();
echo $_prefixVariable47;?>

							<div style="color:red">
								被取消原因:
								</br>
								<?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[8];
$_prefixVariable48 = ob_get_clean();
echo $_prefixVariable48;?>

							</div>
							<?php ob_start();
}
$_prefixVariable49 = ob_get_clean();
echo $_prefixVariable49;?>

							<?php ob_start();
if ($_smarty_tpl->tpl_vars['order']->value[1] == 2 && time() > strtotime($_smarty_tpl->tpl_vars['order']->value[11])) {
$_prefixVariable50 = ob_get_clean();
echo $_prefixVariable50;?>

							<div style="color:red">
								<?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[11];
$_prefixVariable51 = ob_get_clean();
echo $_prefixVariable51;?>

								<br>
								領藥期限已過
								<br>
								請直接連絡藥局
							</div>
							<?php ob_start();
}
$_prefixVariable52 = ob_get_clean();
echo $_prefixVariable52;?>

							<?php ob_start();
if ($_smarty_tpl->tpl_vars['order']->value[1] == 0) {
$_prefixVariable53 = ob_get_clean();
echo $_prefixVariable53;?>

								<input class="btn btn-xs btn-danger" type="button" onclick="btnAction('cls',<?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[0];
$_prefixVariable54 = ob_get_clean();
echo $_prefixVariable54;?>
)" value="取消慢箋">
							<?php ob_start();
}
$_prefixVariable55 = ob_get_clean();
echo $_prefixVariable55;?>

							<?php ob_start();
if ($_smarty_tpl->tpl_vars['order']->value[1] == 3) {
$_prefixVariable56 = ob_get_clean();
echo $_prefixVariable56;?>

								<input class="btn btn-xs btn-info" type="button" onclick="cmt('<?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[0];
$_prefixVariable57 = ob_get_clean();
echo $_prefixVariable57;?>
','<?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[7];
$_prefixVariable58 = ob_get_clean();
echo $_prefixVariable58;?>
','<?php ob_start();
echo $_smarty_tpl->tpl_vars['order']->value[9];
$_prefixVariable59 = ob_get_clean();
echo $_prefixVariable59;?>
')" value="評論">
							<?php ob_start();
}
$_prefixVariable60 = ob_get_clean();
echo $_prefixVariable60;?>

							
						</td>
					</tr>
					<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable61 = ob_get_clean();
echo $_prefixVariable61;?>

				</tbody>
			</table>
		</div>
	</form>
	
</div><?php }
}
