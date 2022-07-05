<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <style>
        .price_before_discount
        {
            position: relative;
        }
        .price_before_discount::after
        {
            content : '';
            position: absolute;
            width:50%;
            height:1px;
            background-color:red;
            top:10px;
            left:0
        }
    </style>
</head>
<body>
    <div id="app">
        
        <!-- Navbar Header  -->
        @include('Frontend.includes._navbar')


        <!-- Content  -->
        <main class="py-4">
            @yield('content')
        </main>


    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function(){

            
            @if( session()->has('success') )
                toastr.success("{{ session()->get('success') }}");
            @endif

            // Confirm Delete .... ??!
            $(document).on('click' , '.delete' ,function(e){

                e.preventDefault();

                var that = $(this);

                swal({
                    title: "Confirm Delete !",
                    icon: "error",
                    buttons: ["No", "Yes"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                        that.closest('form').submit();
                    }
                });

            });


        });
    </script>
</body>
</html>
