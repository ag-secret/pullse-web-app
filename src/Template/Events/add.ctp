<?= $this->assign('title',' - Adicionar Evento'); ?>

<?= $this->Html->script('Events/form', ['inline' => false]) ?>

<?= $this->element('breadcrumb', [
	'title' => 'Criar evento',
	'crumbs' => [['Eventos', ['action' => 'index']]]
]) ?>

<?= $this->Flash->render() ?>

<?= $this->Form->create($event, ['type' => 'file', 'horizontal' => true, 'novalidate' => true]); ?>
    <?= $this->element('Events/form') ?>
    <?= $this->Form->submit('Criar evento', ['bootstrap-type' => 'default']) ?>
<?= $this->Form->end() ?>