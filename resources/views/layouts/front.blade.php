<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  


   {{-- Google Font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Roboto&display=swap" rel="stylesheet">

{{-- Font awesome --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


<!-- CSS Files -->

<!-- Font Awesome Icon Library stars -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Style -->

    <link rel="stylesheet" href="{{asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap5.css') }}">

    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css') }}">

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/63383acc37898912e96c54c4/1ge9qbchg';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

    <style>
        a{
            text-decoration: none !important;
        }
    </style>

  
    
</head>
<body>

@include('layouts.inc.frontnavbar')
   
     <div class="content">
            @yield('content')
     </div>


     <div class="whatsapp-chat">
        <a href="https://wa.me/+381643994763?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
            <img src="{{ asset('assets/images/whatsapp2-icon.jpg') }}"  alt="whatsapp-logo" height="80px" width="80px">
        </a>
     </div>

 






        <!-- Scripts -->
        <script src="{{ asset('frontend/js/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
       <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
       <script src="{{ asset('frontend/js/custom.js') }}"></script>
        <script src="{{ asset('frontend/js/checkout.js') }}"></script>


        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <script>
          
              var availableTags = [];
             $.ajax({
                method: "GET",
                url: "/product-list",
                success: function (response) {
                    //console.log(response);
                    startAutoComplete(response);
                }
             });

             function startAutoComplete(availableTags){
                $( "#search_product" ).autocomplete({
                source: availableTags
              });
             }

         
        
            </script>


      <!--   Core JS Files   -->
  {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if (session('status'))
            <script>
                swal("{{ session('status') }}");
            </script>
        @endif
        @yield('scripts')
    
</body>
</html>
