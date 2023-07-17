<?php
use yii\db\Migration;

class m211115_010205_task_rbac extends Migration
{
    public function up()
    {
        $auth = \Yii::$app->authManager;

        $role = \Yii::$app->setting->getValue('site::admin_role');
        $admin = (isset($role) && $role != '') ? $auth->getRole($role) : $auth->getRole('admin');

        $todoWebTaskIndex = $auth->createPermission('todoWebTaskIndex');
        $todoWebTaskIndex->description = 'Todo Web TaskIndex';
        $auth->add($todoWebTaskIndex);
        $auth->addChild($admin, $todoWebTaskIndex);

        $todoWebTaskCreate = $auth->createPermission('todoWebTaskCreate');
        $todoWebTaskCreate->description = 'Todo Web TaskCreate';
        $auth->add($todoWebTaskCreate);
        $auth->addChild($admin, $todoWebTaskCreate);

        $todoWebTaskView = $auth->createPermission('todoWebTaskView');
        $todoWebTaskView->description = 'Todo Web TaskView';
        $auth->add($todoWebTaskView);
        $auth->addChild($admin, $todoWebTaskView);

        $todoWebTaskUpdate = $auth->createPermission('todoWebTaskUpdate');
        $todoWebTaskUpdate->description = 'Todo Web TaskUpdate';
        $auth->add($todoWebTaskUpdate);
        $auth->addChild($admin, $todoWebTaskUpdate);

        $todoWebTaskDelete = $auth->createPermission('todoWebTaskDelete');
        $todoWebTaskDelete->description = 'Todo Web TaskDelete';
        $auth->add($todoWebTaskDelete);
        $auth->addChild($admin, $todoWebTaskDelete);

    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $auth->remove($auth->getPermission('todoWebTaskIndex'));
        $auth->remove($auth->getPermission('todoWebTaskCreate'));
        $auth->remove($auth->getPermission('todoWebTaskView'));
        $auth->remove($auth->getPermission('todoWebTaskUpdate'));
        $auth->remove($auth->getPermission('todoWebTaskDelete'));


    }
}