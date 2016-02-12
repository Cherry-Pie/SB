<?php /* Smarty version 3.1.27, created on 2015-12-21 03:49:20
         compiled from "/home/scanbacklinkscom/scanbacklinks.com/landing/app/modules/frontend/views/layouts/main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18518091385677bd10391d58_96446149%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e1b1830fa9a1f6cae37a15ffa353b6392edf2a3' => 
    array (
      0 => '/home/scanbacklinkscom/scanbacklinks.com/landing/app/modules/frontend/views/layouts/main.tpl',
      1 => 1445501326,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18518091385677bd10391d58_96446149',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5677bd10397163_76065892',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5677bd10397163_76065892')) {
function content_5677bd10397163_76065892 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18518091385677bd10391d58_96446149';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Scan backlinks</title>
		<?php echo '<script'; ?>
 src='https://code.jquery.com/jquery-2.1.4.min.js'><?php echo '</script'; ?>
>
		<link rel="stylesheet" href="css/main.less" type='text/less'>
		<?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js' type='text/javascript'><?php echo '</script'; ?>
>
	</head>
	<body>
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

	</body>
</html><?php }
}
?>