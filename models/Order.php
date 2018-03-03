<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $count
 * @property double $summ
 * @property integer $status
 * @property string $user_id
 * @property string $address
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['count', 'status'], 'integer'],
            [['summ'], 'number'],
            [['user_id', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'count' => 'Count',
            'summ' => 'Summ',
            'status' => 'Status',
            'user_id' => 'User ID',
            'address' => 'Address',
        ];
    }
}
