$(function(){
    $('button#send-notification').click(function(){
        if (confirm('Você realmente deseja enviar esta notificação para todos os usuários logados no seu app?')) {
            $this = $(this);
            $loader = $this.next('#loader');
            var url = $this.data('url');
            /**
             * Desabilita todos os botões para garantir que o usuario
             * só irá enviar um por vez e não possa enviar outro
             * enquanto o atual está sendo enviado
             */
            $('button#send-notification').attr('disabled', true);
            $loader.fadeIn(function(){
                $.getJSON(url, function(result){
                    alert('Notificações enviadas!');
                    location.reload();
                });
            });
        }
    });
});