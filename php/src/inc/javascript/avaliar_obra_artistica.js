
$(document).ready(function(){
    // if the user clicks on the like button ...
    $('.like-btn').on('click', function(){
        var id_obra_artistica = $(this).data('id');
        $clicked_btn = $(this);

        if ($clicked_btn.hasClass('fa-regular fa-thumbs-up')) {
            acao_de_avaliacao = 'like';
        } else if($clicked_btn.hasClass('fa-solid fa-thumbs-up')){
            acao_de_avaliacao = 'unlike';
        }


        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'acao_de_avaliacao': acao_de_avaliacao,
                'id_obra_artistica': id_obra_artistica
            },
            success: function(data){
                res = JSON.parse(data);

                if (acao_de_avaliacao == "like") {
                    $clicked_btn.removeClass('fa-regular fa-thumbs-up');
                    $clicked_btn.addClass('fa-solid fa-thumbs-up');
                } else if(acao_de_avaliacao == "unlike") {
                    $clicked_btn.removeClass('fa-regular fa-thumbs-up');
                    $clicked_btn.addClass('fa-solid fa-thumbs-up');
                }

                $clicked_btn.siblings('span.likes').text(res.likes);
                $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                $clicked_btn.siblings('i.fa-solid fa-thumbs-down').removeClass('fa-solid fa-thumbs-down').addClass('fa-regular fa-thumbs-down');
            }
        });		

    });

    // if the user clicks on the dislike button ...
    $('.dislike-btn').on('click', function(){
        var id_obra_artistica = $(this).data('id');
        $clicked_btn = $(this);

        if ($clicked_btn.hasClass('fa-regular fa-thumbs-down')) {
            acao_de_avaliacao = 'dislike';
        } else if($clicked_btn.hasClass('fa-solid fa-thumbs-down')){
            acao_de_avaliacao = 'undislike';
        }
        
        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'action': acao_de_avaliacao,
                'post_id': id_obra_artistica
            },
            success: function(data){
                res = JSON.parse(data);

                if (acao_de_avaliacao == "dislike") {
                    $clicked_btn.removeClass('fa-regular fa-thumbs-down');
                    $clicked_btn.addClass('fa-solid fa-thumbs-down');
                } else if(acao_de_avaliacao == "undislike") {
                    $clicked_btn.removeClass('fa-regular fa-thumbs-down');
                    $clicked_btn.addClass('fa-solid fa-thumbs-down');
                }

                $clicked_btn.siblings('span.likes').text(res.likes);
                $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                $clicked_btn.siblings('i.fa-solid fa-thumbs-up').removeClass('fa-solid fa-thumbs-up').addClass('fa-regular fa-thumbs-up');
            }
        });	

    });



});