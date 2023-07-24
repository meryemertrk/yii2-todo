<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var meryemertrk\todo\models\Task $model */

$this->title = Yii::t('app', 'Update Task: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id_task' => $model->id_task]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

