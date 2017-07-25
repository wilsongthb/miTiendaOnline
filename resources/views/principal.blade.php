<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name')}} </title>

        <!-- Bootstrap CSS -->
         {{--  <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }} ">  --}}
         <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} ">
         <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.css') }} "> 
        {{--  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }} ">  --}}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <div id="app">
            <app></app>
        </div>

        {{--  <script src="{{ asset('node_modules/vue/dist/vue.js') }}"></script>
        <script src="{{ asset('node_modules/vue-router/dist/vue-router.js') }}"></script>
        <script src="{{ asset('node_modules/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>
        <script src="{{ asset('node_modules/vue-resource/dist/vue-resource.js') }} "></script>  --}}
        <script src="{{ asset('js/vue.min.js') }} "></script>
        <script src="{{ asset('js/vue-router.min.js') }} "></script>
        <script src="{{ asset('js/jquery.min.js') }} "></script>
        <script src="{{ asset('js/bootstrap.min.js') }} "></script>
        <script src="{{ asset('js/vue-resource.min.js') }} "></script>
        

        {{--  scripts de la aplicacion  --}}
        <script>
        const APP_C = {
        // ruta de la pagina,
        url: '{{ url('') }}',
        user: {!! json_encode(Auth::user()) !!},
        auth_guest: {{ Auth::guest() ? true : "null" }},
        csrf_field: '{{ csrf_field() }}',
        csrf_token: '{{ csrf_token() }}',
        @if (!Auth::guest())
        user_id: {{ Auth::user()->id }},
        @endif
        }
        var carrito = []
        </script>
        <script src="{{ asset('js/laravel-vue-pagination/src/laravel-vue-pagination.js') }} "></script>


{{--  component scripts  --}}
@include('vue.componente')
@include('vue.producto.ver')
@include('vue.productos')
@include('vue.misproductos.index')
@include('vue.misproductos.create')
@include('vue.cuenta')
@include('vue.producto.detalle')
@include('vue.carrito')
@include('vue.transacciones.misventas')
{{--  code scripts  --}}
@include('vue.app')
        
        <script src="{{ asset('js/vue-root.js') }}"></script>
    </body>
</html>
