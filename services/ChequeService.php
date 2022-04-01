<?php

namespace app\services;


use app\models\Bank;
use app\models\Cheque;
use app\models\User;
use Yii;

class ChequeService
{
    protected $bank;
    protected $user;
    protected $cheque;

    public function __construct($bank, $user, $cheque)
    {
        $this->bank = $bank;
        $this->user = $user;
        $this->cheque = $cheque;
    }

    public function createBank()
    {
        $model = new Bank();
        $model->attributes  = $this->bank;
        $model->save();

        return $model;
    }

    public function createUser($bankId)
    {
        $model = new User();
        $model->attributes  = array_merge_recursive($this->user, ['bank_id' => $bankId]);
        $model->save();

        return $model;
    }

    public function createCheque($userId, $bankId)
    {
        $model = new Cheque();
        $model->attributes  = array_merge_recursive(
            $this->cheque,
            [
                'user_id' => $userId,
                'bank_id' => $bankId,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        $model->save();

        return $model;
    }

    public function create()
    {
        $bankModel = $this->createBank();
        $userModel = $this->createUser($bankModel->id);
        $chequeModel = $this->createCheque($userModel->id, $bankModel->id);


    }
}