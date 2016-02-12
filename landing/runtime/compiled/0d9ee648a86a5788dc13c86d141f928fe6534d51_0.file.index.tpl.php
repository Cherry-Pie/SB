<?php /* Smarty version 3.1.27, created on 2015-08-12 16:34:58
         compiled from "/var/www/kia/app/modules/admin/views/layouts/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14526251055cb4b829543a8_50532081%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d9ee648a86a5788dc13c86d141f928fe6534d51' => 
    array (
      0 => '/var/www/kia/app/modules/admin/views/layouts/index.tpl',
      1 => 1439386440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14526251055cb4b829543a8_50532081',
  'variables' => 
  array (
    'page_title' => 0,
    'controller' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55cb4b829765b0_51134623',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55cb4b829765b0_51134623')) {
function content_55cb4b829765b0_51134623 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14526251055cb4b829543a8_50532081';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"><?php echo '</script'; ?>
>
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/font-awesome.css" rel="stylesheet">
        <link href="/js/morris/morris-0.4.3.min.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <?php echo '<script'; ?>
 src="/js/sweetalert.min.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
        <?php echo '<script'; ?>
 src="//cdn.ckeditor.com/4.5.2/standard/ckeditor.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/js/kernel.js"><?php echo '</script'; ?>
>
    </head>
    <body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">Scanbacklinks</a>
            </div>
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
                <a href="/admin?logout=1" class="btn btn-danger square-btn-adjust">Выход</a>
            </div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                       <a <?php if ($_smarty_tpl->tpl_vars['controller']->value == 'MainController' || $_smarty_tpl->tpl_vars['controller']->value == 'ProjectController') {?>class="active-menu"<?php }?> href="/admin"><i class="fa fa-dashboard fa-3x"></i> Главная</a>
                    </li>
                    <li>
                       <a <?php if ($_smarty_tpl->tpl_vars['controller']->value == 'PagesController' || $_smarty_tpl->tpl_vars['controller']->value == 'PageController') {?>class="active-menu"<?php }?> href="/admin/pages"><i class="fa fa-dashboard fa-3x"></i> Страници</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <?php echo '<script'; ?>
 src="/js/jquery-1.10.2.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/jquery.metisMenu.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/morris/raphael-2.1.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/morris/morris.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/custom.js"><?php echo '</script'; ?>
>



    </body>
</html>
<?php }
}
?>