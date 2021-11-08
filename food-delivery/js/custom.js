  /* ..............................................
  Responsive Menu
    ................................................. */
function responsiveMenu() {
  var x = document.getElementById("myTopnav");
  if (x.className === "nav") {
    x.className += " responsive";
  } else {
    x.className = "nav";
  }
}
(function($) {
    "use strict";
	
	/* ..............................................
	Slider 
    ................................................. */
$('#slides').superslides({
		inherit_width_from: '.cover-slides',
		inherit_height_from: '.cover-slides',
		play: 5000,
		animation: 'fade',
	});
	
$( ".cover-slides ul li" ).append( "<div class='overlay-background'></div>" );

/* ..............................................
	Menu category  Shorting 
    ................................................. */
    $(".category-list li a").on("click",function(e){
    	e.preventDefault();
    	var cat  =  $(this).data('cate');
      $(".category-list li").removeClass('active');
      $(this).closest('li').addClass('active');
    	if(cat == "all"){
    		$(".menu-list li").show();
    	}else{
    		$(".menu-list li").hide();
    		$("[data-cate='"+cat+"']").show();
    	}
    	
    	//console.log(cat)
    });


    $("body").on("click",".notificaton-msg .close-not",function(e){
      e.preventDefault();
      $(this).parent().remove();
  	});

    if($(".notificaton-msg").length>0){
       $(".notificaton-msg").fadeOut(5000);
      setTimeout(function(){
        $(".notificaton-msg").remove();
      },5000);
  	}

  	$("body").on("click",".delete-btn",function(e){
      var r = confirm("Are You Sure?");
      if(r){
      	return true;
      }else{
      	return false;
      }
  	});

    $("body").on("click",".add-to-cart",function(e){
      e.preventDefault();
      var $this = $(this);

      // ajax request for add to cart
      $.ajax({
        url: 'functions/add-to-cart.php',
        type: 'POST',
        dataType: 'json',
        data: {
          foodId: $this.data("foodId"),
          foodQty: $this.data("foodQty")
        },
      })
      .done(function(data) {
        if(data.type){
          if(data.cart_item_count>0){
            $(".cart-menu").html("<i class='fa fa-shopping-cart' aria-hidden='true'></i> ("+data.cart_item_count+")");
          }else{
            $(".cart-menu").html("<i class='fa fa-shopping-cart' aria-hidden='true'></i>");
          }
          
        }
        
        var str = "";
        str += '<div class="notificaton-msg msg-'+data.notification_type+'" style="top:20px;">';
        str += data.notification_msg;
        str += '</div>';
        $("body").append(str);
         $(".notificaton-msg").fadeOut(3000);
          setTimeout(function(){
            $(".notificaton-msg").remove();
          },3000);
        console.log(data);
      })
      .fail(function() {
        console.log("error");
      });
      



    });



}(jQuery));