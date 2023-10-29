<?php

namespace app\models;

use PHPUnit\Framework\MockObject\Builder\Identity;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password
 * @property int|null $isAdmin
 * @property string|null $photo
 *
 * @property-read mixed $authKey
 * @property Comment[] $comments
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isAdmin'], 'integer'],
            [['name', 'email', 'password', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
            'photo' => 'Photo',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByEmail($email)
    {
        return User::find()->where(['email' => $email])->one();
    }

    public function create()
    {
        return $this->save(false);
    }

   public function validatePassword($password)
    {
        return $this->password == $password;
    }

    /**
     * Logs in a user using the provided email and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this, $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * @param $uid
     * @param $name
     * @param $photo
     * @return bool
     */
    public function saveFromVk($uid, $name, $photo): bool
    {
        $user = User::findOne($uid);

        if ($user) {
            return Yii::$app->user->login($user);
        }

        $this->id = $uid;
        $this->name = $name;
        $this->photo = $photo;
        $this->create();

        return Yii::$app->user->login($this);
    }
}
