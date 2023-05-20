<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
/* @var $tags [] */
/* @var $selectedTags [] */
/* @var $article app\models\Article */

?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::dropDownList('tags', $selectedTags, $tags, ['class'=>'form-control', 'multiple'=>true]) ?>

    <div class="form-group" style="margin-top: 5px">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?= Html::a('Вернуться', ['article/update', 'id' => $article->id], ['class' => 'btn btn-warning']) ?>
</div>
