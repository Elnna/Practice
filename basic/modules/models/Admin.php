<?php

namespace app\modules\models;

use \yii\db\ActiveRecord;
use Yii;
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
       /* return [
            [['login_time', 'create_time', 'modified_time'], 'safe'],
            [['login_ip'], 'integer'],
            [['admin_user', 'admin_password'], 'string', 'max' => 32],
            [['admin_email'], 'string', 'max' => 50],
            [['admin_user', 'admin_password'], 'unique', 'targetAttribute' => ['admin_user', 'admin_password'], 'message' => 'The combination of Admin User and Admin Password has already been taken.'],
            [['admin_user', 'admin_email'], 'unique', 'targetAttribute' => ['admin_user', 'admin_email'], 'message' => 'The combination of Admin User and Admin Email has already been taken.'],
        ];*/
        //字段，验证规则，提示信息，场模式
        return [
            ['admin_user','required','message' => '管理员账户不能为空', 'on' => ['login', 'seekpwd']],
            ['admin_password', 'required', 'message' => '管理员密码不能为空','on' => 'login'],
            ['rememberMe','boolean', 'on' => 'login'],
            ['admin_password', 'validatePass', 'on' => 'login'],
            ['admin_email','required','message' => '电子邮箱不能为空', 'on' => 'seekpwd'],
            ['admin_email', 'email','message' => '电子邮箱格式不正确', 'on' => 'seekpwd'],
            ['admin_email', 'validateEmail', 'on' => 'seekpwd']

        ];
    }
    public function validatePass(){
        
        if(!$this->hasErrors()){
            $data = self::find()->where('admin_user = :user and admin_password = :pass', [":user" => $this->admin_user,":pass" => md5($this->admin_password)])->one();
            if(is_null($data)){
                $this->addError('admin_password','用户名或密码错误');
            }
        }
    }

    public function validateEmail(){
        
        if(!$this->hasErrors()){
            $data = self::find()->where('admin_user = :user and admin_email = :email', [':user'=> $this->admin_user, ':email' => $this->admin_email])->one();
            if(is_null($data)){
                $this->addError('admin_email', '管理员用户不匹配');
            }
        }
    }
    
    /**
     * 登录验证
     * @param  [array] $data [ form表单传过来的数据]
     * @return [type]       [description]
     */
    public function login($data){
        $this->scenario = 'login';//场景
        if($this->load($data) && $this->validate()){
            //将用户信息写入session
            $lifetime = $this->rememberMe ? 24*3600 : 0;    //保存一天
            $session = Yii::$app->session;
            $session['admin'] =[
                'admin_user' => $this->admin_user,
                'isLogin' => 1
            ];
            $this->updateAll(['login_time' => time(),'modified_time' => time(),'login_ip' => ip2long(Yii::$app->request->userIp)],'admin_user = :user', [':user' => $this->admin_user]);
            return (bool)$session['admin']['isLogin'];
        }
        return false;
    }

    public function seekPwd($data){
        $this->scenario = 'seekpwd';//场景
        if($this->load($data)&& $this->validate()){

        }
        return false;
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
