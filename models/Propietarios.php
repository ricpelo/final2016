<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propietarios".
 *
 * @property int $id
 * @property string $dni
 * @property string $nombre
 * @property string $telefono
 *
 * @property Inmuebles[] $inmuebles
 */
class Propietarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propietarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dni', 'telefono'], 'required'],
            [['telefono'], 'number'],
            [['dni'], 'string', 'max' => 9],
            [['nombre'], 'string', 'max' => 255],
            [['dni'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dni' => 'Dni',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmuebles::className(), ['propietario_id' => 'id'])->inverseOf('propietario');
    }
}
