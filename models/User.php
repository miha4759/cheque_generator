<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int|null $bank_id
 * @property string|null $full_name
 * @property string|null $postal_code
 * @property string|null $province
 * @property string|null $town
 * @property string|null $street
 *
 * @property Bank $bank
 * @property Cheque[] $cheques
 */
class User extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_id'], 'integer'],
            [['full_name', 'province', 'town', 'street'], 'string', 'max' => 255],
            [['full_name', 'town', 'street'], 'required',],
            [['postal_code'], 'string', 'max' => 12],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::class, 'targetAttribute' => ['bank_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_id' => 'Bank ID',
            'full_name' => 'Full Name',
            'postal_code' => 'Postal Code',
            'province' => 'Province',
            'town' => 'Town',
            'street' => 'Street',
        ];
    }

    /**
     * Gets query for [[Bank]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(Bank::class, ['id' => 'bank_id']);
    }

    /**
     * Gets query for [[Cheques]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCheques()
    {
        return $this->hasMany(Cheque::class, ['user_id' => 'id']);
    }
}
