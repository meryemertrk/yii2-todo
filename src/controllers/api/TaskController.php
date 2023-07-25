<?php

namespace meryemertrk\todo\controllers\api;

use meryemertrk\todo\models\TaskSearch;
use Yii;
use meryemertrk\todo\Module;
use meryemertrk\todo\models\Task;
use portalium\rest\ActiveController as RestActiveController;

class TaskController extends RestActiveController
{
    public $modelClass = 'meryemertrk\todo\models\Task';

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'searchModel' => TaskSearch::class,
            'attributeMap' => [
                'title' => 'title',
            ],
        ];

        //prepareDataProvider  filtreli ve kullanıcıya göre sınırlanmış verileri döndürür
        $actions['index']['prepareDataProvider'] = function ($action) {
            $searchModel = new TaskSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            //eğer ındex yetkisi yoksa sadece giriş yapmış kullanıcının verilerini getirir
            if (!Yii::$app->user->can('todoApiTaskIndex')) {
                $dataProvider->query->andWhere(['id_user' => Yii::$app->user->id]);
            }
            return $dataProvider;
        };


        return $actions;
    }

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
        switch ($action->id) {
            case 'view':
                if (!Yii::$app->user->can('todoApiTaskView'))
                    throw new \yii\web\ForbiddenHttpException(Module::t('You do not have permission to view this todo.'));
                break;
            case 'create':
                if (!Yii::$app->user->can('todoApiTaskCreate'))
                    throw new \yii\web\ForbiddenHttpException(Module::t('You do not have permission to create this todo.'));
                break;
            case 'update':
                if (!Yii::$app->user->can('todoApiTaskUpdate'))
                    throw new \yii\web\ForbiddenHttpException(Module::t('You do not have permission to update this todo.'));
                break;
            case 'delete':
                if (!Yii::$app->user->can('todoApiTaskDelete'))
                    throw new \yii\web\ForbiddenHttpException(Module::t('You do not have permission to delete this todo.'));
                break;
            case 'index' :
                if (!Yii::$app->user->can('todoApiTaskIndex'))
                    throw new \yii\web\ForbiddenHttpException(Module::t('You do not have permission to view this content.'));
                break;
        }

        return true;
    }


}