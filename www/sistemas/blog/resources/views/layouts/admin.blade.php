<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema Web - @yield("title")</title>
    <link rel="stylesheet" href="{{URL::to("css/bootstrap.css")}}" >
    <link rel="stylesheet" href="{{URL::to("css/fontawesome.all.css")}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- <link href="/css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }} ">
     <link rel="shortcut icon" href="{{ URL::to('img/pelicula.png') }}" />
    <style type="text/css">
        @media only screen and (min-width: 768px){
            #sidebarCollapse{
                display: none;
            }
        }

        @media only screen and (max-width: 767px){
            #sidebarCollapse{
                display: block;
            }
        }
    </style>
</head>
<body>
    @yield("content")
    <script src="{{ URL::asset('js/jquery-3.3.1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('js/bootstrap-table.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-table-es-MX.js') }}"></script>
    <script src="{{ URL::asset('js/general.js') }}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

            $(".dt").bootstrapTable();
        });
    </script>
</body>
</html>