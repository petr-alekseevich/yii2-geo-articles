<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\PublicAsset;
use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;

PublicAsset::register($this);
$randomArticle = Article::randomArticle();
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/public/images/logo.png"
                                                      alt="<?= Yii::$app->params['appName'] ?>"></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
                    <li><a href="/">Главная</a></li>
                </ul>
                <div class="i_con">
                    <ul class="nav navbar-nav text-uppercase">
                        <?php if (Yii::$app->user->isGuest): ?>
                            <li><a href="<?= Url::toRoute(['auth/login']) ?>">Войти</a></li>
                            <li><a href="<?= Url::toRoute(['auth/signup']) ?>">Зарегистрироваться</a></li>
                        <?php else: ?>
                            <?= Html::beginForm(['/auth/logout'], 'post')
                            . Html::submitButton(
                                'Выйти (' . Yii::$app->user->identity->name . ')',
                                ['class' => 'btn btn-link logout', 'style' => "padding-top:10px;"]
                            )
                            . Html::endForm() ?>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>

<?= $content ?>
<!--footer start-->
<footer class="footer-widget-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <aside class="footer-widget">

                    <div class="about-img"><a style=""
                                              href="<?= Yii::$app->params['mainSite'] ?>">
                            <img src="/public/images/logo.png" alt="<?= Yii::$app->params['appName'] ?>">
                        </a></div>
                    <div class="about-content"> Добро пожаловать!!!
                    </div>

                </aside>
            </div>

            <div class="col-md-4">
                <aside class="footer-widget">

                    <h3 class="widget-title text-uppercase">Контакты</h3>
                    <div class="address">
                        <div><a style="color: deepskyblue;"
                              href="<?= Yii::$app->params['mainSite'] ?>" class="text-uppercase">
                                <?= Yii::$app->params['appName'] ?></a></div>
                    </div>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!--Indicator-->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                            tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                            vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                            magna aliquyam eratma</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="/public/images/author.png" alt="">

                                        <div class="author-text">
                                            <h4>Sophia</h4>

                                            <h4>CEO, ReadyTheme</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                            tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                            vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                            magna aliquyam eratma</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="/public/images/author.png" alt="">

                                        <div class="author-text">
                                            <h4>Sophia</h4>

                                            <h4>CEO, ReadyTheme</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                            tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                            vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                            magna aliquyam eratma</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="/public/images/author.png" alt="">

                                        <div class="author-text">
                                            <h4>Sophia</h4>

                                            <h4>CEO, ReadyTheme</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </aside>
            </div>
            <div class="col-md-4">
                <aside class="footer-widget">

                    <h3 class="widget-title text-uppercase">Случайная статья</h3>
                    <div class="custom-post">
                        <div>
                            <a style="max-width: 150px;" href="<?= Url::toRoute(['site/view','id' => $randomArticle->id]);?>"
                               class="popular-img"><img src="<?= $randomArticle->getImage(); ?>"
                                                        alt="<?= $randomArticle->title ?>">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div>
                            <a href="#" class="text-uppercase"><?= $randomArticle->title ?></a>
                            <span class="p-date"><?= $randomArticle->getDate(); ?></span>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="pull-left">&copy; <?= date('Y') ?> <a href="<?= Yii::$app->params['mainSite'] ?>">
                            <?= Yii::$app->params['appName'] ?> </a> с <i class="fa fa-heart"></i> для Вас
                    </p>

                    <p class="pull-right">
                        <a target="_blank" rel="noopener"
                           href="">
                            <span data-toggle="tooltip" title="" data-original-title="VK">
                                <i class="fa fa-vk fa-2" aria-hidden="true"></i>ВКонтакте
                            </span>
                        </a>
                        <a target="_blank" rel="noopener"
                           href="">
                            <span data-toggle="tooltip" title="" data-original-title="INSTAGRAM">
                                <i class="fa fa-instagram fa-2" aria-hidden="true"></i>Инстаграм
                            </span>
                        </a>
                        <a target="_blank" rel="noopener"
                           href="">
                            <span data-toggle="tooltip" title="" data-original-title="FACEBOOK">
                                <i class="fa fa-facebook fa-2" aria-hidden="true"></i>Фейсбук
                            </span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
