<?php /* Smarty version 3.1.27, created on 2015-08-13 10:17:23
         compiled from "/var/www/kia/app/modules/admin/views/pages.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:189246845055cc4483bbd637_00815775%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06d10602cc46db9ed2f8b4259f56b944caea1c59' => 
    array (
      0 => '/var/www/kia/app/modules/admin/views/pages.tpl',
      1 => 1439450241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189246845055cc4483bbd637_00815775',
  'variables' => 
  array (
    'success' => 0,
    'pages' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55cc4483bfc4c2_37516821',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55cc4483bfc4c2_37516821')) {
function content_55cc4483bfc4c2_37516821 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '189246845055cc4483bbd637_00815775';
?>
<div class="col-md-12">
	<h1>Страници</h1>
	<div class="panel panel-default">
        <div class="panel-heading">
            Страници
        </div>
        <?php if ($_smarty_tpl->tpl_vars['success']->value) {?>
            <div class="alert alert-success" role="alert"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
        <?php }?>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Название</th>
                            <th>Ред.</th>
                            <th>Удалить.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($_smarty_tpl->tpl_vars['pages']->value) {?>
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
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['page']->value['name'];?>
</td>
                                    <td><a class="btn btn-primary" href='/admin/pages/edit/<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
'><i class="fa fa-edit "></i> Редактировать</a></td>
                                    <td><a class="btn btn-danger" href='/admin/pages/delete/<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
'> Удалить</a></td>
                                </tr>
                            <?php
$_smarty_tpl->tpl_vars['page'] = $foreach_page_Sav;
}
?>
                        <?php } else { ?>
                            <h3>Страниц нет</h3>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="/admin/pages/edit" class="btn btn-primary">Добавить новую</a>
</div><?php }
}
?>