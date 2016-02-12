<?php /* Smarty version 3.1.27, created on 2015-08-12 15:11:05
         compiled from "/var/www/kia/app/modules/admin/views/layouts/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:199309038055cb37d901ff96_68696756%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efe748549b489d0f30b5f7cc417df88b1b24384e' => 
    array (
      0 => '/var/www/kia/app/modules/admin/views/layouts/login.tpl',
      1 => 1439381463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199309038055cb37d901ff96_68696756',
  'variables' => 
  array (
    'page_title' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55cb37d9039bb3_83509883',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55cb37d9039bb3_83509883')) {
function content_55cb37d9039bb3_83509883 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '199309038055cb37d901ff96_68696756';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <link href="/css/font-awesome.css" rel="stylesheet" />
    <link href="/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>


    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>



    <?php echo '<script'; ?>
 src="/web/js/jquery-1.10.2.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/web/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/web/js/jquery.metisMenu.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/web/js/custom.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>