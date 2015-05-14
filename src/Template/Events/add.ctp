<?= $this->assign('title',' - Adicionar Evento'); ?>

<?= $this->Html->script('Events/form', ['inline' => false]) ?>

<?= $this->element('breadcrumb') ?>

<?= $this->Form->create($event, ['type' => 'file', 'horizontal' => true, 'novalidate' => true]); ?>
    <?= $this->element('Events/form') ?>
    <?= $this->Form->submit('Salvar informações', ['bootstrap-type' => 'success']) ?>
<?= $this->Form->end() ?>