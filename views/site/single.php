<?php
/* @var $this yii\web\View */
/* @var $article Article */
/* @var $popular Article */
/* @var $recent Article */
/* @var $categories Category */
/* @var $comments Comment[] */


use app\models\Article;
use app\models\Category;
use app\models\Comment;
use yii\helpers\Url;

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
                <article class="post">
                    <div class="post-thumb">
                        <a href="<?= Url::toRoute(['site/view', 'id' => $article->id]) ?>">
                            <img src="<?= $article->getImage(); ?>" alt="<?= $article->title ?>">
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]) ?>">
                                    <?= $article->category->title ?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id' => $article->id]) ?>">
                                    <?= $article->title ?></a></h1>
                        </header>
                        <div class="video">
                            <?= $article->video ?>
                        </div>
                        <div class="entry-content">
                            <?= $article->content ?>
                        </div>
                        <div class="decoration">
                            <?php if ($article->getTags()->all()): ?>
                                <?php foreach ($article->getTags()->all() as $tag): ?>
                                    <a href="#" class="btn btn-default"><?= $tag->title ?></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="social-share">
              <span class="social-share-title pull-left text-capitalize">
                                Автор: <?= $article->author->name ?>, <?= $article->getDate(); ?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>

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