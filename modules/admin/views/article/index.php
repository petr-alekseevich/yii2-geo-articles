<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->formatter->locale = 'ru-RU';
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'title',
                'label' => 'Заголовок',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->title, Url::toRoute(['article/update', 'id' => $data->id]));
                }
            ],
            'description:ntext',
            'content:ntext',
            [
                'attribute' => 'date',
                'label' => 'Дата',
                'headerOptions' => ['width' => '120'],
                'value' => function ($data) {
                    return Yii::$app->formatter->asDate($data->date);
                }
            ],
            [
                'format' => 'html',
                'label' => 'Картинка',
                'value' => function ($data) {
                    //return Html::img($data->getImage(), ['width' => 200]);
                    return Html::a(
                        Html::img($data->getImage(), ['width' => 200]),
                        Url::toRoute(['article/update', 'id' => $data->id]),
                        ['title' => 'Просмотр']
                    );
                }
            ],
            [
                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return '<a href="/site/view?id=' . $model->id . '" title="Просмотр" target="_blank"
                    aria-label="Просмотр" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M573 241C518 136 411 64 288 64S58 136 3 241a32 32 0 000 30c55 105 162 177 285 177s230-72 285-177a32 32 0 000-30zM288 400a144 144 0 11144-144 144 144 0 01-144 144zm0-240a95 95 0 00-25 4 48 48 0 01-67 67 96 96 0 1092-71z"></path></svg></a>';
                    },
                ],
            ],
        ],
    ]); ?>
</div>
