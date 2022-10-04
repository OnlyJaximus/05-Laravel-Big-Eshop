$(document).ready(function () {

    loadCart();
    loadWishlist();

    $.ajaxSetup({
        headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    

    function loadCart(){
        $.ajax({
            type: "GET",
            url: "/load-cart-data",
           success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);

                //  alert(response.count)
               // console.log(response.count);
                
            }
        });
    }

    function loadWishlist(){
        $.ajax({
            type: "GET",
            url: "/load-wishlist-count",
           success: function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);

                //  alert(response.count)
               // console.log(response.count);
                
            }
        });
    }
    
    
    $('.addToCartBtn').click(function (e) { 
        e.preventDefault();

        var product_id =  $(this).closest('.product_data').find('.prod_id').val();
        var product_qty =  $(this).closest('.product_data').find('.qty-input').val();

        // alert(product_id);
        // alert(product_qty);

        $.ajaxSetup({
                 headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty' : product_qty,
            },
            
            success: function (response) {
                // alert(response.status);
                swal(response.status);
                loadCart();
            }
        });
        
    });


    $('.addToWishlist').click(function (e) { 
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
               },
            success: function(response){
                 swal(response.status);
                 loadWishlist();
              
            }

        });
        
    });

     // ***************  + button *********************************************
    //    $('.increment-btn').click(function (e) { 
        $(document).on('click', '.increment-btn', function (e) {
        
        e.preventDefault();

        // var inc_value = $('.qty-input').val();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();



        var value = parseInt(inc_value, 10);
        value = isNaN(value)? 0 : value;
        if(value < 10){
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
        
    });

 // *************** - button *********************************************
      // $('.decrement-btn').click(function (e) { 
        $(document).on('click', '.decrement-btn', function (e) {
        e.preventDefault();

        // var dec_value = $('.qty-input').val();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();

        var value = parseInt(dec_value, 10);
        value = isNaN(value)? 0 : value;
        if(value > 1){
            value--;
            // $('.qty-input').val(value);
            var dec_value = $(this).closest('.product_data').find('.qty-input').val(value);
        }
        
    });

     
    // *************** DELETE *********************************************
    // $('.delete-cart-item').click(function (e) { 
        $(document).on('click', '.delete-cart-item', function (e) {
        e.preventDefault();
         $.ajaxSetup({
            headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data:{
                'prod_id' : prod_id,
            },
           

            success: function (response) {
                
                // swal(response.status);
                // alert(response.status);
                //  window.location.reload();


                loadCart();
                 $('.cartitems').load(location.href + " .cartitems");
                 swal("", response.status, "success");
              
             }
        });
        
    });


    
    // *************** REMOVE WISH LIST*********************************************
    // $('.remove-wishlist-item').click(function (e) { 
        $(document).on('click', '.remove-wishlist-item', function (e) {
        e.preventDefault();
        
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: "POST",
            url: "delete-wishlist-item",
            data:{
                'prod_id' : prod_id,
            },
           

            success: function (response) {
                
                // swal(response.status);
                //  alert(response.status);
               //window.location.reload();


                
                loadWishlist();
                 $('.wishlistitems').load(location.href + " .wishlistitems");
                 swal("", response.status, "success");
              
             }
        });
    });




      // ***************  changeQuantity *********************************************
    // $('.changeQuantity').click(function (e) { 
       $(document).on('click', '.changeQuantity', function (e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty =  $(this).closest('.product_data').find('.qty-input').val();

        data =  {
            'prod_id' : prod_id,
            'prod_qty' : qty,
        }

        $.ajaxSetup({
            headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
           
            success: function (response) {
                // alert(response.status);
                // window.location.reload();


                $('.cartitems').load(location.href + " .cartitems");
                swal("", response.status, "success");
                
            }
        });
        
    });
});