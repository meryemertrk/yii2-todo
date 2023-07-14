<?php

namespace meryemertrk\todo\models;

use meryemertrk\todo\Module;
use Yii;

/**
 * This is the model class for table "todo_task".
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
 * @property UserUser $user
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{' . Module::$tablePrefix . 'todo}}';
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
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserUser::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

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
        return $this->hasOne(UserUser::class, ['id_user' => 'id_user']);
    }
}
