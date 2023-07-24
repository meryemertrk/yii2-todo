<?php

use meryemertrk\todo\models\Task;
use meryemertrk\todo\Module;
use portalium\theme\widgets\ActiveForm;
use portalium\theme\widgets\Panel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var meryemertrk\todo\models\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

//$this->title = Yii::t('app', 'Tasks');
$this->title = Module::t('Tasks');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$form = ActiveForm::begin();
Panel::begin([
    'title' => Module::t('Tasks'),
    'actions' => [
        'header' => [
            Html::submitButton(Module::t(''), [
                'class' => 'fa fa-trash btn btn-danger', 'id' => 'delete-select',
                'data' => [
                    'confirm' => Module::t('If you continue, all your data will be reset. Do you want to continue?'),
                    'method' => 'post'

                ]
            ]),
            Html::a(Module::t(''), ['create'], ['class' => 'fa fa-plus btn btn-success']),
        ]
    ]
]) ?>
<?php // echo $this->render('_search', ['model' => $searchModel]);


?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['class' => 'yii\grid\CheckboxColumn'],


            'title:ntext',
            'description',
            'status',


            [
                'class' => ActionColumn::class,
                'template' => '{view} {update} {assignment} {delete}',
                'buttons' => [
                    'assignment' => function ($url, Task $model) {
                        return Html::a(
                            Html::tag('i', '', ['class' => 'fa fa-fw fa-lock']),
                            Url::toRoute(['/rbac/assignment/view', 'id' => $model->id_task]),
                            ['class' => 'btn btn-primary btn-xs', 'style' => 'padding: 2px 9px 2px 9px;']
                        );
                    }

                ]
            ],
        ],
    ]); ?>

<?php Panel::end();
ActiveForm::end();
?>




