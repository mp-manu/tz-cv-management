<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Cv $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cv-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'gender')->radioList(['1' => 'Мужской', '0' => 'Женский']) ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'region_id')
                ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Region::find()->asArray()->all(), 'id', 'name'), [
                    'prompt' => '--- Выберите регион ---',
                    'onchange' => '
                        $.get( "' . \yii\helpers\Url::toRoute('city/get-cities') . '", { id: $(this).val() } )
                            .done(function( data ) {
                                var result = JSON.parse(data);
                                $( "#' . Html::getInputId($model, 'city_id') . '" ).html(result.cities);
                            }
                        );
                    '
                ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'city_id')
                ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\City::find()->asArray()->all(), 'id', 'name')) ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'question')->textarea(['rows' => 3]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'grade')->textInput() ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
