<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ImageUpload */
/* @var $article app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>
<?= Html::img($article->getImage(), ['width' => 200]) ?>
<div class="article-form mt-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?= Html::a('Вернуться', ['article/update', 'id' => $article->id], ['class' => 'btn btn-warning']) ?>
</div>
