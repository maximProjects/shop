<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\user\models\User;

/* @var $this yii\web\View */
/* @var $model backend\modules\categories\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
                ArrayHelper::map(User::find()->all(),'id','username'),
                ['prompt'=>'Select User']

     ) ?>
    
    <?php
    /*

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'lvt')->textInput() ?>

    <?= $form->field($model, 'rgt')->textInput() ?>

    */
    ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'descriptiom')->textarea(['rows' => 6]) ?>

     <?= $form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
