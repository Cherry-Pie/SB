<?php /* Smarty version 3.1.27, created on 2015-12-21 03:49:31
         compiled from "/home/scanbacklinkscom/scanbacklinks.com/landing/app/modules/frontend/views/layouts/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:15116714365677bd1bd436c9_63084684%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c05626276363e74e238fbb0149787fc52960aef' => 
    array (
      0 => '/home/scanbacklinkscom/scanbacklinks.com/landing/app/modules/frontend/views/layouts/index.tpl',
      1 => 1445501326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15116714365677bd1bd436c9_63084684',
  'variables' => 
  array (
    'pages' => 0,
    'page' => 0,
    'content' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5677bd1bd686e0_22103010',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5677bd1bd686e0_22103010')) {
function content_5677bd1bd686e0_22103010 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15116714365677bd1bd436c9_63084684';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Scan backlinks</title>
		<?php echo '<script'; ?>
 src='https://code.jquery.com/jquery-2.1.4.min.js'><?php echo '</script'; ?>
>
		<link rel="stylesheet" href="/css/main.less" type='text/less'>
		<?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js' type='text/javascript'><?php echo '</script'; ?>
>
	</head>
	<body>
		<header class='header'>
			<div class="content">
				<a href="/" class='logo'></a>
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
						<a href="/page/<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
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
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

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
		</footer>
	</body>
</html><?php }
}
?>