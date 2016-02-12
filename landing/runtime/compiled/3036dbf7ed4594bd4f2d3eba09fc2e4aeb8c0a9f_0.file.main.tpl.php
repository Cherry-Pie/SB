<?php /* Smarty version 3.1.27, created on 2015-08-12 16:12:49
         compiled from "/var/www/kia/app/modules/admin/views/main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:89011553155cb4651c2e2c2_51189156%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3036dbf7ed4594bd4f2d3eba09fc2e4aeb8c0a9f' => 
    array (
      0 => '/var/www/kia/app/modules/admin/views/main.tpl',
      1 => 1439385162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89011553155cb4651c2e2c2_51189156',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55cb4651cf81a1_39111711',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55cb4651cf81a1_39111711')) {
function content_55cb4651cf81a1_39111711 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '89011553155cb4651c2e2c2_51189156';
?>

<div class="col-md-12">
    <h1>Тексты</h1>
    <form action="" method='post'>
        <h3>Titles</h3>
        <div class="form-group">
            <label for="comment">Page title</label>
            <input type='text' class='form-control' name='titles[]' value='<?php echo $_smarty_tpl->tpl_vars['data']->value->titles[0];?>
' placeholder='Title'>
        </div>
        <div class="form-group">
            <label for="comment">First landing title (h1)</label>
            <input type='text' class='form-control' name='titles[]' value='<?php echo $_smarty_tpl->tpl_vars['data']->value->titles[1];?>
' placeholder='Title'>
        </div>
        <div class="form-group">
            <label for="comment">Second landing title</label>
            <input type='text' class='form-control' name='titles[]' value='<?php echo $_smarty_tpl->tpl_vars['data']->value->titles[2];?>
' placeholder='Title'>
        </div>
        <div class="form-group">
            <label for="comment">Third landing title</label>
            <input type='text' class='form-control' name='titles[]' value='<?php echo $_smarty_tpl->tpl_vars['data']->value->titles[3];?>
' placeholder='Title'>
        </div>




        <h3>For Whom This Service</h3>
        <div class="form-group">
            <label for="comment">first</label>
            <input type='text' class='form-control' name='for_whom_this_service[title][]' value='<?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->title[0];?>
' placeholder='Title'>
            <textarea class="form-control" rows="5" name='for_whom_this_service[body][]' id="Text"><?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->body[0];?>
</textarea>
        </div>
        <div class="form-group">
            <label for="comment">second</label>
            <input type='text' class='form-control' name='for_whom_this_service[title][]' value='<?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->title[1];?>
' placeholder='Title'>
            <textarea class="form-control" rows="5" name='for_whom_this_service[body][]' id="Text"><?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->body[1];?>
</textarea>
        </div>
        <div class="form-group">
            <label for="comment">third</label>
            <input type='text' class='form-control' name='for_whom_this_service[title][]' value='<?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->title[2];?>
' placeholder='Title'>
            <textarea class="form-control" rows="5" name='for_whom_this_service[body][]' id="Text"><?php echo $_smarty_tpl->tpl_vars['data']->value->for_whom_this_service->body[2];?>
</textarea>
        </div>

        <h3>Reviews</h3>
        <div class="form-group">
            <label for="comment">first</label>
            <input  value='<?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->title[0];?>
' type='text'  class='form-control' name='reviews[title][]' placeholder='Username'>
            <textarea  class="form-control" rows="5" name='reviews[body][]' id="comment" placeholder='Comment Text'><?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->body[0];?>
</textarea>
        </div>
        <div class="form-group">
            <label for="comment">second</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->title[1];?>
'  type='text' class='form-control' name='reviews[title][]' placeholder='Username'>
            <textarea class="form-control" rows="5" name='reviews[body][]' id="comment" placeholder='Comment Text'><?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->body[1];?>
</textarea>
        </div>
        <div class="form-group">
            <label for="comment">third</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->title[2];?>
' type='text' class='form-control' name='reviews[title][]' placeholder='Username'>
            <textarea class="form-control" rows="5" name='reviews[body][]' id="comment" placeholder='Comment Text'><?php echo $_smarty_tpl->tpl_vars['data']->value->reviews->body[2];?>
</textarea>
        </div>

        <h3>Social network</h3>
        <div class="form-group">
            <label for="comment">Twitter href</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->hrefs->href[0];?>
' type='text' class='form-control' name='hrefs[href][]' placeholder='URL'>
        </div>
        <div class="form-group">
            <label for="comment">Google+ href</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->hrefs->href[1];?>
'  type='text' class='form-control' name='hrefs[href][]' placeholder='URL'>
        </div>
        <div class="form-group">
            <label for="comment">Facebook href</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->hrefs->href[2];?>
' type='text' class='form-control' name='hrefs[href][]' placeholder='URL'>
        </div>

        <h3>Ahrefs service</h3>
        <div class="form-group">
            <label for="comment">Totals rows limit</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->servise->ahrefs[0];?>
' type='text' class='form-control' name='servise[ahrefs][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Reports</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->servise->ahrefs[1];?>
' type='text' class='form-control' name='servise[ahrefs][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Report Max Size</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->servise->ahrefs[2];?>
' type='text' class='form-control' name='servise[ahrefs][]' placeholder='Value'>
        </div>
        <h3>Scanbacklinks service</h3>
        <div class="form-group">
            <label for="comment">Totals rows limit</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->servise->scanbacklinks[0];?>
' type='text' class='form-control' name='servise[scanbacklinks][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Reports</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->servise->scanbacklinks[1];?>
' type='text' class='form-control' name='servise[scanbacklinks][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Report Max Size</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->servise->scanbacklinks[2];?>
' type='text' class='form-control' name='servise[scanbacklinks][]' placeholder='Value'>
        </div>
        <h3>Majestic service</h3>
        <div class="form-group">
            <label for="comment">Totals rows limit</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->servise->majestic[0];?>
' type='text' class='form-control' name='servise[majestic][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Reports</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->servise->majestic[1];?>
' type='text' class='form-control' name='servise[majestic][]' placeholder='Value'>
        </div>
        <div class="form-group">
            <label for="comment">Backlinks Report Max Size</label>
            <input value='<?php echo $_smarty_tpl->tpl_vars['data']->value->servise->majestic[2];?>
' type='text' class='form-control' name='servise[majestic][]' placeholder='Value'>
        </div>
        <input type="submit" class='form-controll' value='Сохранить'>
    </form>
</div><?php }
}
?>