
<?php

namespace meryemertrk\todo\bundles;

use yii\web\AssetBundle;


//burada path verilecek
class TaskAsset extends AssetBundle
{
    public $sourcePath = '@vendor/meryemertrk/yii2-todo/src/assets/';

    public $depends = [
        'portalium\theme\bundles\AppAsset'
    ];


    public $css = [
        'task.css'
    ];


    public function init()
    {
        parent::init();
    }
}
