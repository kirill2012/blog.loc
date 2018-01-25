<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \app\models\Category;
use \app\models\Tag;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Category::find()->all(), 'id','id'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select category ...'],
    'pluginOptions' => [
    'allowClear' => true
    ],
    ]); ?>

    <?= $form->field($model, 'tags')->widget(Select2::classname(), [
        'data' =>  ArrayHelper::map(Tag::find()->all(), 'title','title'),
        'language' => 'en',
        'options' => ['multiple' => true, 'placeholder' => 'Select tags ...']
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
