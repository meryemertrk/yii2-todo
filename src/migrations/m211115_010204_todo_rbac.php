<?php

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

       /* $todoWebDefaultIndex = $auth2->createPermission('todoWebDefaultIndex');
        $todoWebDefaultIndex->description = 'Todo Web DefaultIndex';
        $auth2->add($todoWebDefaultIndex);
        $auth2->addChild($admin, $todoWebDefaultIndex);

        $todoWebDefaultCreate = $auth2->createPermission('todoWebDefaultCreate');
        $todoWebDefaultCreate->description = 'Todo Web DefaultCreate';
        $auth2->add($todoWebDefaultCreate);
        $auth2->addChild($admin, $todoWebDefaultCreate);

        $todoWebDefaultView = $auth2->createPermission('todoWebDefaultView');
        $todoWebDefaultView->description = 'Todo Web DefaultView';
        $auth2->add($todoWebDefaultView);
        $auth2->addChild($admin, $todoWebDefaultView);

        $todoWebDefaultUpdate = $auth2->createPermission('todoWebDefaultUpdate');
        $todoWebDefaultUpdate->description = 'Todo Web DefaultUpdate';
        $auth2->add($todoWebDefaultUpdate);
        $auth2->addChild($admin, $todoWebDefaultUpdate);

        $todoWebDefaultDelete = $auth2->createPermission('todoWebDefaultDelete');
        $todoWebDefaultDelete->description = 'Todo Web DefaultDelete';
        $auth2->add($todoWebDefaultDelete);
        $auth2->addChild($admin, $todoWebDefaultDelete);*/

        $todoWebTaskIndex = $auth->createPermission('todoWebTaskIndex');
        $todoWebTaskIndex->description = 'Todo Web TaskIndex';
        $auth->add($todoWebTaskIndex);
        $auth->addChild($admin, $todoWebTaskIndex);

        $todoWebTaskCreate = $auth->createPermission('todoWebTaskCreate');
        $todoWebTaskCreate->description = 'Content Web TaskCreate';
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
        $todoWebTaskCreateOwn->description = 'Content Web TaskCreateOwn';
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

        /*$auth2->remove($auth2->getPermission('todoWebDefaultIndex'));
        $auth2->remove($auth2->getPermission('todoWebDefaultCreate'));
        $auth2->remove($auth2->getPermission('todoWebDefaultView'));
        $auth2->remove($auth2->getPermission('todoWebDefaultUpdate'));
        $auth2->remove($auth2->getPermission('todoWebDefaultDelete'));*/
        $auth->remove($auth->getPermission('todoWebCategoryIndex'));
        $auth->remove($auth->getPermission('todoWebCategoryCreate'));
        $auth->remove($auth->getPermission('todotWebCategoryView'));
        $auth->remove($auth->getPermission('todoWebCategoryUpdate'));
        $auth->remove($auth->getPermission('todoWebCategoryDelete'));
        $auth->remove($auth->getPermission('todoOwnWebCategoryIndex'));
        $auth->remove($auth->getPermission('todoOwnWebCategoryCreate'));
        $auth->remove($auth->getPermission('todoOwnWebCategoryView'));
        $auth->remove($auth->getPermission('todoOwnWebCategoryUpdate'));
        $auth->remove($auth->getPermission('todoOwnWebCategoryDelete'));



    }
}
