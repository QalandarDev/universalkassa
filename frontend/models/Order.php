<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string|null $ticket_id
 * @property string|null $user
 * @property string|null $direction
 * @property int|null $price
 * @property int|null $sale
 * @property int|null $total
 * @property string|null $status
 * @property string|null $phone
 * @property string|null $comment
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    public function formName()
    {
        return ''; // TODO: Change the autogenerated stub
    }

    //add timestamp behavior
    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::class,
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id', 'user', 'direction',  'sale', 'total', 'status', 'phone', 'comment'], 'required'],
            [['price', 'sale', 'total', 'created_at', 'updated_at'], 'default', 'value' => null],

            [['ticket_id', 'user', 'direction', 'status', 'phone', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_id' => 'Bilet N:',
            'user' => 'FIO',
            'direction' => 'Uchish yo\'nalishi',
            'price' => 'Narxi',
            'sale' => 'Chegirma',
            'total' => 'Jami',
            'status' => 'To\'lov turi',
            'phone' => 'Telefon raqam',
            'comment' => 'Qo\'shimcha ma\'lumot',
            'created_at' => 'Sana',
            'updated_at' => 'Updated At',
        ];
    }
}