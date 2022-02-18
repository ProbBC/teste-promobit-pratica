<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $tags
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Listar Produtos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <legend><?= __('Adicionar Produto') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nome']);
                    echo $this->Form->control('tags._ids', ['label' => 'Selecionar Tags', 'style' => 'height: auto', 'options' => $tags]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar')) ?>
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
