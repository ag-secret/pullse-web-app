<?php 
	echo $this->assign('title', ' - Configurações de localização');

	echo $this->Html->script([
		'http://maps.google.com/maps/api/js?libraries=places&sensor=false&amp;language=pt-br',
		'../components/jquery-ui/themes/smoothness/jquery-ui.min',
		'../components/gmap3/dist/gmap3.min',
		'../components/jquery-ui/jquery-ui.min',
		'../components/geocomplete/jquery.geocomplete.min',
		'Clubs/config'],
		['inline' => false]
	);
?>

<?= $this->element('breadcrumb', ['title' => 'Configurações de localidade']) ?>

<?= $this->Flash->render() ?>

<div class="row">
	<div class="col-md-8">
		<div style="width: 100%; height: 500px; background-color: #EEE;" id="map"></div>
	</div>
	<div class="col-md-4">
		<input type="text" id="address" class="form-control" placeholder="Pesquisar local...">	
		<br>
		<div class="row">
<!-- 			<div class="col-md-2">
				<span id="radius_min"></span>
			</div> -->
			<div class="col-md-12">
				<div id="slider"></div>
				<p class="help-block">Utilize a barra acima para configurar o raio de abrangência do seu estabelecimento.</p>
			</div>

<!-- 			<div class="col-md-2">
				<span id="radius_max"></span>
			</div> -->
		</div>

		<?php

			echo $this->Form->create($club, ['id' => 'form-map']);
				echo $this->Form->input('lat', ['type' => 'hidden']);
				echo $this->Form->input('lng', ['type' => 'hidden']);
				echo $this->Form->input('raio', ['default' => 10, 'type' => 'hidden']);
				echo $this->Form->input('map_zoom', ['type' => 'hidden']);
				echo $this->Form->submit('Salvar configurações', ['bootstrap-type' => 'success','class' => 'btn-block']);
			echo $this->Form->end();

		?>
	</div>
</div>