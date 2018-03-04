<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "brands".
 *
 * @property integer $id
 * @property string $name
 * @property integer $sort_order
 * @property integer $status
 */
class Brand extends \yii\db\ActiveRecord
{
    /**Статусы производителя к публикации: 1 - да, 0 - нет*/
    const STATUS_PUBLISHED = 1;
    const STATUS_NOT_PUBLISHED = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['sort_order', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'sort_order' => 'Sort Order',
            'status' => 'Статус',
        ];
    }

    /**
     * Товары в производителе
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['brand_id' => 'id']);
    }

    /**
     * Количество товаров в производителе
     * @return int|string
     */
    public function getCount()
    {
        return $this->getProducts()->count();
    }

    /**
     * Разрешенные к публикации бренды
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getBrands()
    {
        return self::find()->where(['status' => self::STATUS_PUBLISHED])->all();
    }

    /**
     * Все товары с пагинацией для выбранного производителя
     * @param int $pageSize
     * @return mixed
     */
    public static function getProductByBrandId($id, $pageSize = 6)
    {
        // build a DB query to get all articles with status = 1
        $query = Product::find()->where(['brand_id' => $id])->andWhere(['status' => Product::STATUS_PUBLISHED]);
        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();
        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>$pageSize]);
        // limit the query using the pagination and retrieve the articles
        $products = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['products'] = $products;
        $data['pagination'] = $pagination;
        return $data;
    }
}
