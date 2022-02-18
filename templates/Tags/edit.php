<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $tag->id],
                ['confirm' => __('Tem certeza que deseja excluir a tag {0}?', $tag->name), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tags form content">
            <?= $this->Form->create($tag) ?>
            <fieldset>
                <legend><?= __('Editar Tag') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nome']);
                    echo $this->Form->control('products._ids', ['label' => 'Vincular Produtos', 'style' => 'height: auto', 'options' => $products]);
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
