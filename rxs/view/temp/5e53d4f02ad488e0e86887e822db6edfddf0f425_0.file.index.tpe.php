<?php
/* Smarty version 3.1.33, created on 2023-05-08 08:01:11
  from 'C:\wamp64\www\rxs\view\index.tpe' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6458ac471ac069_32841083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e53d4f02ad488e0e86887e822db6edfddf0f425' => 
    array (
      0 => 'C:\\wamp64\\www\\rxs\\view\\index.tpe',
      1 => 1606564918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:URlogin.tpe' => 1,
  ),
),false)) {
function content_6458ac471ac069_32841083 (Smarty_Internal_Template $_smarty_tpl) {
?>		<style>
			.capDiv{
				background-color: rgba(195, 195, 195, 0.18);
				width: 200px;
				margin-left:auto;
				margin-right:auto;
				padding-top: 10px;
				padding-bottom: 10px;
			}
			.mobile_login_dv{
				height:700px;
				width:100%;
			}
			@media (min-width: 1200px){
				.mobile_login_dv{
					display:none;
				}
			}
			.video-container {

				position: relative;

				padding-bottom: 56.25%;

				padding-top: 30px;

				height: 0;

				overflow: hidden;

			}

			.video-container iframe, .video-container object, .video-container embed {

				position: absolute;

				top: 0;left: 0;

				width: 100%;

				height: 100%;
			}
		</style>
		<div class="div_wap">
			<?php ob_start();
if (!$_smarty_tpl->tpl_vars['ud']->value && !$_smarty_tpl->tpl_vars['pAgent']->value) {
$_prefixVariable69 = ob_get_clean();
echo $_prefixVariable69;?>

				<div class="mobile_login_dv">
					<div style="text-align:center;">
						<img alt="Brand" src="/resource/img/logo_m.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable70 = ob_get_clean();
echo $_prefixVariable70;?>
" style="width:250px;">
					</div>						
					<?php ob_start();
$_smarty_tpl->_subTemplateRender("file:URlogin.tpe", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_prefixVariable71 = ob_get_clean();
echo $_prefixVariable71;?>

				</div>
			<?php ob_start();
}
$_prefixVariable72 = ob_get_clean();
echo $_prefixVariable72;?>

			<!-- 滑動簡介 -->
			<div class="row">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators" style="margin-bottom:0px;">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
						<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
						<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
						<li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
						<li data-target="#carousel-example-generic" data-slide-to="5" class=""></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox" >
						<div class="item active">
							<a target="_blank">
								<img src="/resource/img/pj2.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable73 = ob_get_clean();
echo $_prefixVariable73;?>
" alt="" >
							</a>
							<div class="carousel-caption capDiv"></div>
						</div>
						<div class="item" >
							<a target="_blank">
								<img src="/resource/img/pj1.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable74 = ob_get_clean();
echo $_prefixVariable74;?>
" alt="" >
							</a>
							<div class="carousel-caption capDiv"></div>
						</div>
						<div class="item">
							<a target="_blank">
								<img src="/resource/img/pj3.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable75 = ob_get_clean();
echo $_prefixVariable75;?>
" alt="" >
							</a>
							<div class="carousel-caption capDiv"></div>
						</div>
						<div class="item">
							<a target="_blank">
								<img src="/resource/img/pj4.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable76 = ob_get_clean();
echo $_prefixVariable76;?>
" alt="" >
							</a>
							<div class="carousel-caption capDiv"></div>
						</div>
						<div class="item">
							<a target="_blank">
								<img src="/resource/img/pj5.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable77 = ob_get_clean();
echo $_prefixVariable77;?>
" alt="" >
							</a>
							<div class="carousel-caption capDiv"></div>
						</div>
						<div class="item">
							<a target="_blank">
								<img src="/resource/img/pj6.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable78 = ob_get_clean();
echo $_prefixVariable78;?>
" alt="" >
							</a>
							<div class="carousel-caption capDiv"></div>
						</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<!-- youtube -->
			<div style="margin-bottom:70px;max-height:500px;">
				<div class="embed-responsive embed-responsive-4by3">
					<iframe style="max-height:500px;" src="https://www.youtube.com/embed/<?php ob_start();
echo $_smarty_tpl->tpl_vars['indxYT']->value;
$_prefixVariable79 = ob_get_clean();
echo $_prefixVariable79;?>
" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</div>
			<!--div class="video-container" style="margin-bottom:70px;height:500px;">
				<div class="embed-responsive embed-responsive-4by3">
					<iframe style="width:1160px;height:500px;" src="https://www.youtube.com/embed/Z-6Yywo0USE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div-->
			
			<style>
				.col-md-dv{
					text-align:center;
				}
				.col-detail{
					position:absolute;
					bottom:10px;
				}
			</style>
			<!-- 六格方塊 -->
			<div class="row">
				<div class="col-md-4 col-md-dv">
                    <div class="thumbnail">
						<a target="_blank">
							<img class="img-responsive img-rounded" src="/resource/img/sixpic1.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable80 = ob_get_clean();
echo $_prefixVariable80;?>
" alt="">
						</a>
						<div class="caption" style="text-align:center;height:130px;">
							<h4 class="title m-margintop10 m-marginbottom10">
								<a  target="_blank">
									​不改變你的領藥習慣<br>
									只找你信任的藥師
								</a>
							</h4>
						</div>
                    </div>
					
                </div>
                <div class="col-md-4 col-md-dv">
                    <div class="thumbnail">
						<a target="_blank">
							<img class="img-responsive img-rounded" src="/resource/img/sixpic5.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable81 = ob_get_clean();
echo $_prefixVariable81;?>
" alt="">
						</a>
						<div class="caption" style="text-align:center;height:130px;">
							<h4 class="title m-margintop10 m-marginbottom10">
								<a>​
									上傳慢箋後，你再也不需擔心忘記領藥時間
								</a>
							</h4>
						</div>
                    </div>
                </div>
                <div class="col-md-4 col-md-dv">
                    <div class="thumbnail">
						<a target="_blank">
							<img class="img-responsive img-rounded" src="/resource/img/sixpic3.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable82 = ob_get_clean();
echo $_prefixVariable82;?>
" alt="">
						</a>
						<div class="caption" style="text-align:center;height:130px;">
							<h4 class="title m-margintop10 m-marginbottom10">
								<a>
									當藥局可領藥時，慢箋雲端會透過網頁、email及Line主動通知
								</a>
							</h4>
						</div>
                    </div>
                </div>
                <div class="col-md-4 col-md-dv">
                    <div class="thumbnail">
						<a target="_blank">
							<img class="img-responsive img-rounded" src="/resource/img/sixpic4.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable83 = ob_get_clean();
echo $_prefixVariable83;?>
" alt="">
						</a>
						<div class="caption" style="text-align:center;height:130px;">
							<h4 class="title m-margintop10 m-marginbottom10">
								<a>​​
									依據用戶們的評分制度
									<br>
									讓藥師們的專業服務受到肯定
								</a>
							</h4>
						</div>
                    </div>
                </div>
                <div class="col-md-4 col-md-dv">
                    <div class="thumbnail">
						<a target="_blank">
							<img class="img-responsive img-rounded" src="/resource/img/sixpic6.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable84 = ob_get_clean();
echo $_prefixVariable84;?>
" alt="">
						</a>
						<div class="caption" style="text-align:center;height:130px;">
							<h4 class="title m-margintop10 m-marginbottom10">
								<a>​
									創造次世代的慢箋領取服務<br>
									期許能與政府合作<br>
									做到慢箋雲端化
								</a>
							</h4>
						</div>
                    </div>
                </div>
                <div class="col-md-4 col-md-dv">
                    <div class="thumbnail">
						<a target="_blank">
							<img class="img-responsive img-rounded" src="/resource/img/sixpic2.png?v=<?php ob_start();
echo $_smarty_tpl->tpl_vars['ver']->value;
$_prefixVariable85 = ob_get_clean();
echo $_prefixVariable85;?>
" alt="">
						</a>
						<div class="caption" style="text-align:center;height:130px;">
							<h4 class="title m-margintop10 m-marginbottom10">
								<a>​
									致力於縮減慢性病患者領藥的不便利
								</a>
							</h4>
						</div>
                    </div>
                </div>
            </div>
			
		</div><?php }
}
