<?php

use meryemertrk\todo\rbac\OwnRule;
use yii\db\Migration;

class m220220_100716_todo_rbac extends Migration
{
    public function up()
    {
        $auth = \Yii::$app->authManager;
        $rule = new OwnRule();
        $auth->add($rule);

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

        $todoWebTaskIndexOwn = $auth->createPermission('todoWebTaskIndexOwn');
        $todoWebTaskIndexOwn->description = 'Todo Web TaskIndexOwn';
        $auth->add($todoWebTaskIndexOwn);
        $auth->addChild($admin, $todoWebTaskIndexOwn);

        $todoWebTaskCreateOwn = $auth->createPermission('todotWebTaskCreateOwn');
        $todoWebTaskCreateOwn->description = 'Todo Web TaskCreateOwn';
        $todoWebTaskCreateOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskCreateOwn);
        $auth->addChild($admin, $todoWebTaskCreateOwn);
        $todoWebTaskCreate = $auth->getPermission('todoWebTaskCreate');
        $auth->addChild($todoWebTaskCreateOwn, $todoWebTaskCreate);

        $todoWebTaskViewOwn = $auth->createPermission('todoWebTaskViewOwn');
        $todoWebTaskViewOwn->description = 'Todo Web TaskViewOwn';
        $todoWebTaskViewOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskViewOwn);
        $auth->addChild($admin, $todoWebTaskViewOwn);
        $todoWebTaskView = $auth->getPermission('todoWebTaskView');
        $auth->addChild($todoWebTaskViewOwn, $todoWebTaskView);

        $todoWebTaskUpdateOwn = $auth->createPermission('todoWebTaskUpdateOwn');
        $todoWebTaskUpdateOwn->description = 'Todo Web TaskUpdateOwn';
        $todoWebTaskUpdateOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskUpdateOwn);
        $auth->addChild($admin, $todoWebTaskUpdateOwn);
        $todoWebTaskUpdate = $auth->getPermission('todoWebTaskUpdate');
        $auth->addChild($todoWebTaskUpdateOwn, $todoWebTaskUpdate);

        $todoWebTaskDeleteOwn = $auth->createPermission('todoWebTaskDeleteOwn');
        $todoWebTaskDeleteOwn->description = 'Todo Web TaskDeleteOwn';
        $todoWebTaskDeleteOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskDeleteOwn);
        $auth->addChild($admin, $todoWebTaskDeleteOwn);
        $todoWebTaskDelete = $auth->getPermission('todoWebTaskDelete');
        $auth->addChild($todoWebTaskDeleteOwn, $todoWebTaskDelete);



}

public function down()
{
    $auth = \Yii::$app->authManager;


    $auth->remove($auth->getPermission('todoWebTaskIndex'));
    $auth->remove($auth->getPermission('todoWebTaskCreate'));
    $auth->remove($auth->getPermission('todoWebTaskView'));
    $auth->remove($auth->getPermission('todoWebTaskUpdate'));
    $auth->remove($auth->getPermission('todoWebTaskDelete'));
    $auth->remove($auth->getPermission('todoWebTaskIndexOwn'));
    $auth->remove($auth->getPermission('todoWebTaskCreateOwn'));
    $auth->remove($auth->getPermission('todoWebTaskViewOwn'));
    $auth->remove($auth->getPermission('todoWebTaskUpdateOwn'));
    $auth->remove($auth->getPermission('todoWebTaskDeleteOwn'));



}
}
