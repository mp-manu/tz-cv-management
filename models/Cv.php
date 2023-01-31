<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cv".
 *
 * @property int $id ИД
 * @property string $name Имя
 * @property string $email Email
 * @property string $phone Телефон
 * @property int $region_id Регион
 * @property int $city_id Город
 * @property int $gender Пол
 * @property string $question Порекомендовали ли вы нас...?
 * @property int $grade Оценка
 * @property string $comment Комментария
 * @property string|null $created_at Дата и время создания
 * @property int|null $created_by Создал
 * @property string|null $updated_at Дата и время обновления
 * @property int|null $updated_by Обновил
 *
 * @property City $city
 * @property Region $region
 */
class Cv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'region_id', 'city_id', 'gender', 'question', 'grade', 'comment'], 'required'],
            [['region_id', 'city_id', 'gender', 'grade', 'created_by', 'updated_by'], 'integer'],
            [['question', 'comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::class, 'targetAttribute' => ['region_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'region_id' => 'Регион',
            'city_id' => 'Город',
            'gender' => 'Пол',
            'question' => 'Порекомендовали ли вы нас...?',
            'grade' => 'Оценка',
            'comment' => 'Комментария',
            'created_at' => 'Дата и время создания',
            'created_by' => 'Создал',
            'updated_at' => 'Дата и время обновления',
            'updated_by' => 'Обновил',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
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
