<?php

namespace backend\modules\categories\models;
use backend\modules\user\models\User;
use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $level
 * @property integer $lvt
 * @property integer $rgt
 * @property string $category_name
 * @property string $descriptiom
 * @property integer $visible
 *
 * @property User $user
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'level', 'lvt', 'rgt', 'visible'], 'integer'],
            [['descriptiom'], 'string'],
            [['category_name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'level' => 'Level',
            'lvt' => 'Lvt',
            'rgt' => 'Rgt',
            'category_name' => 'Category Name',
            'descriptiom' => 'Descriptiom',
            'visible' => 'Visible',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['cat_id' => 'id']);
    }
}
