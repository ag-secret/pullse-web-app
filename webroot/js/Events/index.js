$(function(){
    $('#send-notification').click(function(){
        var $this = $(this);
        var url = $this.data('ajax-url');
        var loader = $('#loader-notification');

        if (confirm('Você realmente deseja enviar notificações para todos os seus clientes cadastrados e ativos?')) {

            $this.attr('disabled', true);
            var currentText = $this.text();
            $this.text('Enviando...');

            loader.fadeIn(function(){
                $.getJSON(url, function(result){
                    loader.fadeOut(function(){
                        $this.attr('disabled', false);
                        $this.text(currentText);
                        alert('Notificações enviadas com sucesso!');
                        location.reload();
                    });
                });
            });
        }
    });
});