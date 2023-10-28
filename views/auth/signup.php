<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap5\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-comment mr0"><!--leave comment-->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4 col-md-offset-2">
            <div class="site-login">
                <h1><?= Html::encode($this->title) ?></h1>

                <p>Заполните поля для регистрации:</p>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' =>
                        [
                            'template' => "{label}\n<div class=\"col-3\">{input}</div>\n<div class=\"col-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-1 control-label'],
                        ],
                ]); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                <div class="mb-5"></div>
                <?= $form->field($model, 'email')->textInput() ?>
                <div class="mb-5"></div>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary m-2', 'name' => 'login-button']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>

                <div class="col-lg-offset-1" style="color:#999;"></div>
            </div>
        </div>
    </div>
</div>
