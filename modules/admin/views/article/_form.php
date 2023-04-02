<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\ckeditor\CKEditorInline;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */

$optionsCKEditor = Yii::$app->params['optionsCKEditor'];

?>



<?php $form = ActiveForm::begin(); ?>
<table width="100%">
    <thead>
    <tr>
        <th style="width: 20%; padding: 0; margin: 0; border: none;"></th>
        <th style="width: 80%; padding: 0; margin: 0; border: none;"></th>
    </tr>
    </thead>
    <tbody>
    <tr class="border-bot">
        <td>Заголовок</td>
        <td>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(false) ?>
        </td>
    </tr>
    <tr class="border-bot">
        <td>Описание</td>
        <td>
            <?= $form->field($model, 'description')->textarea(['rows' => 3])->label(false) ?>
        </td>
    </tr>

    <tr class="border-bot">
        <td>Видео</td>
        <td>
            <?= $form->field($model, 'video')->textInput()->label(false) ?>
        </td>
    </tr>

    <tr class="border-bot">
        <td>Содержание</td>
        <td>
            <div id="CKEditorInline">
                <?= $form->field($model, 'content', [
                    'labelOptions' => [
                        'class' => 'font-weight-bold',
                    ]
                ])->widget(CKEditor::class, $optionsCKEditor)->label(false);
                ?>
                <span style="color: grey">Подсказка: Для перехода на новую строку без отступа используйте сочетание клавиш Shift+Enter</span>
            </div>
        </td>
    </tr>

    <tr>
        <td>Дата</td>
        <td>
            <?= $form->field($model, 'date')
                ->textInput(['value' => $model->date ?
                    Yii::$app->formatter->asDate($model->date, 'php:d-m-Y') : date('d-m-Y')])
                ->label(false) ?>
        </td>
    </tr>
    </tbody>
</table>

<div class="form-group" style="margin-top: 10px">
    <div class="row">
        <div class="col-md-6">
            <?php if($model->id): ?>
            <?= Html::a('Удалить статью', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены что хотите удалить статью?',
                    'method' => 'post',
                ],
            ]) ?>
            <?php endif;?>
        </div>
        <div class="pull-right">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
