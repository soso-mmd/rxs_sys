<?php

/* Smarty version 3.1.33, created on 2023-05-08 08:03:42
  from 'C:\wamp64\www\rxs\view\fqa.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458acde3ae427_79008156',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c23f571b1149349362d52c4607d8b718696d7245' => 
    array (
      0 => 'C:\\wamp64\\www\\rxs\\view\\fqa.tpe',
      1 => 1589358794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6458acde3ae427_79008156 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
	.outdv{
		background-color: #f4f4f4;
		margin-bottom: 1rem;
		border-style: solid;
		border-width: 1px;
		border-radius: .25rem;
		border-color: transparent;
		box-sizing: border-box;
		font-size: 16pt;
		font-family: karla,-apple-system,BlinkMacSystemFont,segoe ui,微軟正黑體,microsoft jhenghei,sans-serif;
		line-height: 1.6em;
		color: #3f3f3f;
	}
	.q_dv:before{
		content: "▾ ";
	}
	.q_dv{
		font-weight: 700;
		padding: 1rem;
		cursor: pointer;
	}
	.q_a{
		float: right;
		color: #3f3f3f;
	}
	.a_dv{
		background-color: #fdfdfd;
		margin-left: 1rem;
		margin-right: 1rem;
		margin-bottom: 1rem;
		padding: 1rem;
		border-radius: .125rem;
		display:none;
		max-height:500px;
	}
</style>
<?php echo '<script'; ?>
>
	$(function(){
		$(".q_dv").on("click",function(){
			$(this).parent().children(".a_dv").toggle('fast');
		});
		<?php ob_start();
if ($_smarty_tpl->tpl_vars['q']->value != 0) {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

			$("#q<?php ob_start();
echo $_smarty_tpl->tpl_vars['q']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
").click();
			$('html, body').animate({
				scrollTop: $("#q<?php ob_start();
echo $_smarty_tpl->tpl_vars['q']->value;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
").parent().offset().top-98
			}, 2000);
		<?php ob_start();
}
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

	});
<?php echo '</script'; ?>
>
<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['qa']->value, 'a', false, 'q');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['q']->value => $_smarty_tpl->tpl_vars['a']->value) {
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>

<div class="outdv">
	<div class="q_dv" id="q<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[0];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
">
		<a class="q_a">
			<img src="/resource/img/fqa.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
">
		</a>
		<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[1];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

	</div>
	<div class="a_dv">
		<?php ob_start();
if ($_smarty_tpl->tpl_vars['a']->value[3] == 0) {
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

			<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[2];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

		<?php ob_start();
} elseif ($_smarty_tpl->tpl_vars['a']->value[3] == 1) {
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>

			<div class="embed-responsive embed-responsive-4by3">
				<iframe style="max-height:500px;" src="https://www.youtube.com/embed/<?php ob_start();
echo $_smarty_tpl->tpl_vars['a']->value[2];
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
" frameborder="0" allowfullscreen=""></iframe>
			</div>
		<?php ob_start();
}
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>

	</div>
</div>
<?php ob_start();
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;
}
}
