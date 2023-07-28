<?php

namespace meryemertrk\todo\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Task extends Widget{

    public function init()
    {
      //widget başlatılmasında yapılacak işlemler
    }


    public function run()
    {
        //widgetın sonucunu döndüren render fonksyionunu kullanarak 'task' adlı bir view dosyasını çağırıyoruz.
        return $this->render('task');


    }

}



