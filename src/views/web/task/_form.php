<?php

use meryemertrk\todo\models\Task;
use meryemertrk\todo\Module;
use portalium\theme\widgets\Panel;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var meryemertrk\todo\models\Task $model */
/** @var yii\widgets\ActiveForm $form */
?>
<?php $form = ActiveForm::begin(); ?>
<?php Panel::begin([
    'title' => Html::encode($this->title),
    'actions' => [
        'header' => [
        ],
        'footer' => [
            Html::submitButton(Module::t( 'Save'), ['class' => 'btn btn-success']),
        ]
    ],
]) ?>

       <?= $form->field($model, 'title')->textInput(['rows' => 6]) ?>
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
       <?php /*= $form->field($model, 'status')->textInput() */?>
       <?= $form->field($model, 'id_user')->textInput() ?>
       <?= $form->field($model, 'id_workspace')->textInput() ?>
       <?= $form->field($model, 'status')->dropDownList(Task::getStatusList()['STATUS']) ?>
      <!-- <?php /*= $form->field($model, 'date_create')->textInput() */?>
       --><?php /*= $form->field($model, 'date_update')->textInput() */?>



<?php Panel::end() ?>
<?php ActiveForm::end(); ?>