<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var string[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Tem certeza que deseja excluir o produto {0}?', $product->name), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Produtos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <legend><?= __('Editar Produto') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nome']);
                    echo $this->Form->control('tags._ids', ['label' => 'Selecionar Tags', 'style' => 'height: auto', 'options' => $tags]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Confirmar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script src="<?= $this->Url->script('jquery-3.6.0.min.js'); ?>"></script>
<script>
    $('option').mousedown(function(e) {
        e.preventDefault();
        $(this).prop('selected', !$(this).prop('selected'));
        return false;
    });
</script>
