<?= $this->assign('title',' - Editar Evento'); ?>

<?= $this->Html->script('Events/form', ['inline' => false]) ?>

<?= $this->element('breadcrumb') ?>

<?= $this->Form->create($event, ['type' => 'file', 'horizontal' => true, 'novalidate' => true]); ?>
    <?= $this->element('Events/form') ?>
    <?= $this->Form->submit('Salvar alterações', ['bootstrap-type' => 'success']) ?>
<?= $this->Form->end() ?>