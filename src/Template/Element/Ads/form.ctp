<?php if ($ad->id): ?>
	<div class="form-group">
		<label class="col-md-2 control-label">Tipo</label>
		<div class="col-md-6">
			<?php
				switch ($ad->tipo) {
					case 0:
						$tipo = 'Imagem';
						break;
					case 1:
						$tipo = 'Vídeo';
						break;
					default:
						$tipo = 'Desconhecido';
						break;
				}
			?>
			<p class="form-control-static"><?= $tipo ?></p>
		</div>
	</div>
<?php endif ?>
<div style="<?= ($ad->id) ? 'display: none;' : '' ?>">
	<?php
		echo $this->Form->input('tipo', [
			'label' => 'Tipo',
			'type' => 'select',
			'options' => ['Imagem', 'Vídeo'],
			'default' => 'Imagem'
		]);
	?>
</div>

<?php echo $this->Form->input('nome') ?>

<div id="container-imagem-input" style="<?= ($ad->tipo == 1) ? 'display: none;' : '' ?>">
	<?php echo $this->Form->input('imagem_file', [
		'label' => 'Imagem',
		'type' => 'file',
		'help' => 'A imagem deve conter no máximo 3MB e estar no formato JPG ou PNG.'
	]) ?>

	<!-- Decidir ainda se vai exibir a imagem no form -->
	<?php if (1 == 3): ?>
		<div class="row">
			<div class="col-md-6 col-md-offset-2">
				<?= $this->Html->image($ad->imagem_fullpath, ['height' => '100']) ?>	
			</div>
		</div>
	<?php endif ?>
</div>

<div id="container-video" style="<?= ($ad->tipo == 0) ? 'display: none;' : '' ?>">
	<div>
		<?php echo $this->Form->input('video_url', ['label' => 'ID do Youtube']) ?>
	</div>

	<div class="form-group" style="display: none;" id="container-video-player">
		<div class="col-md-6 col-md-offset-2">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe id="video-placeholder" class="embed-responsive-item" src=""></iframe>
			</div>
		</div>
	</div>
</div>

<div class="form-group">
	<?= $this->Form->label('dt_inicio', 'Data de início', ['class' => 'col-md-2']) ?>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-2">
				<?php echo $this->Form->day('dt_inicio', ['label' => false, 'class' => 'form-control']); ?>
			</div>
			<div class="col-md-6">
				<?php echo $this->Form->month('dt_inicio', ['label' => false, 'class' => 'form-control']); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->year('dt_inicio', ['label' => false, 'class' => 'form-control']); ?>
			</div>
		</div>
	</div>
</div>

<div class="form-group">	
	<?= $this->Form->label('dt_fim', 'Data de Encerramento', ['class' => 'col-md-2']) ?>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-2">
				<?php echo $this->Form->day('dt_fim', ['label' => false, 'class' => 'form-control']); ?>
			</div>
			<div class="col-md-6">
				<?php echo $this->Form->month('dt_fim', ['label' => false, 'class' => 'form-control']); ?>
			</div>
			<div class="col-md-4">
				<?php echo $this->Form->year('dt_fim', ['label' => false, 'class' => 'form-control']); ?>
			</div>
		</div>
	</div>	
</div>

<div id="container-tempo" style="<?= ($ad->tipo == 1) ? 'display: none;' : '' ?>">
	<?= $this->Form->input('tempo', ['help' => 'Colocar valor em segundos', 'default' => 0]); ?>
</div>
<?php
	echo $this->Form->input('ordem', ['default' => 0]);
	echo $this->Form->input('ativo', ['type' => 'checkbox']);
?>