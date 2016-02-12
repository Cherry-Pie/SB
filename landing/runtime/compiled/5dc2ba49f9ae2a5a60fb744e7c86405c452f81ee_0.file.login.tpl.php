<?php /* Smarty version 3.1.27, created on 2015-08-13 14:25:35
         compiled from "/var/www/kia/app/modules/admin/views/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:55795494655cc7eaf405037_21896373%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dc2ba49f9ae2a5a60fb744e7c86405c452f81ee' => 
    array (
      0 => '/var/www/kia/app/modules/admin/views/login.tpl',
      1 => 1439450294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55795494655cc7eaf405037_21896373',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55cc7eaf483032_46065510',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55cc7eaf483032_46065510')) {
function content_55cc7eaf483032_46065510 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '55795494655cc7eaf405037_21896373';
?>
<div class="container">
	<div class="row text-center ">
		<div class="col-md-12">
			<br /><br />
			<h2>Scanbacklinks ADMIN</h2>
			<h5>Вход в админ панель</h5>
			<br />
		</div>
	</div>
	<div class="row ">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
			<div class="panel panel-default">
				<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
					<div class="panel-heading">
	           			<strong style='color: red;'><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
	                </div>
                <?php }?>
				<div class="panel-body">
					<form method='POST'>
						<br />
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
							<input type="text" class="form-control" name='login' placeholder="Логин" />
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
							<input type="password" class="form-control" name='password' placeholder="Пароль" />
						</div>
						<div class="form-group">
						</div>
						<input type="submit" class="btn btn-primary " value='Войти'>
					</form>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
?>