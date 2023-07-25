<?php

use meryemertrk\todo\rbac\OwnRule;
use yii\db\Migration;

class m211115_010205_task_rbac extends Migration
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

        $todoApiTaskIndex = $auth->createPermission('todoApiTaskIndex');
        $todoApiTaskIndex->description = 'Todo Api TaskIndex';
        $auth->add($todoApiTaskIndex);
        $auth->addChild($admin, $todoApiTaskIndex);

        $todoApiTaskCreate = $auth->createPermission('todoApiTaskCreate');
        $todoApiTaskCreate->description = 'Todo Api TaskCreate';
        $auth->add($todoApiTaskCreate);
        $auth->addChild($admin, $todoApiTaskCreate);

        $todoApiTaskView = $auth->createPermission('todoApiTaskView');
        $todoApiTaskView->description = 'Todo Api TaskView';
        $auth->add($todoApiTaskView);
        $auth->addChild($admin, $todoApiTaskView);

        $todoApiTaskUpdate = $auth->createPermission('todoApiTaskUpdate');
        $todoApiTaskUpdate->description = 'Todo Api TaskUpdate';
        $auth->add($todoApiTaskUpdate);
        $auth->addChild($admin, $todoApiTaskUpdate);

        $todoApiTaskDelete = $auth->createPermission('todoApiTaskDelete');
        $todoApiTaskDelete->description = 'Todo Api TaskDelete';
        $auth->add($todoApiTaskDelete);
        $auth->addChild($admin, $todoApiTaskDelete);

        $todoTaskFindAll = $auth->createPermission('todoTaskFindAll');
        $todoTaskFindAll->description = 'Todo Task FindAll';
        $auth->add($todoTaskFindAll);
        $auth->addChild($admin, $todoTaskFindAll);

        $todoTaskFindOwner = $auth->createPermission('todoTaskFindOwner');
        $todoTaskFindOwner->description = 'Todo Task FindOwner';
        $auth->add($todoTaskFindOwner);
        $auth->addChild($admin, $todoTaskFindOwner);

        $todoWebTaskIndexOwn = $auth->createPermission('todoWebTaskIndexOwn');
        $todoWebTaskIndexOwn->description = 'Todo Web TaskIndexOwn';
        $todoWebTaskIndexOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskIndexOwn);
        $auth->addChild($admin, $todoWebTaskIndexOwn);
        $todoWebTaskIndex = $auth->getPermission('todoWebTaskIndex');
        $auth->addChild($todoWebTaskIndexOwn, $todoWebTaskIndex);

        $todoWebTaskViewOwn = $auth->createPermission('todoWebTaskViewOwn');
        $todoWebTaskViewOwn->description = 'Todo Web TaskViewOwn';
        $todoWebTaskViewOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskViewOwn);
        $auth->addChild($admin, $todoWebTaskViewOwn);
        $todoWebTaskView = $auth->getPermission('todoWebTaskView');
        $auth->addChild($todoWebTaskViewOwn, $todoWebTaskView);

        $todoWebTaskCreateOwn = $auth->createPermission('todoWebTaskCreateOwn');
        $todoWebTaskCreateOwn->description = 'Todo Web TaskCreateOwn';
        $todoWebTaskCreateOwn->ruleName = $rule->name;
        $auth->add($todoWebTaskCreateOwn);
        $auth->addChild($admin, $todoWebTaskCreateOwn);
        $todoWebTaskCreate = $auth->getPermission('todoWebTaskCreate');
        $auth->addChild($todoWebTaskCreateOwn, $todoWebTaskCreate);

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

        $todoApiTaskIndexOwn = $auth->createPermission('todoApiTaskIndexOwn');
        $todoApiTaskIndexOwn->description = 'Todo Api TaskIndexOwn';
        $todoApiTaskIndexOwn->ruleName = $rule->name;
        $auth->add($todoApiTaskIndexOwn);
        $auth->addChild($admin, $todoApiTaskIndexOwn);
        $todoApiTaskIndex = $auth->getPermission('todoApiTaskIndex');
        $auth->addChild($todoApiTaskIndexOwn, $todoApiTaskIndex);

        $todoApiTaskViewOwn = $auth->createPermission('todoApiTaskViewOwn');
        $todoApiTaskViewOwn->description = 'Todo Api TaskViewOwn';
        $todoApiTaskViewOwn->ruleName = $rule->name;
        $auth->add($todoApiTaskViewOwn);
        $auth->addChild($admin, $todoApiTaskViewOwn);
        $todoApiTaskView = $auth->getPermission('todoApiTaskView');
        $auth->addChild($todoApiTaskViewOwn, $todoApiTaskView);

        $todoApiTaskCreateOwn = $auth->createPermission('todoApiTaskCreateOwn');
        $todoApiTaskCreateOwn->description = 'Todo Api TaskCreateOwn';
        $todoApiTaskCreateOwn->ruleName = $rule->name;
        $auth->add($todoApiTaskCreateOwn);
        $auth->addChild($admin, $todoApiTaskCreateOwn);
        $todoApiTaskCreate = $auth->getPermission('todoApiTaskCreate');
        $auth->addChild($todoApiTaskCreateOwn, $todoApiTaskCreate);

        $todoApiTaskUpdateOwn = $auth->createPermission('todoApiTaskUpdateOwn');
        $todoApiTaskUpdateOwn->description = 'Todo Api TaskUpdateOwn';
        $todoApiTaskUpdateOwn->ruleName = $rule->name;
        $auth->add($todoApiTaskUpdateOwn);
        $auth->addChild($admin, $todoApiTaskUpdateOwn);
        $todoApiTaskUpdate = $auth->getPermission('todoApiTaskUpdate');
        $auth->addChild($todoApiTaskUpdateOwn, $todoApiTaskUpdate);

        $todoApiTaskDeleteOwn = $auth->createPermission('todoApiTaskDeleteOwn');
        $todoApiTaskDeleteOwn->description = 'Todo Api TaskDeleteOwn';
        $todoApiTaskDeleteOwn->ruleName = $rule->name;
        $auth->add($todoApiTaskDeleteOwn);
        $auth->addChild($admin, $todoApiTaskDeleteOwn);
        $todoApiTaskDelete = $auth->getPermission('todoApiTaskDelete');
        $auth->addChild($todoApiTaskDeleteOwn, $todoApiTaskDelete);



    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        $auth->remove($auth->getPermission('todoWebTaskIndex'));
        $auth->remove($auth->getPermission('todoWebTaskCreate'));
        $auth->remove($auth->getPermission('todoWebTaskView'));
        $auth->remove($auth->getPermission('todoWebTaskUpdate'));
        $auth->remove($auth->getPermission('todoWebTaskDelete'));
        $auth->remove($auth->getPermission('todoWebTaskIndexOwn'));
        $auth->remove($auth->getPermission('todoWebTaskViewOwn'));
        $auth->remove($auth->getPermission('todoWebTaskCreateOwn'));
        $auth->remove($auth->getPermission('todoWebTaskUpdateOwn'));
        $auth->remove($auth->getPermission('todoWebTaskDeleteOwn'));
        $auth->remove($auth->getPermission('todoApiTaskIndex'));
        $auth->remove($auth->getPermission('todoApiTaskCreate'));
        $auth->remove($auth->getPermission('todoApiTaskView'));
        $auth->remove($auth->getPermission('todoApiTaskUpdate'));
        $auth->remove($auth->getPermission('todoApiTaskDelete'));
        $auth->remove($auth->getPermission('todoApiTaskIndexOwn'));
        $auth->remove($auth->getPermission('todoApiTaskViewOwn'));
        $auth->remove($auth->getPermission('todoApiTaskCreateOwn'));
        $auth->remove($auth->getPermission('todoApiTaskUpdateOwn'));
        $auth->remove($auth->getPermission('todoApiTaskDeleteOwn'));
        $auth->remove($auth->getPermission('todoTaskFindAll'));
        $auth->remove($auth->getPermission('todoTaskFindOwner'));


    }
}