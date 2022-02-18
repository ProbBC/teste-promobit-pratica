<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Produto'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Excluir Produto'), ['action' => 'delete', $product->id], ['confirm' => __('Tem certeza que deseja excluir o produto {0}?', $product->name), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Produtos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Adicionar Produto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
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
    <div class="column-responsive column-80">
        <div class="products view content">
            <h3><?= h($product->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tags') ?></th>
                    <td><?= $formatted_tags ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
