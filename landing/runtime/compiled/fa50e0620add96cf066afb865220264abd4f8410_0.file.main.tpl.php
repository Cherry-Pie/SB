<?php /* Smarty version 3.1.27, created on 2015-08-12 17:32:07
         compiled from "/var/www/kia/app/modules/frontend/views/layouts/main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:110551765355cb58e7d3ccf1_32196162%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa50e0620add96cf066afb865220264abd4f8410' => 
    array (
      0 => '/var/www/kia/app/modules/frontend/views/layouts/main.tpl',
      1 => 1439389926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110551765355cb58e7d3ccf1_32196162',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55cb58e7d52057_18560260',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55cb58e7d52057_18560260')) {
function content_55cb58e7d52057_18560260 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '110551765355cb58e7d3ccf1_32196162';
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