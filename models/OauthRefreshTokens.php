<?php

namespace filsh\yii2\oauth2server\models;

use Yii;

/**
 * This is the model class for table "oauth_refresh_tokens".
 *
 * @property string $refresh_token
 * @property string $client_id
 * @property string $user_id
 * @property string $expires
 * @property string $scope
 * @property string $file_id
 *
 * @property OauthClients $client
 */
class OauthRefreshTokens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%oauth_refresh_tokens}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['refresh_token', 'client_id', 'expires'], 'required'],
            [['expires'], 'safe'],
            [['refresh_token','user_id'], 'string', 'max' => 40],
            [['client_id'], 'string', 'max' => 32],
            [['scope','file_id'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'refresh_token' => 'Refresh Token',
            'client_id' => 'Client ID',
            'user_id' => 'User ID',
            'expires' => 'Expires',
            'scope' => 'Scope',
        	'file_id'=>'File ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(OauthClients::className(), ['client_id' => 'client_id']);
    }
}