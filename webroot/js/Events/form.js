$(function(){
	
	var fadeSpeed = 200;

	window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '284744118315905',
	      xfbml      : true,
	      version    : 'v2.3'
	    });
    };

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));


	var facebookData = [];
	var currentFacebookData = null;

	$('button#facebook').click(function(){

		var $this = $(this);

		$('#container-loader').fadeIn('fast');
		$this.attr('disabled', true);

		setTimeout(function(){
			FB.getLoginStatus(function(response) {
				if (response.status === 'connected') {
					FB.api(
						'/PullseClub/events',
						{
							fields: 'name, description, start_time, end_time, cover',
							limit: 30,
							since: 'now'
						},
						function(response){
							console.log(response);
							facebookData = response.data;
							$('#eventos-facebook').empty();
							$('#eventos-facebook').append('<option value=""></option>');

							$.each(response.data, function(index, item){
								$('#eventos-facebook').append('<option value="'+index+'">'+item.name+'</option>');
							});

							$('#container-loader').fadeOut('fast', function(){
								$('#container-combo-eventos').fadeIn('fast');
								$this.attr('disabled', false);
							});
					});
				} else {
					FB.login();
				}
			});
		}, 1000);

	});

	function fillFieldsByFacebook(index){
		var dataInicio = new Date(facebookData[index].start_time);

		$('#name').val(currentFacebookData.name);
		$('#descricao').val(currentFacebookData.description);

		$("[name='data_inicio[day]'").val(leedZero(dataInicio.getUTCDate()));
		$("[name='data_inicio[month]'").val(leedZero(dataInicio.getUTCMonth() + 1));
		$("[name='data_inicio[year]'").val(leedZero(dataInicio.getUTCFullYear()));

		$("[name='data_inicio[hour]'").val(leedZero(dataInicio.getHours()));
		$("[name='data_inicio[minute]'").val(leedZero(dataInicio.getMinutes()));
		
		$("[name='data_inicio[hour]'").val(leedZero(dataInicio.getHours()));
		$("[name='data_inicio[minute]'").val(leedZero(dataInicio.getMinutes()));

		var dataFim = new Date(currentFacebookData.end_time);

		$("[name='data_fim[day]'").val(leedZero(dataFim.getUTCDate()));
		$("[name='data_fim[month]'").val(leedZero(dataFim.getUTCMonth() + 1));
		$("[name='data_fim[year]'").val(leedZero(dataFim.getUTCFullYear()));

		$("[name='data_fim[hour]'").val(leedZero(dataFim.getHours()));
		$("[name='data_fim[minute]'").val(leedZero(dataFim.getMinutes()));
		
		$("[name='data_fim[hour]'").val(leedZero(dataFim.getHours()));
		$("[name='data_fim[minute]'").val(leedZero(dataFim.getMinutes()));

	}

	function leedZero(number){
		if (number < 10) {
			return '0' + number;
		}
		return number;
	}

	$('#eventos-facebook').change(function(){
		var $this = $(this);

		currentFacebookData = facebookData[$this.val()];

		if ($this.val() !== '') {
			$('#facebook-img').val('');
			$('#cont-facebook-image').fadeIn();
			$('button#use-facebook-image').fadeIn(fadeSpeed);
			$('img#facebook-image').remove();
			fillFieldsByFacebook($this.val());
		} else {
			if ($('#facebook-img').val() === '') {
				$('#cont-facebook-image').fadeOut(fadeSpeed);
			}
		}
	});

	$("[name='imagem_capa_placeholder']").change(function(){
		$('#cont-image').html('');
		$('#facebook-img').val('');

		if (currentFacebookData) {
			$('button#use-facebook-image').fadeIn();	
		} else {
			$('#cont-facebook-image').fadeOut(fadeSpeed);
		}
	});

	$('button#use-facebook-image').click(function(){
		var $this = $(this);

		var $image = $('<img/>');
		$image
			.attr({src: currentFacebookData.cover.source, id: 'facebook-image'})
			.addClass('img-responsive');

		$('#cont-image').html($image);
		$("[name='imagem_capa_placeholder']").val('');

		$this.hide();

		$('#facebook-img').val(currentFacebookData.cover.source);
	});

	$('#lista-vip-qtd-fem, #lista-vip-qtd-masc').keyup(function(){
		viplistDateToggle();
	});

	function viplistDateToggle(){
		if ($('#lista-vip-qtd-fem').val() > 0 || $('#lista-vip-qtd-masc').val() > 0) {
			$('#cont-vip-list-date').fadeIn('fast');
		} else {
			$('#cont-vip-list-date').fadeOut('fast');
		}
	}
});