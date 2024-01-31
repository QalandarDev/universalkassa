<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m240131_075822_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'ticket_id'=>$this->string(255),
            'user'=>$this->string(255),
            'direction'=>$this->string(255),
            'price'=>$this->integer(),
            'sale'=>$this->integer(),
            'total'=>$this->integer(),
            'status'=>$this->string(255),
            'phone'=>$this->string(255),
            'comment'=>$this->string(255),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
