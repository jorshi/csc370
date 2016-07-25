function subscribeTo(_element) {

        var subsaiddit = $('#subsaiddit').val();
        var hidesubscribe = $('#hidesubscribe').val();

        $.ajax({
            url: 'db_utils/subscribe_button.php',
            data: {action: hidesubscribe, subsaiddit: subsaiddit},
            type: 'post',
            success: function() {
                if ($(_element).hasClass('subscribe')){
                    $(_element).removeClass("subscribe");
                    $(_element).addClass("unsubscribe");
                    $(_element).text("unsubscribe");
                }else{
                    $(_element).removeClass("unsubscribe");
                    $(_element).addClass("subscribe");
                    $(_element).text("subscribe");
                }
            },
            error: function(xhr, error) {
                alert('Holy errors batman!');
            }
        });
}

