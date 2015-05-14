<?= $this->assign('title',' - Configurações de Propaganda'); ?>

<?= $this->element('breadcrumb') ?>

<?= $this->Form->create($adsSetting, ['horizontal' => true, 'novalidate' => true]); ?>
    <?= $this->Form->input('intervalo_ad', ['help' => 'Intervalo em que as propagandas irão aparecer, tempo em segundos.']) ?>
    <?= $this->Form->input('intervalo_chk') ?>
    <?= $this->Form->submit('Salvar informações', ['bootstrap-type' => 'success']) ?>
<?= $this->Form->end() ?>