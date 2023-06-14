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
                            <div class="like-block article-like" data-article-id="<?= $article->id; ?>">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                     width="128.000000pt" height="128.000000pt" viewBox="0 0 1280.000000 1280.000000"
                                     preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)"
                                       fill="#000000" stroke="none">
                                        <path d="M5120 9019 c-413 -37 -793 -219 -1086 -520 -241 -249 -390 -538 -461
-894 -25 -128 -25 -492 0 -620 53 -266 158 -511 308 -718 54 -74 2504 -2537
2524 -2537 16 0 2415 2407 2472 2480 222 286 343 594 374 958 34 389 -83 809
-319 1142 -86 121 -270 306 -392 392 -522 370 -1204 427 -1775 149 -102 -50
-229 -128 -300 -185 -22 -18 -45 -35 -51 -39 -6 -3 -58 27 -115 68 -122 88
-345 202 -477 245 -124 40 -263 67 -402 80 -128 11 -164 11 -300 -1z m462
-278 c270 -58 515 -188 721 -381 l98 -93 27 24 c15 13 62 56 105 96 175 162
379 272 624 337 274 73 605 58 873 -39 715 -259 1115 -1021 923 -1760 -50
-193 -132 -363 -249 -517 -39 -52 -476 -496 -1183 -1203 l-1121 -1120 -1121
1120 c-720 720 -1143 1150 -1184 1204 -123 163 -219 379 -266 601 -29 139 -32
408 -6 545 43 222 146 458 271 625 134 179 342 350 540 444 137 66 325 121
476 140 90 11 377 -3 472 -23z"/>
                                    </g>
                                </svg>
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