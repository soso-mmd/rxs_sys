<?php
/* Smarty version 3.1.33, created on 2023-05-08 09:04:54
  from 'C:\wamp64\www\rxs\view\AgentMap.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458bb3643ee68_41940181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b04b99e25df83e6c93b243e66e1086e4ca9bf62' => 
    array (
      0 => 'C:\\wamp64\\www\\rxs\\view\\AgentMap.tpe',
      1 => 1611911945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458bb3643ee68_41940181 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="resource/js/jquery.twzipcode.min.js"><?php echo '</script'; ?>
>  
<?php echo '<script'; ?>
>
	$(function(){
		$('#twzipcode').twzipcode({
			'css':['form-control tw-sel', 'form-control tw-sel'],
			'countyName':'ph_country',
			'districtName':'ph_district',
			'countySel':'<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph_country']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
',
			'districtSel':'<?php ob_start();
echo $_smarty_tpl->tpl_vars['ph_district']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
',
			
		});
		$("input[name=zipcode]").hide();
		$("td[name=phpro]").each(function(){
			$(this).html($(this).html().replace(/\n/g,"<br>"));
		});
			
	});
<?php echo '</script'; ?>
>	
<style>
.tw-sel{
	width:auto;
	display: inherit;
	margin-right:5px;
}
.rating{
	margin-bottom:0px;
	padding:0px;
	width:125px;
	float:left;
}
.rating li{
	float:left;
	width:25px;
	height:25px;
	background:url(/resource/img/nstar.png?<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
);
	cursor:pointer;
}
.cmt-spn{
	float:left;
	height:25px;
	line-height:25px;
	font-size:12pt;
	margin-left:5px; 
	margin-right:5px;
}
.maptab th{
	font-size:15pt;
}
.maptab td{
	font-size:14pt;
}
</style>
<form id="mapform" style="width:100%;text-align:center;" action="/AgentMap" method="post" >
	<span id="twzipcode" style=""></span>
	<input type="submit" class="btn btn-sm btn-primary" value="搜尋">
	<a href="/introPH" class="btn btn-sm btn-primary">推薦藥局</a>
</form>

<div style="width:100%;text-align:center;">
<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['agent']->value, 'ag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ag']->value) {
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

	<div class="row table_list padding-bottom30 padding-top30 element-item transition       " data-category="north" style="left: 15px; top: 0px;">
		<div class="col-md-5">
			<img src="photo/ph_img/img<?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[0];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
_photo.jpg" class="img-responsive img-rounded" alt="<?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[1];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
" style="max-height: 250px;margin-right: auto;margin-left: auto;">
		</div>
		<div class="col-md-7 table_list">
			<div class="table-responsive">
				<table class="table milk_table_list maptab" cellpadding="10">
					<tbody>
					<tr>
						<th class="col-md-2">名稱</th>
						<td>
							<?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[1];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>

							<?php ob_start();
if ($_smarty_tpl->tpl_vars['chat']->value == true) {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

							<a href="/Cmsg?ph=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[0];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
"><img src="/resource/img/mtk.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
" style="width:28px;height:28px"></a>
							<?php ob_start();
}
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>

						</td>
					</tr>
					<?php ob_start();
if ($_smarty_tpl->tpl_vars['ag']->value[9] != 0) {
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

					<tr>
						<th class="col-md-2">評價</th>
						<td>
							<div style="margin-left:auto;margin-right:auto;width:200px;">
								<span class="cmt-spn"><?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[9];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
</span>
								<ul class="rating"> 
									<?php ob_start();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

										<li style="background:url(/resource/img/<?php ob_start();
if ($_smarty_tpl->tpl_vars['i']->value > $_smarty_tpl->tpl_vars['ag']->value[9]) {
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
n<?php ob_start();
}
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
star.png?<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
">
											<?php ob_start();
if ($_smarty_tpl->tpl_vars['i']->value-$_smarty_tpl->tpl_vars['ag']->value[9] < 1 && $_smarty_tpl->tpl_vars['i']->value > $_smarty_tpl->tpl_vars['ag']->value[9]) {
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
 <div style="background:url(/resource/img/star.png);height:25px;width:<?php ob_start();
echo ($_smarty_tpl->tpl_vars['ag']->value[9]-($_smarty_tpl->tpl_vars['i']->value-1))*25;
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
px;"></div><?php ob_start();
}
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>

										</li> 
									<?php ob_start();
}
}
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>

								</ul>
								<span class="cmt-spn">(<a href="/PHcmt?p=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[0];
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>
" style="color:blue;"><u><?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[10];
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>
</u></a>)</span>
							</div>
						</td>
					</tr>
					<?php ob_start();
}
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>

					<tr>
						<th class="col-md-2">地址</th><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[2];
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;
ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[3];
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;
ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[4];
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>
 -<a class="greenfont" href="https://www.google.com.tw/maps/place/<?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[2];
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;
ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[3];
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;
ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[4];
$_prefixVariable30 = ob_get_clean();
echo $_prefixVariable30;?>
" target="_blank">map</a></td>
					</tr>
					<tr>
						<th class="col-md-2">電話</th><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[7];
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>
</td>
					</tr>
					<tr>
						<th class="col-md-2">營業日</th><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[5];
$_prefixVariable32 = ob_get_clean();
echo $_prefixVariable32;?>
</td>
					</tr>
					<tr>
						<th class="col-md-2">營業時間</th><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[6];
$_prefixVariable33 = ob_get_clean();
echo $_prefixVariable33;?>
</td>
					</tr>
					<tr>
						<th class="col-md-2">簡介</th><td name="phpro"><?php ob_start();
echo $_smarty_tpl->tpl_vars['ag']->value[8];
$_prefixVariable34 = ob_get_clean();
echo $_prefixVariable34;?>
</td>
					</tr>
				</tbody></table>
				
			</div>
		</div>
	</div>
<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable35 = ob_get_clean();
echo $_prefixVariable35;?>

</div><?php }
}
