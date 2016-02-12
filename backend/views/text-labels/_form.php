<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TextLabels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banners-form row">
    <div class="box box-primary">

        <?php $form = ActiveForm::begin(); ?>

            <div class="box-body">

			    <?= $form->field($model, 'option_name')->textInput() ?>
				
				<?php if ($model->isNewRecord): ?>
			    	<?= $form->field($model, 'code')->textInput() ?>
				<?php else: ?>
					<?= $form->field($model, 'code')->textInput(['readonly' => true]) ?>
				<?php endif ?>

			    <?= $form->field($model, 'value')->textInput() ?>

			    <div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>
				<hr>
				<p>
			    	Для использования блока на сайте воспользуйтесь конструкцией:
			    	<?php if ($model->isNewRecord): ?>
			    	<blockquote>
			    		&lt;?=Yii::$app->t->text(&lt;'NAME'&gt;)?&gt;
			    	</blockquote>
			    	Где вместо <'NAME'> используйте значени поля "Название переменной".
			    	<?php else: ?>
			    	<blockquote>
			    		&lt;?=Yii::$app->t->text('<?=$model->code?>')?&gt;
			    	</blockquote>
			    	<?php endif ?>
			    </p>
			</div>    
	    <?php ActiveForm::end(); ?>
    </div>
</div>

