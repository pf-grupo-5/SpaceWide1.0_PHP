$(document).ready(function(){
    
$('.like-btn').on('click', function() {
    
    var id_obra_artistica = $(this).data('id');
    $clicked_btn = $(this);
    
    if ($clicked_btn.hasClass('fa-regular') && $clicked_btn.hasClass('fa-thumbs-up')) {
  	    action = 'like';
    } else if ($clicked_btn.hasClass('fa-solid') && $clicked_btn.hasClass('fa-thumbs-up')) {
  	    action = 'unlike';
    }
  
    $.ajax({
  	    url: '/src/avaliar_obra_artistica.php',
  	    type: 'post',
  	    data: {
  		    'action': action,
  		    'id_obra_artistica': id_obra_artistica
  	    },
  	    
  	    success: function(data){
  		
  		if (action === "like") {
  		
  			$clicked_btn.removeClass('fa-regular');
  			$clicked_btn.removeClass('fa-thumbs-up');
  			$clicked_btn.addClass('fa-solid');
  			$clicked_btn.addClass('fa-thumbs-up');
  		
  		} else if (action === "unlike") {
  			
  			$clicked_btn.removeClass('fa-solid');
  			$clicked_btn.removeClass('fa-thumbs-up');
  			$clicked_btn.addClass('fa-regular');
  			$clicked_btn.addClass('fa-thumbs-up');
  		    
  		}

  		$clicked_btn.siblings('i.fa-solid.thumbs-up').removeClass('fa-solid').addClass('fa-regular');
  	    $clicked_btn.siblings('i.fa-solid.thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-up');
  	    },
  });		

});

//------------------------------------------------------------//

$('.dislike-btn').on('click', function() {
    
    var id_obra_artistica = $(this).data('id');
    $clicked_btn = $(this);
    
    if ($clicked_btn.hasClass('fa-regular') && $clicked_btn.hasClass('fa-thumbs-down')) {
  	    action = 'dislike';
    } else if ($clicked_btn.hasClass('fa-solid') && $clicked_btn.hasClass('fa-thumbs-down')) {
  	    action = 'undislike';
    }
  
    $.ajax({
  	    url: '/src/avaliar_obra_artistica.php',
  	    type: 'post',
  	    data: {
  		    'action': action,
  		    'id_obra_artistica': id_obra_artistica
  	    },
  	    
  	    success: function(data){
  		
  		if (action === "dislike") {
  		
  			$clicked_btn.removeClass('fa-regular');
  			$clicked_btn.removeClass('fa-thumbs-down');
  			$clicked_btn.addClass('fa-solid');
  			$clicked_btn.addClass('fa-thumbs-down');
  		
  		    
  		} else if (action === "undislike") {
  			
  			$clicked_btn.removeClass('fa-solid');
  			$clicked_btn.removeClass('fa-thumbs-down');
  			$clicked_btn.addClass('fa-regular');
  			$clicked_btn.addClass('fa-thumbs-down');
  		
  		
  		    
  		}

  		$clicked_btn.siblings('i.fa-solid.thumbs-down').removeClass('fa-solid').addClass('fa-regular');
  	    $clicked_btn.siblings('i.fa-solid-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-down');
  	    },
  });		

});

});