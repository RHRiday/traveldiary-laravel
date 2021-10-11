<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('logo.ico') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('css')
    <style>
        /* scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 6px #0000004d;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background: #e2ffe06e;
            box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.5);
            -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.5);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #cbffc7fa;
        }

        @media (min-width: 992px) {
            .phone-search {
                display: none !important;
            }
        }

    </style>


</head>

<body>
    @yield('content')
    <script src="https://kit.fontawesome.com/7f68bcaf19.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/medium-zoom@1.0.6/dist/medium-zoom.min.js">
    </script>
    <script src="{{ asset('js/trix.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        //preview profile change
        function changePicture(imgInp, imgTarget) {
            img = document.getElementById(imgTarget);
            const [file] = imgInp.files;
            if (file) {
                img.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>

</html>
