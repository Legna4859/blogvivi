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

<nav class="navbar navbar-expand-lg bg-rose">
    <div class="main-page-wrapper">
        <div class="theme-main-menu sticky_nav theme-menu-one">
            <div class="logo">
                <a class="single_logo">
                    <img src="img/house-user.svg" alt="" width="50" height="50">
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <form class="form-inline ml-auto">
            <div class="form-group has-white bmd-form-group">
                <input class="form-control" type="text" placeholder="Search">
            </div>
            <button class="btn btn-white btn-raised btn-fab btn-round" type="submit">
                <i class="material-icons">search</i>
            </button>
        </form>
        <div class="navbar-translate">
            <button class="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation" type="button" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('Productos')}}" style="font-size: 19pt">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('Ofertas')}}" style="font-size: 19pt">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('Boutique_vivi')}}" style="font-size: 19pt">Inicio</a>
                    </li>
                    <input type="text" name="birthday" value="">
                </ul>

                <script>
                    $(function() {
                        $('input[name="birthday"]').daterangepicker({
                            singleDatePicker: true,
                            showDropdowns: true,
                            minYear: 1901,
                            maxYear: parseInt(moment().format('YYYY'),10)
                        }, function(start, end, label) {
                            var years = moment().diff(start, 'years');
                            alert("You are " + years + " years old!");
                        });
                    });
                </script>
            </ul>
        </div>
    </div>
</nav>
<form>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Correo Electronico</label>
            <input type="email" class="form-control" id="inputEmail4" style="font-size: 19pt">
        </div>
        <div class="form-group col-md-6">

        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Domicilio</label>
        <input type="text" class="form-control" id="inputAddress" style="font-size: 19pt">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Direccion</label>
        <input type="text" class="form-control" id="inputAddress2" style="font-size: 19pt">
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="ciudad">Ciudad</label>
            <select id="ciudad" class="form-control">
                <option selected>Elige el municipio</option>
                @foreach($municipio as $mun)
                <option selected>{{$mun->municipio}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputState">Estado</label>
            <select id="inputState" class="form-control">
                <option selected>Elige el Estado</option>
                @foreach($estado as $es)
                <option selected>{{$es->estado}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-2 ml-auto">
        </div>
    </div>
</form>

<div class="row" style="font-size: 19pt">
    <div class="col-lg-6 margin-tb">
        <div class="pull-left">
            <h2 style="text-align: center">Lista de Clientes</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-round" href="{{url('Cliente/create')}}" title="Create a Cliente">
                <i class="material-icons">add_circle</i>
            </a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-warning">
        <p>{{$message}}</p>
    </div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th style="font-size: 20pt; text-align:center">#</th>
        <th style="font-size: 20pt; text-align:center">Correo</th>
        <th style="font-size: 20pt; text-align:center">Domicilio</th>
        <th style="font-size: 20pt; text-align:center">Direccion</th>
        <th style="font-size: 20pt; text-align:center">Ciudad</th>
        <th style="font-size: 20pt; text-align:center">Acciones</th>
    </tr>
    @foreach ($clientes as $cliente)
        <tr>
            <td style="font-size: 20pt">{{$loop->iteration}}</td>
            <td style="font-size: 20pt">{{$cliente->correo}}</td>
            <td style="font-size: 20pt">{{$cliente->domicilio}}</td>
            <td style="font-size: 20pt">{{$cliente->direccion}}</td>
            <td style="font-size: 20pt">{{$cliente->municipio}}</td>
            <td align="center">
                <form action="{{url('Cliente',$cliente->id_cliente)}}" method="POST"  style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-warning btn-round"><i class="material-icons">delete_forever</i></button>
                </form>
                <a class="btn btn-rose btn-round" href="{{url('Cliente',$cliente->id_cliente).'/edit'}}">
                    <i class="material-icons">edit</i>
                </a>
            </td>
        </tr>
    @endforeach
</table>
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
