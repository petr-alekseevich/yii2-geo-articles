<?php

/* @var $comments Comment[] */
/* @var $article Article */
/* @var $commentForm CommentForm */

use app\models\Article;
use app\models\Comment;
use app\models\CommentForm;
use yii\widgets\ActiveForm;
//dump($comments)
?>

<?php if(!empty($comments)):?>

    <?php foreach($comments as $comment):?>
        <div class="bottom-comment"><!--bottom comment-->
            <div class="comment-img">
                <img width="50" class="img-circle" src="<?= $comment->user->image; ?>" alt="">
            </div>
            <div class="comment-text">
                <a href="#" class="replay btn pull-right"> Ответить</a>
                <h5><?= $comment->user->name; ?></h5>
                <p class="comment-date">
                    <?= $comment->getDate(); ?>
                </p>
                <p class="para"><?= $comment->text; ?></p>
            </div>
        </div>
    <?php endforeach;?>

<?php endif;?>
    <!-- end bottom comment-->

<?php if(!Yii::$app->user->isGuest):?>

    <div class="leave-comment"><!--leave comment-->
        <h4>Отправить комментарий</h4>
        <?php if(Yii::$app->session->getFlash('comment')):?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('comment'); ?>
            </div>
        <?php endif;?>
        <?php $form = ActiveForm::begin([
            'action' => ['site/comment', 'id' => $article->id],
            'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form']
        ])?>
        <div class="form-group">
            <div class="col-md-11" style="margin-left: 15px">
                <?= $form->field($commentForm, 'comment')
                    ->textarea([
                        'class' => 'form-control',
                        'placeholder' => 'Напишите комментарий'
                    ])->label(false)?>
            </div>
        </div>
        <button type="submit" class="btn send-btn">Отправить</button>
        <?php ActiveForm::end() ?>
    </div><!--end leave comment-->

<?php endif;?>
