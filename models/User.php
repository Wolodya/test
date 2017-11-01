<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static function getUser()
    {
        $data =file_get_contents(__DIR__ . "/../data/users.txt");
        $without_space=str_replace(" ","",$data);
        $lines=explode(PHP_EOL,$without_space);
        $result = [];

        foreach($lines as $line){
            $intermediate = [];
            $line = explode(',', $line);
            foreach ($line as $l) {
                $line2 = explode('=>', $l);
                $intermediate[array_shift($line2)] = array_shift($line2);
            }
            $result[$intermediate["id"]] = $intermediate;
        }
        return $result;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::getUser()[$id]) ? new static(self::getUser()[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::getUser() as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::getUser() as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
