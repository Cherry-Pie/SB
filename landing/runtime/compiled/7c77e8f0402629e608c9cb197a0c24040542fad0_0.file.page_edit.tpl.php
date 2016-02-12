<?php /* Smarty version 3.1.27, created on 2015-08-13 10:15:42
         compiled from "/var/www/kia/app/modules/admin/views/page_edit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10738172255cc441eeec1d7_57863139%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c77e8f0402629e608c9cb197a0c24040542fad0' => 
    array (
      0 => '/var/www/kia/app/modules/admin/views/page_edit.tpl',
      1 => 1439450135,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10738172255cc441eeec1d7_57863139',
  'variables' => 
  array (
    'success' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55cc441ef07903_90888353',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55cc441ef07903_90888353')) {
function content_55cc441ef07903_90888353 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10738172255cc441eeec1d7_57863139';
?>
<div class="col-md-12">
	<?php if ($_smarty_tpl->tpl_vars['success']->value) {?>
		<div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
	<?php }?>
	<form method='post'>
		<div class="form-group">
			<input type="text" name='page[name]' class="form-control"  value='<?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
' placeholder='Page name' required>
		</div>
		<textarea name="page[body]" id="page_editor"  class='form-controll' ><?php echo $_smarty_tpl->tpl_vars['page']->value['body'];?>
</textarea>
		<input type="submit" class='form-controll' value='Сохранить'>
	</form>
</div><?php }
}
?>