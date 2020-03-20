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
class UserEditForm extends Model
{
    public $username;
    public $person_id;
    public $blocked;
    public $password;
    public $confirm_password;

    public function __construct($id)
    {
        $user = User::findOne($id);
        $this->username = $user->login;
        $this->person_id = $user->person_id;
        $this->blocked = $user->blocked;
    }

    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username', 'password', 'confirm_password'], 'string'],
            [['person_id', 'blocked'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'person_id' => 'Привязать к участнику конференции (необязательно)',
            'blocked' => 'Заблокировать',
            'password' => 'Пароль',
            'confirm_password' => 'Подтверждение пароля',
        ];
    }

    public function save($id)
    {
        $user = User::findOne($id);
        $errors = [];
        if ($user_found = User::find()->where(['login' => $this->username])->andWhere(['!=', 'id', $id])->one()) {
            $errors[] = 'Пользователь с логином <code> ' . $user_found->login . ' </code> существует.';
        }

        if ($this->password !== $this->confirm_password) {
            $errors[] = 'Введенные пароли не совпадают.';
        }

        if (count($errors) === 0) {
            $user->login = $this->username;
            if ($this->password != '') {
                $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            }
            $user->person_id = $this->person_id;
            $user->blocked = $this->blocked;
            if ($user->save()) {
                return true;
            }
        }
        return $errors;
    }
}
