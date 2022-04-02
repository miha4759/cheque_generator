<?php

namespace app\services;


use app\models\Bank;
use app\models\Cheque;
use app\models\User;

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

    public function assignBank()
    {
        $model = new Bank();
        $model->attributes = $this->bank;
        $model->validate();
        return $model;
    }

    public function assignUser()
    {
        $model = new User();
        $model->attributes = $this->user;
        $model->validate();
        return $model;
    }

    public function assignCheque()
    {
        $model = new Cheque();
        $model->attributes = $this->cheque;
        $model->created_at = date('Y-m-d H:i:s');
        $model->validate();
        return $model;
    }

    public function create()
    {
        $return = new \stdClass();
        $return->errors = [];
        $return->objects = new \stdClass();
        $return->objects->bank = null;
        $return->objects->user = null;
        $return->objects->cheque = null;

        $bankModel = $this->assignBank();
        $userModel = $this->assignUser();
        $chequeModel = $this->assignCheque();

        if (empty($bankModel->errors) && empty($userModel->errors) && empty($chequeModel->errors)) {
            $bankModel->save();
            $userModel->bank_id = $bankModel->id;
            $userModel->save();
            $chequeModel->bank_id = $bankModel->id;
            $chequeModel->user_id = $userModel->id;
            $chequeModel->save();

            $return->objects->bank = $bankModel;
            $return->objects->user = $userModel;
            $return->objects->cheque = $chequeModel;

            return $return;
        }

        $return->errors = array_merge(
            ['bank' => $bankModel->errors],
            ['user' => $userModel->errors],
            ['cheque' => $chequeModel->errors]
        );

        return $return;
    }

    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789ABC';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}