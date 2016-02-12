<?php /* Smarty version 3.1.27, created on 2015-08-12 17:27:49
         compiled from "/var/www/kia/app/modules/frontend/views/main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:126985345155cb57e5f37d86_33903120%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a16330fac2fbd9ba66d25e606433feb8ed6b0bd' => 
    array (
      0 => '/var/www/kia/app/modules/frontend/views/main.tpl',
      1 => 1439389669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126985345155cb57e5f37d86_33903120',
  'variables' => 
  array (
    'pages' => 0,
    'page' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55cb57e61111c0_00358854',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55cb57e61111c0_00358854')) {
function content_55cb57e61111c0_00358854 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '126985345155cb57e5f37d86_33903120';
?>
<div class="head_wrapper">
	<header class='header'>
		<div class="content">
			<a href="#" class='logo'></a>
			<div class="sign_wrapper">
				<?php
$_from = $_smarty_tpl->tpl_vars['pages']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['page']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
$foreach_page_Sav = $_smarty_tpl->tpl_vars['page'];
?>
					<a href="page/<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
</a>
				<?php
$_smarty_tpl->tpl_vars['page'] = $foreach_page_Sav;
}
?>
				<a href="price">price</a>
				<a href="#">sign in</a>
				<span>or</span>
				<a href="#">sign up</a>
			</div>
		</div>
	</header>
	<div class="main">
		<h1><?php echo $_smarty_tpl->tpl_vars['data']->value->titles[1];?>
</h1>
		<h2><?php echo $_smarty_tpl->tpl_vars['data']->value->titles[2];?>
</h2>
		<h3><?php echo $_smarty_tpl->tpl_vars['data']->value->titles[3];?>
</h3>
		<form class="main_form">
			<div class="input_wrapper">
				<input type="text" placeholder='Enter URL to analyze backlink profile'>
			</div>
			<button type="submit">get report now !</button>
		</form>
		<div class="tablet"></div>
	</div>
</div>
<div class="how_work">
	<div class="text">
		How does <span>Scan<span>Backlinks</span></span> work:
	</div>
	<div class="how_works_img"></div>
</div>
<div class="helper"></div>
<div class="service">
	<div class="title">
		For Whom This Service
	</div>
	<ul>
		<li>
			<div class="ico seo"></div>
			<div class="texts">
				<div class="title_li">
					<?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->title[0];?>

				</div>
				<div class="text">
					<?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->body[0];?>

				</div>
			</div>
		</li>
		<li>
			<div class="ico pc"></div>
			<div class="texts">
				<div class="title_li">
					<?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->title[1];?>

				</div>
				<div class="text">
					<?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->body[1];?>

				</div>
			</div>
		</li>
		<li>
			<div class="ico usr"></div>
			<div class="texts">
				<div class="title_li">
					<?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->title[2];?>

				</div>
				<div class="text">
					<?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->body[2];?>

				</div>
			</div>
		</li>
	</ul>
</div>

<div class="expample">
	<div class="wr_bg_ex">
		<div class="sm_ex">
			<div class="head">
				<div class="img"></div>
			</div>
			<div class="circle">
				$79
				<span>per month</span>
			</div>
			<div class="bottom">
				<div class="row">
					<div class="title">
						Total Rows Limit
						<span><?php echo $_smarty_tpl->tpl_vars['data']->value->servise->ahrefs[0];?>
</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Reports
						<span><?php echo $_smarty_tpl->tpl_vars['data']->value->servise->ahrefs[1];?>
</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Report Max Size
						<span><?php echo $_smarty_tpl->tpl_vars['data']->value->servise->ahrefs[2];?>
</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="fu_ex">
			<div class="head">
				<div class="img"></div>
			</div>
			<div class="circle">
				$79
				<span>per month</span>
			</div>
			<div class="bottom">
				<div class="row">
					<div class="title">
						Total Rows Limit
						<span><?php echo $_smarty_tpl->tpl_vars['data']->value->servise->scanbacklinks[0];?>
</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Reports
						<span><?php echo $_smarty_tpl->tpl_vars['data']->value->servise->scanbacklinks[1];?>
</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Report Max Size
						<span><?php echo $_smarty_tpl->tpl_vars['data']->value->servise->scanbacklinks[2];?>
</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="sm_ex">
			<div class="head">
				<div class="img majestic"></div>
			</div>
			<div class="circle">
				$79
				<span>per month</span>
			</div>
			<div class="bottom">
				<div class="row">
					<div class="title">
						Total Rows Limit
						<span><?php echo $_smarty_tpl->tpl_vars['data']->value->servise->majestic[0];?>
</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Reports
						<span><?php echo $_smarty_tpl->tpl_vars['data']->value->servise->majestic[1];?>
</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
				<div class="row">
					<div class="title">
						Backlinks Report Max Size
						<span><?php echo $_smarty_tpl->tpl_vars['data']->value->servise->majestic[2];?>
</span>
					</div>
					<div class="row_line">
						<div class="line_full"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<a href="#" class='full_plan'>
		full plan comparasion
	</a>
</div>

<div class="reviews">
	<div class="title">
		Reviews
	</div>
	<ul>
		<li>
			<div class="title_author">
				<?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->title[0];?>
 <span>says</span>
			</div>
			<div class="text">
				<?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->body[0];?>

			</div>
		</li>
		<li>
			<div class="title_author">
				<?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->title[1];?>
 <span>says</span>
			</div>
			<div class="text">
				<?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->body[1];?>

			</div>
		</li>
		<li>
			<div class="title_author">
				<?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->title[2];?>
 <span>says</span>
			</div>
			<div class="text">
				<?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->body[2];?>

			</div>
		</li>
	</ul>
</div>

<footer class='footer'>
	<div class="shares">
		<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value->hrefs->href[0];?>
" class="share fa fa-facebook-official"></a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value->hrefs->href[1];?>
" class="share fa fa-twitter-square"></a>
		<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value->hrefs->href[2];?>
" class="share fa fa-google-plus-square"></a>
	</div>
	<div class="copyrything">
		<span>Copyrything 2015</span>
		<span>All right reserved</span>
	</div>
</footer><?php }
}
?>