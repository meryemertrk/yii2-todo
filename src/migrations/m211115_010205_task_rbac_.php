<?php


use meryemertrk\todo\rbac\OwnRule;
use yii\db\Migration;

class m220220_100716_content_rule_rbac extends Migration
{
    public function up()
    {
        $auth = \Yii::$app->authManager;

        $rule = new OwnRule();
        $auth->add($rule);
        $role = \Yii::$app->setting->getValue('site::admin_role');
        $admin = (isset($role) && $role != '') ? $auth->getRole($role) : $auth->getRole('admin');



        $todoWebTaskIndexOwn = $auth->createPermission('todoWebTaskIndexOwn');
        $todoWebTaskIndexOwn->description = 'Todo Web TaskIndexOwn';
        $auth->add($todoWebTaskIndexOwn);
        $auth->addChild($admin, $todoWebTaskIndexOwn);

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



    }

    public function down()
    {
        $auth = \Yii::$app->authManager;


        $auth->remove($auth->getPermission('todoWebTaskIndexOwn'));
        $auth->remove($auth->getPermission('todoWebTaskViewOwn'));
        $auth->remove($auth->getPermission('todoWebTaskCreateOwn'));
        $auth->remove($auth->getPermission('todoWebTaskUpdateOwn'));
        $auth->remove($auth->getPermission('todoWebTaskDeleteOwn'));

    }
}
