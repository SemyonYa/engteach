<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class UserRegisterForm extends Model
{
    public $id;
    public $username;
    public $person_id;
    public $password;
    public $confirm_password;

    public function rules()
    {
        return [
            [['username', 'password', 'confirm_password'], 'required'],
            [['username', 'password', 'confirm_password'], 'string'],
            [['person_id', 'id'], 'integer'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'person_id' => 'Привязать к участнику конференции (необязательно)',
            'password' => 'Пароль',
            'confirm_password' => 'Подтверждение пароля',
        ];
    }

    public function save()
    {
        $errors = [];
        if ($user_found = User::findOne(['login' => $this->username])) {
            $errors[] = 'Пользователь с логином <code>' . $user_found->login . '</code> существует.';
        }
        if ($this->password !== $this->confirm_password) {
            $errors[] = 'Введенные пароли не совпадают.';
        }

        if (count($errors) === 0) {
            $user = new User();
            $user->login = $this->username;
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $user->role_id = 2;
            $user->person_id = $this->person_id;
            $user->blocked = 0;
            if ($user->save()) {
                $this->id = $user->id;
                return true;
            } else {
                $errors[] = 'Не удалось сохранить';
            }
        }
        
        return $errors;
    }


    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    // public function login()
    // {
    //     if ($this->validate()) {
    //         return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
    //     }
    //     return false;
    // }

    // /**
    //  * Finds user by [[username]]
    //  *
    //  * @return User|null
    //  */
    // public function getUser()
    // {
    //     if ($this->_user === false) {
    //         $this->_user = User::findByUsername($this->username);
    //     }

    //     return $this->_user;
    // }
}
