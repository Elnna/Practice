<?php

namespace app\modules\models;

use \yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property integer $admin_id
 * @property string $admin_user
 * @property string $admin_password
 * @property string $admin_email
 * @property string $login_time
 * @property integer $login_ip
 * @property string $create_time
 * @property string $modified_time
 */
class Admin extends ActiveRecord
{
    public $rememberMe = true;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login_time', 'create_time', 'modified_time'], 'safe'],
            [['login_ip'], 'integer'],
            [['admin_user', 'admin_password'], 'string', 'max' => 32],
            [['admin_email'], 'string', 'max' => 50],
            [['admin_user', 'admin_password'], 'unique', 'targetAttribute' => ['admin_user', 'admin_password'], 'message' => 'The combination of Admin User and Admin Password has already been taken.'],
            [['admin_user', 'admin_email'], 'unique', 'targetAttribute' => ['admin_user', 'admin_email'], 'message' => 'The combination of Admin User and Admin Email has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'admin_user' => 'Admin User',
            'admin_password' => 'Admin Password',
            'admin_email' => 'Admin Email',
            'login_time' => 'Login Time',
            'login_ip' => 'Login Ip',
            'create_time' => 'Create Time',
            'modified_time' => 'Modified Time',
        ];
    }
}
