<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./assets/img/apple-icon.png" rel="apple-touch-icon" sizes="76x76">
    <link href="./assets/img/favicon.png" rel="icon" type="image/png">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../assets/css/material-kit.css?v=2.1.1" rel="stylesheet">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet">
    <link href="../assets/demo/vertical-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v4.7.0/css/all.css" integrity="sha384-50oBUHEmvpQ+1lw4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/boutique.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <title>Boutique Viviana</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-6 margin-tb">
            <div class="pull-left">
                <h2>Añadir Nuevas Ofertas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{url('Ofertas')}}"> <i class="material-icons">reply</i></a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('Ofertas')}}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8">
                <div class="form-group">
                    <strong style="font-size: 19pt">Tipo:</strong>
                    <input type="text" name="tipo" class="form-control" style="font-size: 19pt">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cliente:</strong>
                    <select name="correo" id="correo">
                        <option value="" disabled selected>Selecciona un Cliente</option>
                        @foreach($Clientes as $Cliente)
                            <option value="{{$Cliente->id_cliente}}">{{$Cliente->correo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Producto:</strong>
                    <select name="producto" id="producto">
                        <option value="" disabled selected>Selecciona un producto</option>
                        @foreach($Productos as $producto)
                            <option value="{{$producto->id_producto}}">{{$producto->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    <i class="material-icons">save_alt</i>
                </button>
            </div>
        </div>
    </form>
</body>

<footer class="footer footer-brand footer-big">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <h5>
                        <small>Acerca de nosotros</small></h5>
                    <p>Somos una pequeña boutique que es dedicada a aquellas damas con excelentes gusto y pasiones.</p>
                    <p>Si nos visitas te daremos una excelente atencion al clientes y nuevas promociones.</p>
                </div>
                <div class="col-md-4">
                    <h5>
                        <small>Redes Sociales</small></h5>
                    <div class="social-feed">
                        <div class="feed-line">
                            <i class="fa fa-twitter"></i>
                            <p>siguenos en nuestra pagina de twitter.</p>
                        </div>
                        <div class="feed-line">
                            <i class="fa fa-instagram"></i>
                            <p>siguenos en nuestra pagina de instagram.</p>
                        </div>
                        <div class="feed-line">
                            <i class="fa fa-facebook-square"></i>
                            <p>siguenos en nuestra pagina de facebook.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
        <hr>
        <ul class="float-left">
            <li>
                <a href="#" style="font-size: 15pt">
                    Blog
                </a>
            </li>
            <li>
                <a href="#" style="font-size: 15pt">
                    Presentacion
                </a>
            </li>
            <li>
                <a href="#" style="font-size: 15pt">
                    Descubrir
                </a>
            </li>
            <li>
                <a href="#" style="font-size: 15pt">
                    Pagos
                </a>
            </li>
            <li>
                <a href="#" style="font-size: 15pt">
                    Contactanos
                </a>
            </li>
        </ul>
        <div class="copyright float-right">
            <small>Copyright ©</small>
            <small><script>
                    document.write(new Date().getFullYear())
                </script></small>
            <small>Derechos de autor Reservados.</small>
        </div>
    </div>
</footer>
</html>

