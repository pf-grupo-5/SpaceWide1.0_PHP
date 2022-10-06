$(document).ready(function(){
    
$('.follow-btn').on('click', function() {
    
    var id_usuario_seguidor = $(this).data('id_usuario_seguidor')
    var id_usuario_seguido = $(this).data('id_usuario_seguido');
    $clicked_btn = $(this);
    
    if ($clicked_btn.hasClass('follow_user')) {
  	    action = 'follow';
    } else if ($clicked_btn.hasClass('following_user')) {
  	    action = 'unfollow';
    }
  
    $.ajax({
  	    url: '/src/seguir_artista.php',
  	    type: 'post',
  	    data: {
  		    'action': action,
  		    'id_usuario_seguido': id_usuario_seguido,
  		    'id_usuario_seguidor': id_usuario_seguidor
  	    },
  	    
  	    success: function(data){
  		
  		if (action === "follow") {
  		
  			$clicked_btn.removeClass('follow_user');
  			$clicked_btn.addClass('following_user');
  		
  		    
  		} else if (action === "unfollow") {
  			
  			$clicked_btn.removeClass('following_user');
  			$clicked_btn.addClass('follow_user');
  		
  		    
  		}

  	    },
  });		

});

});