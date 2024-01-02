<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!empty($comments)): ?>

        <table class="table">
            <thead>
            <tr>
                <td>№</td>
                <td>Автор</td>
                <td>Статья</td>
                <td>Комментарий</td>
                <td>Действие</td>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= $comment->id ?></td>
                    <td><?= $comment->user->name ?></td>
                    <td><a href="<?= Url::toRoute(['/site/view', 'id' => $comment->article->id]); ?>"
                           class="more-link" target="_blank"><?= $comment->article->title ?></a></td>
                    <td><?= $comment->text ?></td>
                    <td>
                        <?php if ($comment->isAllowed()): ?>
                            <a class="btn btn-warning"
                               href="<?= Url::toRoute(['comment/disallow', 'id' => $comment->id]); ?>">Запретить</a>
                        <?php else: ?>
                            <a class="btn btn-success"
                               href="<?= Url::toRoute(['comment/allow', 'id' => $comment->id]); ?>">Разрешить</a>
                        <?php endif; ?>

                        <a class="btn btn-danger"
                           href="<?= Url::toRoute(['comment/delete', 'id' => $comment->id]); ?>">Удалить</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>
</div>
