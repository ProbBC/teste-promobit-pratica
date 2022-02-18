<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form content">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Entre com seu usuário e senha para fazer o login') ?></legend>
        <legend><?= $this->Html->link(__('Registrar usuário'), ['controller' => 'Users', 'action' => 'add']) ?></legend>
        <?= $this->Form->control('username', ['label' => 'Usuário', 'required' => true]) ?>
        <?= $this->Form->control('password', ['label' => 'Senha', 'required' => true]) ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>
