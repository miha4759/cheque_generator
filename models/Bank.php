<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "banks".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $postal_code
 * @property string|null $province
 * @property string|null $town
 * @property string|null $street
 *
 * @property Cheque[] $cheques
 * @property User[] $users
 */
class Bank extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'province', 'town', 'street'], 'string', 'max' => 255],
            [['name', 'town', 'street'], 'required'],
            [['postal_code'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'postal_code' => 'Postal Code',
            'province' => 'Province',
            'town' => 'Town',
            'street' => 'Street',
        ];
    }

    /**
     * Gets query for [[Cheques]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCheques()
    {
        return $this->hasMany(Cheque::class, ['bank_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['bank_id' => 'id']);
    }
}
