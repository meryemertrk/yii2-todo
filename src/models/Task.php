<?php

namespace meryemertrk\todo\models;


use meryemertrk\todo\Module;
use portalium\user\models\User;
use portalium\workspace\models\Workspace;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;


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
class Task extends ActiveRecord
{

    const STATUS = [
        'completed' => 0,
        'updated' => 1,
        'deleted' => 2,
    ];

    /**
     * {@inheritdoc}
     */


    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'id_user',
                'updatedByAttribute' => 'id_user',
            ],

            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'id_workspace',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'id_workspace',
                ],
                'value' => function ($event) {
                    return Yii::$app->workspace->id;
                },
            ]

        ];
    }

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

    public static function find()
    {
        $activeWorkspaceId = Yii::$app->workspace->id;
        $query = parent::find();
        if (Yii::$app->user->can('todoTaskFindAll', ['id_module' => 'todo'])) {
            return $query;
        }
        if (!Yii::$app->user->can('todoTaskFindOwner', ['id_module' => 'todo'])) {
            return $query->andWhere('0=1');
        }
        if ($activeWorkspaceId) {
            $query->andWhere([Module::$tablePrefix . 'todo.id_workspace' => $activeWorkspaceId]);
        }else{
            return $query->andWhere('0=1');
        }
        return $query;
    }

    public function beforeSave($insert)
    {
        if (Yii::$app->workspace->checkOwner($this->id_workspace)) {
            return parent::beforeSave($insert);
        }
        return false;
    }


    public function getWorkspace()
    {
        return $this->hasOne(Workspace::class, ['id_workspace' => 'id_workspace']);
    }


}
