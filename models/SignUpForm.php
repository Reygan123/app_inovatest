<?php

namespace app\models;

use yii\base\Model;
use app\models\User;
use Yii;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if ($user->save()) {
            $auth = Yii::$app->authManager;
            $role = $auth->getRole('user');
            $auth->assign($role, $user->id);
            return $user;
        }

        return null;
    }
}
