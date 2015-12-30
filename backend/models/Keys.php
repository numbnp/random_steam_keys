<?php

namespace backend\models;

use Yii;
use \yii\db\Expression;
/**
 * This is the model class for table "keys".
 *
 * @property integer $id
 * @property integer $game_id
 * @property string $key
 * @property double $cost
 * @property string $created_at
 * @property string $updated_at
 * @property integer $sales
 *
 * @property Games $game
 */
class Keys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keys';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id', 'key'], 'required'],
            [['game_id', 'sales'], 'integer'],
            [['cost'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['key'], 'string', 'max' => 255],
            [['key'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => 'Game ID',
            'key' => 'Key',
            'cost' => 'Cost',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'sales' => 'Sales',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGame()
    {
        return $this->hasOne(Games::className(), ['id' => 'game_id']);
    }

    public function getGameName()
    {
        return $this->game ? $this->game->name : '';
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
