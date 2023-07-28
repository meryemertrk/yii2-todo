<?php

namespace meryemertrk\todo\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use meryemertrk\todo\bundles\TaskAsset;
use meryemertrk\todo\models\TaskSearch;
use meryemertrk\todo\models\Task as TodoTask;

class Task extends Widget{

    public function init()
    {
      //widget başlatılmasında yapılacak işlemler
    }


    public function run()
    {
        $tasks = TodoTask::widgets();
        //widgetın sonucunu döndüren render fonksyionunu kullanarak 'task' adlı bir view dosyasını çağırıyoruz.
        return $this->render('task',[
            'tasks'=>$tasks
        ]);


    }

}



