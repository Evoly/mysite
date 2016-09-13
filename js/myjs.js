
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



$('btn-default').click(function(){
		$('thanks-page').css('display','block');
		
	});



//$('#myModal').modal('show');

