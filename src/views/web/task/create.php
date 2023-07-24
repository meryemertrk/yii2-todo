<?php

use meryemertrk\todo\Module;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var meryemertrk\todo\models\Task $model */

//$this->title = Yii::t('app', 'Create Task');
$this->title = Module::t('Create Task');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


