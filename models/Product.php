<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

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
            [['name', 'price', 'code'], 'required'],
            [['category_id', 'code', 'avialability', 'brand_id', 'is_new', 'is_recommended', 'status'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
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

    /**
     * Категории
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Производители
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * Сохранение категории (способ первый)
     * @param $category_id
     * @return bool
     */
    public function saveCategory($category_id)
    {
        if(!empty($category = Category::findOne($category_id))){
            $this->link('category', $category);
            return true;
        }

    }

    /**
     * Сохранение бренда (способ второй)
     * @param $brand_id
     * @return bool
     */
    public function saveBrand($brand_id)
    {
        if (!empty($brand = Brand::findOne($brand_id))){
            $this->link('brand', $brand);
            return true;
        }
    }

    /**
     * Сохранение картинки
     * @param $image
     * @return bool
     */
    public function saveImage($image)
    {
        $this->image = $image;
        return $this->save(false);
    }

    /**
     * Удаление картинки
     */
    private function deleteImage()
    {
        $imageUpload = new ImageUpload();
        $imageUpload->deleteCurrentImage($this->image);
    }

    /**
     * Удаление картинки при удалении статьи
     * @return bool
     */
    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    /**
     * Вывод картинки
     * @return string
     */
    public function getImage()
    {
        return !empty($this->image) ? '/uploads/'.$this->image : '/no-image.png';
    }

    /**
     * Рекомендуемые товары, разрешенные к публикации
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getRecommendedProduct()
    {
        return self::find()->where(['status' => self::STATUS_PUBLISHED])
            ->andWhere(['is_recommended' => self::IS_RECOMMENDED])
            ->all();
    }

    /**
     * Товары для главной разрешенные к публикации с лимитом 6 штук
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getProductByIndex($limit = 6)
    {
        return self::find()->where(['status' => self::STATUS_PUBLISHED])->limit($limit)->all();
    }

    /**
     * Все товары с пагинацией
     * @param int $pageSize
     * @return mixed
     */
    public static function getAll($pageSize = 6)
    {
        // build a DB query to get all articles with status = 1
        $query = self::find()->where(['status' => self::STATUS_PUBLISHED]);
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
