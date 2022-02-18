<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="products index content">
    <?= $this->Html->link(__('Adicionar Produto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Produtos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name', 'Nome') ?></th>
                    <th><?= $this->Paginator->sort('tags', 'Tags') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <?php
                        // Formata as tags do produto em uma string, separadas por vírgula
                        $formatted_tags = '';
                        for ($i=0; $i<count($product->tags); $i++) {
                            if ($i === 0) {
                                $formatted_tags = $this->Html->link(__($product->tags[$i]->name), ['controller' => 'Tags', 'action' => 'view', $product->tags[$i]->id]);
                            } else {
                                $formatted_tags .= ', ' . $this->Html->link(__($product->tags[$i]->name), ['controller' => 'Tags', 'action' => 'view', $product->tags[$i]->id]);
                            }
                        }
                        
                    ?>
                <tr>
                    <td><?= h($product->name) ?></td>
                    <td><?= $formatted_tags ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $product->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $product->id], ['confirm' => __('Tem certeza que deseja excluir o produto {0}?', $product->name)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próxima') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de um total de {{count}}')) ?></p>
    </div>
</div>
