<?= $this->assign('title',' - Editar Evento'); ?>

<?= $this->Html->script('Events/form', ['inline' => false]) ?>

<?= $this->element('breadcrumb', [
	'title' => 'Editar evento',
	'crumbs' => [['Eventos', ['action' => 'index']]]
]) ?>

<?= $this->Flash->render() ?>

<?= $this->Form->create($event, ['type' => 'file', 'horizontal' => true, 'novalidate' => true]); ?>
    <?= $this->element('Events/form') ?>
    <?= $this->Form->submit('Salvar alterações', ['bootstrap-type' => 'default']) ?>
<?= $this->Form->end() ?>