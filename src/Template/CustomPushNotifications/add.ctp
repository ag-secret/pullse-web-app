<?= $this->assign('title', ' - Criar Notificação') ?>

<?= $this->element('breadcrumb', [
	'title' => 'Criar Notificação',
	'crumbs' => [
		['Notificações Push', ['action' => 'index']]
	]
]) ?>

<?= $this->Flash->render() ?>

<?php
    echo $this->Form->create($customPushNotification, ['horizontal' => true, 'novalidate' => true]);
        echo $this->Form->input('title', ['label' => 'Título']);
        echo $this->Form->input('message', ['label' => 'Mensagem', 'type' => 'textarea']);
        echo $this->Form->submit('Criar notificação', ['bootstrap-type' => 'default']);
    echo $this->Form->end();
?>