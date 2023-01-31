<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id ИД
 * @property int|null $region_id Регион
 * @property string $name Город
 * @property int|null $status Статус
 * @property string|null $created_at Дата и время создания
 * @property int|null $craeted_by Создал
 * @property string|null $updated_at Дата и время обновления
 * @property int|null $updated_by Обновил
 *
 * @property Cv[] $cvs
 * @property Region $region
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'status', 'craeted_by', 'updated_by'], 'integer'],
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::class, 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'region_id' => 'Регион',
            'name' => 'Город',
            'status' => 'Статус',
            'created_at' => 'Дата и время создания',
            'craeted_by' => 'Создал',
            'updated_at' => 'Дата и время обновления',
            'updated_by' => 'Обновил',
        ];
    }

    /**
     * Gets query for [[Cvs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCvs()
    {
        return $this->hasMany(Cv::class, ['city_id' => 'id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }
}
