
<?php


namespace meryemertrk\todo\bundles;

use yii\web\AssetBundle;

class TaskAsset extends AssetBundle
{

    public $sourcePath= '@vendor/meryemertrk/yii2-todo/src/assets/';


    public $css = [
        'css/task.css'
    ];


    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];



    public function init()
    {
        parent::init();
    }



}