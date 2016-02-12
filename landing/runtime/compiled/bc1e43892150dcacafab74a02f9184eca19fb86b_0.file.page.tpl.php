<?php /* Smarty version 3.1.27, created on 2015-08-12 17:38:07
         compiled from "/var/www/kia/app/modules/frontend/views/page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2258382755cb5a4f568741_46720003%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc1e43892150dcacafab74a02f9184eca19fb86b' => 
    array (
      0 => '/var/www/kia/app/modules/frontend/views/page.tpl',
      1 => 1439390286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2258382755cb5a4f568741_46720003',
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55cb5a4f583383_28991048',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55cb5a4f583383_28991048')) {
function content_55cb5a4f583383_28991048 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2258382755cb5a4f568741_46720003';
?>
<div class="content_dynamic_page">
	<h3><?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
</h3>
	<div class="page_body">
		<?php echo $_smarty_tpl->tpl_vars['page']->value['body'];?>

	</div>
</div><?php }
}
?>