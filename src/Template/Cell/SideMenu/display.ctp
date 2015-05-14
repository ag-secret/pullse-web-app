<div style="position: relative; color: white; padding: 20px 0 45px 15px;">
	<div style="float: left; width: 35%; padding-right: 10px;">
		<?= $this->Html->image('clubs/' . $loggedinUser['club']['id'] . '/logo.jpg', ['class' => 'img-circle img-responsive']) ?>
	</div>
	<div style="float: left; width: 65%;">
		<h4 style="margin: 16px 0 0 0;">
			<?= $loggedinUser['club']['name'] ?>
		</h4>
		<div class="dropdown" style="z-index: 9999">
			<button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" style="padding: 0; color: white">
				Daniel de Faria
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li>
					<?= $this->Html->link('Configurações de localidade', ['controller' => 'Clubs', 'action' => 'locationSettings']) ?>
				</li>
				<li>
					<?= $this->Html->link('Configurações de conta', ['controller' => 'AdmUsers', 'action' => 'settings']) ?>
				</li>
				<li role="presentation" class="divider"></li>
				<li>
					<?= $this->Html->link('Sair', ['controller' => 'AdmUsers', 'action' => 'logout']) ?>
				</li>
			</ul>
		</div>
	</div>
	<br style="clear: both;">
</div>

<ul class="nav nav-pills nav-stacked side-menu">
	<?php foreach ($items as $item): ?>
		<li class="<?= strtolower($this->request->controller) == $item['url']['controller'] ? 'active' : '' ?>">
			<?= $this->Html->link(
				'<span class="glyphicon glyphicon-'.$item['icon'].'"></span> ' . $item['label'],
				$item['url'],
				['escape' => false])
			?>
		</li>
	<?php endforeach ?>
</ul>