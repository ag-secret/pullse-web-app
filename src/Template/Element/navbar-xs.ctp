<nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
	<div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				<?= $loggedinUser['club']['name'] ?>
			</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php foreach ($sidemenuItems as $item): ?>
					<li>
						<?= $this->Html->link($this->Html->icon($item['icon']) . ' ' . $item['label'], $item['url'], ['escape' => false]) ?>
					</li>
				<?php endforeach ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<?= $loggedinUser['name'] ?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<?= $this->Html->link('Configurações de Localidade', ['controller' => 'Clubs', 'action' => 'locationSettings']) ?>
						</li>
						<li>
							<?= $this->Html->link('Configurações da Conta', ['controller' => 'AdmUsers', 'action' => 'settings']) ?>
						</li>
						<li class="divider"></li>
						<li>
							<?= $this->Html->link('Sair', ['controller' => 'adm_users', 'action' => 'logout']) ?>
						</li>
					</ul>		
				</li>
			</ul>
		</div>
	</div>
</nav>