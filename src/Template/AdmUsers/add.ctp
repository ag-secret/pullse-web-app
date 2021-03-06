<?= $this->assign('title', ' - Adicionar Usuário') ?>

<?= $this->element('breadcrumb', [
    'title' => 'Criar usuário',
    'crumbs' => [
        ['Usuários', ['action' => 'index']]
    ]
]) ?>

<?= $this->Flash->render() ?>

<?php
    echo $this->Form->create($admUser, ['horizontal' => true, 'novalidate' => true]);
        echo $this->Form->input('username', ['label' => 'Email', 'type' => 'email']);
        echo $this->Form->input('name', ['label' => 'Nome']);
        echo $this->Form->input('password',[
            'label' => 'Senha',
            'placeholder' => 'Mínimo 4 caracteres',
            'help' => 'Caso não queria alterar a senha deixar em branco.'
        ]);
        echo $this->Form->input('confirm_password',[
            'label' => 'Confirmar senha',
            'type' => 'password'
        ]);
        echo $this->Form->input('is_active', ['label' => 'Ativo']);
        echo $this->Form->submit('Criar usuário', ['bootstrap-type' => 'default']);
    echo $this->Form->end();
?>