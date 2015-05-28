<?= $this->assign('title',' - Configurações de Propaganda'); ?>

<?= $this->element('breadcrumb', [
    'title' => 'Configurações de propaganda',
    'crumbs' => [['Propagandas', ['controller' => 'Ads' ,'action' => 'index']]]
]) ?>

<?= $this->Form->create($adsSetting, ['horizontal' => true, 'novalidate' => true]); ?>
    <?= $this->Form->input('intervalo_ad', ['help' => 'Intervalo em que as propagandas irão aparecer, tempo em segundos.']) ?>
    <?= $this->Form->input('intervalo_chk') ?>
    <?= $this->Form->submit('Salvar alterações', ['bootstrap-type' => 'default']) ?>
<?= $this->Form->end() ?>