<?= $this->assign('title', ' - Editar Notificação') ?>

<?= $this->element('breadcrumb', ['breadcrumb' => $breadcrumb]) ?>

<?= $this->Flash->render() ?>

<?php
    echo $this->Form->create($customPushNotification, ['horizontal' => true, 'novalidate' => true]);
        echo $this->Form->input('title', ['label' => 'Título']);
        echo $this->Form->input('message', ['label' => 'Mensagem', 'type' => 'textarea']);
        echo $this->Form->submit('Salvar alterações', ['bootstrap-type' => 'success']);
    echo $this->Form->end();
?>