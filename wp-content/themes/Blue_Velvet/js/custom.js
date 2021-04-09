jQuery(document).ready(function($){  
   $(".glider-slide .pi-pic span").removeClass();
   $('.flex-active-slide').addClass("product-pic-zoom");
   $('.flex-active-slide img').addClass("product-big-img");
     $('form.woocommerce-cart-form').on( 'click', '.inc.qtybtn, .dec.qtybtn', function() {
            // Get current quantity values
            var qty = $( this ).parent().parent().find('.qty');
            var btnupdate = $('form.woocommerce-cart-form').find( 'button[name="update_cart"]' );
            var val   = parseInt(qty.val());
            var max = parseInt(qty.attr( 'max' ));
            var min = parseInt(qty.attr( 'min' ));
            var step = parseInt(qty.attr( 'step' ));
                      btnupdate.removeAttr('disabled');
     
            // console.log(val);
            // Change the value if plus or minus
                if ( $( this ).is( '.inc.qtybtn' ) ) {
                   if ( max && ( max <= val ) ) {
                      qty.val( max );
                   } else {
                      qty.val( val );
                   }
                }else if($( this ).is( '.dec.qtybtn' )){
                    if ( min && ( min >= val ) ) {
                      qty.val( min );
                   } else if ( val > 1 ) {
                      qty.val( val );
                   }
                }
         });
         jQuery( document.body ).on( 'updated_cart_totals', function() {
            location.reload();
        }); 
        $('.wc-pao-addon-custom-textarea').addClass("form-control");
        $('.wc-pao-addon-select').addClass("form-control");
        $(".search-field , .search-submit").addClass("form-control")
        
        
        $('.wc-pao-addon-field').change(function(){
         var val=$('.wc-pao-addon-field option:selected').text();
         $('.wc-pao-addon-custom-textarea').css("font-family", val);
        });



        $('.flex-active-slide').addClass("product-pic-zoom");
        $('.flex-active-slide img').addClass("product-big-img");
        $('div.show').next().addClass("someclass");
        $(".navbar-toggler").click(function(){
            $('div.icon-contain').toggleClass("someclass");
        });
                   
        
});

