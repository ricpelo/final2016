<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inmuebles".
 *
 * @property int $id
 * @property string $precio
 * @property int $habitaciones
 * @property int $banos
 * @property bool $lavavajillas
 * @property bool $garaje
 * @property bool $trastero
 * @property int $propietario_id
 *
 * @property Propietarios $propietario
 */
class Inmuebles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inmuebles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['precio'], 'number'],
            [['habitaciones', 'banos', 'propietario_id'], 'default', 'value' => null],
            [['habitaciones', 'banos', 'propietario_id'], 'integer'],
            [['lavavajillas', 'garaje', 'trastero'], 'boolean'],
            [['propietario_id'], 'required'],
            [['propietario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Propietarios::className(), 'targetAttribute' => ['propietario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'precio' => 'Precio',
            'habitaciones' => 'Habitaciones',
            'banos' => 'Banos',
            'lavavajillas' => 'Lavavajillas',
            'garaje' => 'Garaje',
            'trastero' => 'Trastero',
            'propietario_id' => 'Propietario ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietario()
    {
        return $this->hasOne(Propietarios::className(), ['id' => 'propietario_id'])->inverseOf('inmuebles');
    }
}
