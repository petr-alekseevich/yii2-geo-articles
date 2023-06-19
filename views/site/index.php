<?php

/* @var $this yii\web\View */
/* @var $articles Article */
/* @var $popular Article */
/* @var $recent Article */
/* @var $categories Category */
/* @var $pagination Article */

use app\models\Article;
use app\models\Category;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = Yii::$app->params['appName'] . ' блог';

?>
<style>
    .decoration a {
        width: 185px;
        margin: 10px 6px 10px 0;
    }
</style>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 id="activeTest" class="article-like">
                    Test
                </h1>
                <?php foreach ($articles as $article): ?>
                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"><img
                                        src="<?= $article->getImage(); ?>" alt="<?= $article->title ?>"></a>

                            <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"
                               class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">Читать</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6>
                                    <a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]) ?>">
                                        <?= $article->category->title; ?></a>
                                </h6>

                                <h1 class="entry-title">
                                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>">
                                        <?= $article->title ?></a>
                                </h1>


                            </header>
                            <div class="entry-content">
                                <p><?= $article->description ?>
                                </p>

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]); ?>"
                                       class="more-link">Читать статью</a>
                                </div>
                            </div>

                            <div class="decoration" style="">
                                <?php if ($article->getTags()->all()): ?>
                                    <?php foreach ($article->getTags()->all() as $tag): ?>
                                        <a href="#" class="btn btn-default"><?= $tag->title ?></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>

                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">
                                    Автор: <?= $article->author->name; ?>, <?= $article->getDate(); ?></span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a>
                                    </li><?= (int)$article->viewed ?>
                                </ul>
                            </div>
                            <div class="icon">
                                <i class="material-icons unselectable article-like"
                                   data-article-id="<?= $article->id; ?>">thumb_up</i>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

                <?= LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>

            <?= $this->render('/partials/sidebar', [
                'popular' => $popular,
                'recent' => $recent,
                'categories' => $categories
            ]); ?>
        </div>
    </div>
</div>
<!-- end main content-->