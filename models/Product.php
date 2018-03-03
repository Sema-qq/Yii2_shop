<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property integer $code
 * @property double $price
 * @property integer $avialability
 * @property integer $brand_id
 * @property string $image
 * @property string $description
 * @property integer $is_new
 * @property integer $is_recommended
 * @property integer $status
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'code', 'avialability', 'brand_id', 'is_new', 'is_recommended', 'status'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'code' => 'Code',
            'price' => 'Price',
            'avialability' => 'Avialability',
            'brand_id' => 'Brand ID',
            'image' => 'Image',
            'description' => 'Description',
            'is_new' => 'Is New',
            'is_recommended' => 'Is Recommended',
            'status' => 'Status',
        ];
    }
}
