<?php
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Site options';
?>
<section class="content">
  <div class="row">
    <!-- center column -->
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Site Options</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
          <div class="box-body">
          <?php foreach ($model as $field): ?>
            <div class="form-group">
              <label for="input<?=$field->id?>" class="col-sm-2 control-label"><?=$field->label?></label>
              <div class="col-sm-10">
                <?php if ($field->type == 'D'): ?>
                    <input type="text" name="Options[fields][<?=$field->id?>]" class="form-control" id="input<?=$field->id?>" value="<?=$field->value?>" placeholder="<?=$field->label?>">
                <?php elseif($field->type == 'S'): ?>
                    <select id="input<?=$field->id?>" name="Options[fields][<?=$field->id?>]" class="form-control">
                        <option value="error">Show default page</option>
                        <?php foreach (Yii::$app->options->getCompare($field->compare) as $item): ?>
                            <option <?=($item->id == $field->value)? " selected " : "" ?> value="<?=$item->id?>"><?=($item->title)?$item->title:$item->id?></option>
                        <?php endforeach ?>
                    </select>
                <?php endif ?>
              </div>
            </div>
            <?php endforeach ?>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">Save data</button>
          </div><!-- /.box-footer -->
        <?php ActiveForm::end(); ?>
      </div><!-- /.box -->
      <!-- general form elements disabled -->
    </div><!--/.col (center) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->