<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\ckeditor\CKEditorInline;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */

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
            <div id="CKEditorInline" class="d-none">
                <?= $form->field($model, 'content', [
                    'labelOptions' => [
                        'class' => 'font-weight-bold',
                    ]
                ])->widget(CKEditor::class, [
                    'kcfinder' => true,
                    'kcfOptions' => [
                        'uploadURL' => '@web/uploads/articleImage/' . $model->id . '/',
                        'uploadDir' => '@webroot/uploads/articleImage/' . $model->id . '/',
                        'access' => [  // @link http://kcfinder.sunhater.com/install#_access
                            'files' => [
                                'upload' => true,
                                'delete' => true,
                                'copy' => true,
                                'move' => true,
                                'rename' => true,
                            ],
                            'dirs' => [
                                'create' => true,
                                'delete' => true,
                                'rename' => true,
                            ],
                        ],
                        'types' => [  // @link http://kcfinder.sunhater.com/install#_types
                            'files' => [
                                'type' => '',
                            ],
                        ],
                    ],
                    'options' => ['rows' => 12],
                    'preset' => 'basic',
                    'clientOptions' => [
                        'height' => 700,
                        'extraPlugins' => 'justify,font,codesnippet,iframe',
                        'language' => 'ru',
                        'forcePasteAsPlainText' => true,
                        'toolbarGroups' => [
                            [
                                'name' => 'clipboard',
                                'groups' => ['clipboard', 'undo'],
                            ],
                            [
                                'name' => 'editing',
                                'groups' => ['find', 'selection', 'spellchecker'],
                            ],
                            [
                                'name' => 'basicstyles',
                                'groups' => ['basicstyles', 'cleanup'],
                            ],
                            [
                                'name' => 'insert',
                            ],
                            [
                                'name' => 'font',
                                'groups' => [
                                    'fontSize_sizes' => '8/8px;9/9px;10/10px;11/11px;12/12px;13/13px;14/14px;15/15px;16/16px;18/18px;20/20px;22/22px;24/24px;26/26px;28/28px;36/36px;48/48px;72/72px'
                                ],
                            ],
                            [
                                'name' => 'links',
                            ],
                            [
                                'name' => 'document',
                                'groups' => ['mode', 'document', 'doctools'],
                            ],
                            [
                                'name' => 'paragraph',
                                'groups' => ['list', 'indent', 'blocks', 'align', 'bidi'],
                            ],
                            [
                                'name' => 'styles',
                                'groups' => ['Styles', 'Format', 'Font', 'FontSize']
                            ]
                        ],
                        'filebrowserUploadMethod' => 'form',
                    ],
                ])->label(false);
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
