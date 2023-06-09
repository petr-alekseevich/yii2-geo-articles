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
                    return Html::img($data->getImage(), ['width' => 200]);
                }
            ],
            [
                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['width' => '80'],
                'template' => '{delete}',
            ],
        ],
    ]); ?>
</div>
