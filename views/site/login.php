<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Войти в систему';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Пожалуйста, заполните следующие поля для входа:</p>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
        </div>
    </div>
    <div class="col-md-4">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="col-md-4" style="color:#999;">
        Вы можете войти с помощью <strong>admin</strong>.<br>
    </div>
</div>
