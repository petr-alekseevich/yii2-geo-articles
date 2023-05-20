<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Article $model */

$this->title = 'Редактирование статьи: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['update', 'id' => $model->id]];
?>

<style>
    .border-bot {
        border-bottom: 1px solid rgba(230, 230, 230, 0.7);
    }
    td {
        padding: 10px;
    }
</style>

<div class="article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <table width="100%">
        <thead>
        <tr>
            <th style="width: 50%; padding: 0; margin: 0; border: none;"></th>
            <th style="width: 50%; padding: 0; margin: 0; border: none;"></th>
        </tr>
        </thead>
        <tbody>
        <tr class="border-bot">
            <td>Категория</td>
            <td>
                <?= $model->category ? $model->category->title : 'Не задано' ?>
            </td>
            <td>
                <?= Html::a('Изменить категорию',
                    ['set-category', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            </td>
        </tr>
        <tr class="border-bot">
            <td>Теги</td>
            <td>
                <?php if ($model->getTags()->all()): ?>
                    <?php foreach ($model->getTags()->all() as $tags): ?>
                        <?= $tags->title ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    Не задано
                <?php endif; ?>
            </td>
            <td>
                <?= Html::a('Установить теги', ['set-tags', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            </td>
        </tr>
        </tbody>
    </table>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
