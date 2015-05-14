$(function(){
	$('#tipo').change(function(){
		var value = $(this).val();
		hideShowInputs(value);
		if (value == 0) {
			$('#container-tempo').fadeIn();
		} else {
			$('#container-tempo').fadeOut();
		}
	});

	$('#video-url').keyup(function(){
		var value = $(this).val();
		if (value !== ''){
			showPlayerVideo(value);
		} else {
			hidePlayerVideo();
		}
	});

	// function hideShowVideo(value)
	// {
	// }

	function hidePlayerVideo()
	{
		$('#video-url').val('');
		$('#video-placeholder').attr('src', '');	
		$('#container-video-player').fadeOut();
	}

	function showPlayerVideo(value)
	{
		$('#video-placeholder').attr('src', 'https://www.youtube.com/embed/' + value);	
		$('#container-video-player').fadeIn();
	}

	function hideShowInputs (value) {
		if (value == 1) {
			$('#imagem-file').val('');
			$('#imagem-file').parents('#container-imagem-input').fadeOut(function(){
				$('#container-video').fadeIn();
			});
		} else {
			// Passa vazio para esconder o player do video
			hidePlayerVideo();
			$('#container-video').fadeOut(function(){
				$('#imagem-file').parents('#container-imagem-input').fadeIn();
			});
		}
	}
});