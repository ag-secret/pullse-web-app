<?= $this->assign('title', ' - Entrar') ?>

<div class="container-fluid">
	<div class="row" style="margin-top: 200px;">
		<div class="col-md-4 col-md-offset-4">
			<div class="well">
				<?= $this->Flash->render('auth') ?>
				<?php
					echo $this->Form->create();
						echo $this->Form->input('username', ['label' => 'Email']);
						echo $this->Form->input('password', ['label' => 'Senha']);

						echo $this->Flash->render();

						echo $this->Form->submit('Entrar', ['class' => 'btn-block', 'bootstrap-type' => 'primary']);
					echo $this->Form->end();
				?>
			</div>
		</div>
	</div>
</div>