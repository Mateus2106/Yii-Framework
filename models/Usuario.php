<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property string $id
 * @property string $nome
 * @property string $email
 * @property string $login
 * @property string $senha
 * @property string $dataNascimento
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'login', 'senha', 'dataNascimento'], 'required'],
            [['dataNascimento'], 'safe'],
            [['nome', 'login'], 'string', 'max' => 45],
            [['email', 'senha'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'login' => 'Login',
            'senha' => 'Senha',
            'dataNascimento' => 'Data Nascimento',
        ];
    }
}
