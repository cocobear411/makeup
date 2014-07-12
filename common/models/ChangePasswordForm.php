<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * ChangePassword form
 */
class ChangePasswordForm extends Model
{

    public $currentPassword;
    public $newPassword;
    public $newPasswordRepeat;
    private $_user = false;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'currentPassword'   => '当前密码',
            'newPassword'       => '新密码',
            'newPasswordRepeat' => '确认密码',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currentPassword', 'newPassword', 'newPasswordRepeat'], 'required'],
            ['currentPassword', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors())
        {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->currentPassword))
            {
                $this->addError('currentPassword', '密码错误！');

                if ($this->newPassword != $this->newPasswordRepeat)
                {
                    $this->addError('newPassword');
                    $this->addError('newPasswordRepeat', '新密码输入不一致！');
                }
            }
            else
            {
                if ($this->newPassword != $this->newPasswordRepeat)
                {
                    $this->addError('newPassword');
                    $this->addError('newPasswordRepeat', '新密码输入不一致！');
                }
                else if ($this->currentPassword == $this->newPassword)
                {
                    $this->addError('newPassword');
                    $this->addError('newPasswordRepeat', '新密码不能和当前密码一样！');
                }
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false)
        {
            $this->_user = User::findByUsername(\Yii::$app->user->identity->username);
        }

        return $this->_user;
    }

    public function changePassword()
    {
        if ($this->validate())
        {
            $user = $this->getUser();
            $user->setPassword($this->newPassword);
            if ($user->save())
            {
                return true;
            }
        }

        return false;
    }

}
