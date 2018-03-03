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
    /** доступность товара на складе: 1 - есть, 0 - нет */
    const IS_AVIALABLE = 1;
    const IS_NOT_AVIALABLE = 0;

    /** Новый товар: 1 - да, 0 - нет */
    const IS_NEW = 1;
    const IS_NOT_NEW = 0;

    /** Реомендуемый товар: 1 - да, 0 - нет */
    const IS_RECOMMENDED = 1;
    const IS_NOT_RECOMMENDED = 0;

    /**Статус товара к публикации: 1 - да, 0 - нет*/
    const STATUS_PUBLISHED = 1;
    const STATUS_NOT_PUBLISHED = 0;

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
            'id' => 'Ид',
            'name' => 'Название',
            'category_id' => 'Категория',
            'code' => 'Код',
            'price' => 'Цена',
            'avialability' => 'Наличие на складе',
            'brand_id' => 'Производитель',
            'image' => 'Фото',
            'description' => 'Описание',
            'is_new' => 'Новый',
            'is_recommended' => 'Рекомендуемый',
            'status' => 'Статус',
        ];
    }
}
