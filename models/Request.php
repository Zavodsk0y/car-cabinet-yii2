<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $name
 * @property int|null $mark_id
 * @property string|null $engine_capacity
 * @property string|null $release_date
 * @property string|null $color
 * @property int|null $gear_type_id
 * @property int|null $user_id
 * @property int|null $status
 *
 * @property GearType $gearType
 * @property CarMark $mark
 * @property User $user
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['mark_id', 'gear_type_id', 'user_id', 'status'], 'integer'],
            [['name', 'engine_capacity', 'color'], 'string', 'max' => 255],
            [['release_date'], 'string', 'max' => 5],
            [['gear_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => GearType::class, 'targetAttribute' => ['gear_type_id' => 'id']],
            [['mark_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarMark::class, 'targetAttribute' => ['mark_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'mark_id' => 'Марка',
            'engine_capacity' => 'Объем двигателя (л.с.)',
            'release_date' => 'Дата выпуска',
            'color' => 'Цвет',
            'gear_type_id' => 'Тип КПП',
            'user_id' => 'Клиент',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[GearType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGearType()
    {
        return $this->hasOne(GearType::class, ['id' => 'gear_type_id']);
    }

    /**
     * Gets query for [[Mark]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMark()
    {
        return $this->hasOne(CarMark::class, ['id' => 'mark_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0:
                return 'Принята';
            case 1:
                return 'Автомобиль найден';
        }
    }
}
