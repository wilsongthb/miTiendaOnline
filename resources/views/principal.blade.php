
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.css') }} ">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <div id="app"></div>
        

        <script src="{{ asset('node_modules/vue/dist/vue.js') }}"></script>
        <script src="{{ asset('node_modules/vue-router/dist/vue-router.js') }}"></script>
        <script src="{{ asset('node_modules/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/root.js') }}"></script>
    </body>
</html>