<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "cheques".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $bank_id
 * @property string|null $recipient
 * @property string|null $memo
 * @property float|null $amount
 * @property string|null $created_at
 *
 * @property Bank $bank
 * @property User $user
 */
class Cheque extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cheques';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'bank_id'], 'integer'],
            [['memo'], 'string'],
            [['amount'], 'number'],
            [['created_at'], 'safe'],
            [['recipient'], 'string', 'max' => 255],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::class, 'targetAttribute' => ['bank_id' => 'id']],
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
            'user_id' => 'User ID',
            'bank_id' => 'Bank ID',
            'recipient' => 'Recipient',
            'memo' => 'Memo',
            'amount' => 'Amount',
            'created_at' => 'Created At',
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
