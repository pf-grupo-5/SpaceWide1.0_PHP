$(document).ready(function(){
    
$('.follow-btn').on('click', function() {
    
    var id_usuario_seguido = $(this).data('id');
    $clicked_btn = $(this);
    
    if ($clicked_btn.hasClass('fa-regular') && $clicked_btn.hasClass('fa-heart')) {
  	    action = 'follow';
    } else if ($clicked_btn.hasClass('fa-solid') && $clicked_btn.hasClass('fa-heart')) {
  	    action = 'unfollow';
    }
  
    $.ajax({
  	    url: '/src/seguir_artista.php',
  	    type: 'post',
  	    data: {
  		    'action': action,
  		    'id_usuario_seguido': id_usuario_seguido
  	    },
  	    
  	    success: function(data){
  	        
      		if (action === "follow") {
      		
      			$clicked_btn.removeClass('fa-regular');
      			$clicked_btn.removeClass('fa-heart');
      			$clicked_btn.addClass('fa-solid');
      			$clicked_btn.addClass('fa-heart');
      		
      		    
      		} else if (action === "unfollow") {
      			
      			$clicked_btn.removeClass('fa-solid');
      			$clicked_btn.removeClass('fa-heart');
      			$clicked_btn.addClass('fa-regular');
      			$clicked_btn.addClass('fa-heart');
      		    
      		}

  		$clicked_btn.siblings('i.fa-solid.fa-heart').removeClass('fa-solid').addClass('fa-regular');
  	    $clicked_btn.siblings('i.fa-solid.fa-heart').removeClass('fa-heart').addClass('fa-heart');
  	    },
  });		

});

});

