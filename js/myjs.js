$(document).ready(function() {
            
            
    
    $(window).resize(function() {
          
        var screenWidth = window.innerWidth;
    /*console.log(screenWidth);*/
    if (screenWidth < 768) {
      $(".order").addClass('btn-block');       
       }
    else $(".order").removeClass('btn-block')

    });

    

});


