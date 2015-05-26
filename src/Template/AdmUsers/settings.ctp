<?= $this->assign('title', ' - Configurações da conta') ?>

<?= $this->element('breadcrumb') ?>

<?= $this->Flash->render() ?>

<div class="row">
	<div class="col-md-12">
		<h4>Dados pessoais</h4>
		<?= $this->Form->create($admUser, ['horizontal' => true,'novalidate' => true]) ?>
			<?= $this->Form->input('name', ['label' => 'Nome']) ?>
			<?= $this->Form->input('username', ['label' => 'Email']) ?>
			<?= $this->Form->submit('Alterar dados', ['bootstrap-type' => 'danger']) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<h4>Alteração de senha</h4>
		<?= $this->Form->create($admUser, ['horizontal' => true,'novalidate' => true]) ?>
			<?= $this->Form->input('current_password', [
				'label' => 'Senha atual',
				'type' => 'password'
			]) ?>
			<?= $this->Form->input('password', [
				'label' => 'Nova Senha',
				'placeholder' => 'Deve conter no mínimo 4 caracteres'
			]) ?>
			<?= $this->Form->input('confirm_password', [
				'label' => 'Confirmar Nova Senha',
				'type' => 'password'
			]) ?>
			<?= $this->Form->submit('Alterar Senha', ['bootstrap-type' => 'danger']) ?>
		<?= $this->Form->end() ?>
	</div>
</div>