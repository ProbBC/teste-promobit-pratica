<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="tags index content">
    <?= $this->Html->link(__('Adicionar Tag'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tags') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name', 'Nome') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tags as $tag): ?>
                <tr>
                    <td><?= h($tag->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $tag->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tag->id]) ?>
                        <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $tag->id], ['confirm' => __('Tem certeza que deseja excluir a tag {0}?', $tag->name)]) ?>
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
