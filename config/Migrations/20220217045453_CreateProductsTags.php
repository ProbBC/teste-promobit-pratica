<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProductsTags extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('products_tags', [
            'id' => false, 'primary_key' => ['product_id', 'tag_id']
        ]);
        $table->addColumn('product_id', 'integer', [
            'null' => false
        ]);
        $table->addColumn('tag_id', 'integer', [
            'null' => false
        ]);
        $table->addForeignKey('product_id', 'products', ['id'], [
            'constraint' => 'product_id'
        ]);
        $table->addForeignKey('tag_id', 'tags', ['id'], [
            'constraint' => 'tag_id'
        ]);
        $table->create();
    }
}
