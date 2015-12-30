<?php

namespace backend\models;

use Yii;
use \yii\db\Expression;

/**
 * This is the model class for table "games".
 *
 * @property integer $id
 * @property integer $group_id
 * @property string $name
 * @property double $cost
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Groups $group
 */
class Games extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'games';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'name', 'created_at', 'updated_at'], 'required'],
            [['group_id'], 'integer'],
            [['cost'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'name' => 'Name',
            'cost' => 'Cost',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'GroupName'  => 'Group Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }

    public function getGroupName()
    {
        return $this->group ? $this->group->name : '';
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {

        if ($this->isNewRecord)
        {
            $this->created_at = new Expression('NOW()');
        }

        $this->updated_at = new Expression('NOW()');
        return parent::beforeSave($insert);
    }

}
