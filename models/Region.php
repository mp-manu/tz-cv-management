<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id ИД
 * @property string $name Регион
 * @property int|null $status Статус
 * @property string|null $created_at Дата и время создания
 * @property int|null $created_by Создал
 * @property string|null $updated_at Дата и время обновления
 * @property int|null $updated_by Обновил
 *
 * @property City[] $cities
 * @property Cv[] $cvs
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'name' => 'Регион',
            'status' => 'Статус',
            'created_at' => 'Дата и время создания',
            'created_by' => 'Создал',
            'updated_at' => 'Дата и время обновления',
            'updated_by' => 'Обновил',
        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::class, ['region_id' => 'id']);
    }

    /**
     * Gets query for [[Cvs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCvs()
    {
        return $this->hasMany(Cv::class, ['region_id' => 'id']);
    }
}
