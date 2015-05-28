<?= $this->assign('title',' - Adicionar Propaganda'); ?>

<?= $this->Html->script('Ads/form', ['inline' => true]) ?>

<?= $this->element('breadcrumb', [
    'title' => 'Criar propaganda',
    'crumbs' => [['Propagandas', ['action' => 'index']]]
]) ?>

<?= $this->Flash->render() ?>

<?= $this->Form->create($ad, ['type' => 'file', 'horizontal' => true, 'novalidate' => true]); ?>
    <?= $this->element('Ads/form') ?>
    <?= $this->Form->submit('Criar propaganda', ['bootstrap-type' => 'default']) ?>
<?= $this->Form->end() ?>