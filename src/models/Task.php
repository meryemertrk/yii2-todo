<?php

namespace meryemertrk\todo\models;


use meryemertrk\todo\Module;
use portalium\user\models\User;
use Yii;


/**
 * This is the model class for table "{{%todo_task}}".
 *
 * @property int $id_task
 * @property string $title
 * @property string $description
 * @property int $status
 * @property int $id_user
 * @property int $id_workspace
 * @property string $date_create
 * @property string $date_update
 *
 * @property User $user
 */
class Task extends \yii\db\ActiveRecord
{

    const STATUS = [
        'completed' => 0,
        'updated' => 1,
        'deleted' => 2,
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%' . Module::$tablePrefix . 'task}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'status', 'id_user', 'id_workspace'], 'required'],
            [['title'], 'string'],
            [['status', 'id_user', 'id_workspace'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['description'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    //Save butonuna basıldığında alınan hatanın çözümü:User modülü değiştirildi.

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_task' => 'Id Task',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'id_user' => 'Id User',
            'id_workspace' => 'Id Workspace',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'id_user']);
    }

    public static function getStatusList(){

        return [
            'STATUS' => [
                self::STATUS['completed'] => Module::t('Completed'),
                self::STATUS['updated'] => Module::t('Updated'),
                self::STATUS['deleted'] => Module::t('Deleted'),
            ],

        ];
    }
}
