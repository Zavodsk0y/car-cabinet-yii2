<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int|null $mark_id
 * @property string|null $name
 * @property int $engine_capacity
 * @property string $release_date
 * @property string $color
 * @property int|null $gear_type_id
 *
 * @property GearType $gearType
 * @property CarMark $mark
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mark_id', 'engine_capacity', 'gear_type_id'], 'integer'],
            [['engine_capacity', 'release_date', 'color'], 'required'],
            [['name', 'color'], 'string', 'max' => 255],
            [['release_date'], 'string', 'max' => 5],
            [['gear_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => GearType::class, 'targetAttribute' => ['gear_type_id' => 'id']],
            [['mark_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarMark::class, 'targetAttribute' => ['mark_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mark_id' => 'Марка автомобиля',
            'name' => 'Наименование',
            'engine_capacity' => 'Объем двигателя (л.с.)',
            'release_date' => 'Дата выпуска',
            'color' => 'Цвет',
            'gear_type_id' => 'Тип коробки передач',
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
}
