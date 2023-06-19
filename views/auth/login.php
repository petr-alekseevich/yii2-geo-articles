<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap5\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;


$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leave-comment mr0"><!--leave comment-->
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="site-login">
                <h1><?= Html::encode($this->title) ?></h1>

                <p>Заполните следующие поля для входа:</p>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-3\">{input}</div>\n<div class=\"col-8\">{error}</div>",
                        'labelOptions' => ['class' => 'col-1 control-label'],
                    ],
                ]); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                <div class="mb-5"></div>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="mb-5"></div>
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\" col-3\">{input} {label}</div>\n<div class=\"col-8\">{error}</div>",
                ]) ?>
                <div class="mb-5"></div>
                <div class="form-group">
                    <div class=" col-11">
                        <?= Html::submitButton('Войти', [
                            'class' => 'btn btn-primary',
                            'name' => 'login-button',
                        ]) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>