<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column-responsive column-120">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Adicionar Usuário') ?></legend>
                <?php
                    echo $this->Form->control('username', ['label' => 'Usuário']);
                    echo $this->Form->control('password', ['label' => 'Senha']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
