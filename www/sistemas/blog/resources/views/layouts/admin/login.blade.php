@extends("layouts.admin")

@section("content")
    <style>
        html,body{
            min-height:100%;
            overflow:hidden;
        }
        @media only screen and (min-width:769px){
            .col-md-6{
                min-height:768px;
                height:100%;
                display: flex;
                justify-content: center;
                align-content: center;
                flex-direction: column;
            }

            .col-form-label{
                text-align:right;
            }

        }

        @media only screen and (max-width:768px){
            #sidebanner{
                display:none;
            }

            .col-md-6{
                min-height:100vh;
                display: flex;
                justify-content: center;
                align-content: center;
                flex-direction: column;
            }

            .col-form-label{
                text-align:left;
                padding-left:30px;
            }
        }
        
        #sidebanner{
            opacity: 0.5;
            background-image:url("https://images.pexels.com/photos/1040159/pexels-photo-1040159.jpeg?auto=compress&cs=tinysrgb&h=650&w=940");
            background-position: center center;
            background-size:cover;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div id="sidebanner" class="col-md-6 text-white text-right">
                <h2 class="text-white">Bienvenidos</h2><br>
                <h4 class="text-white">Panel Administrativo</h4>
            </div>
            <div class="col-md-6 bg-info">
                <div class="container">
                    <div class="card align-middle">                        
                       <div class="card-content">
                            <h3 class="text-center">Iniciar Sesion<img src="https://cdn4.iconfinder.com/data/icons/STROKE/security/png/400/session.png" width="64" alt="CINEMAWEB"></h3>
                            <form action="/admin/main" method="post" class="form-horizontal justify-content-center">
                                <div class="form-group row">
                                    <label for="" class="col-xs-2 col-md-1 col-form-label ">
                                        <i class="fas fa-user-circle"></i>
                                    </label>
                                    <div class="col-xs-8 col-md-9">
                                        <input type="text" class="form-control" name="usuario">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-xs-2 col-md-1 col-form-label ">
                                        <i class="fas fa-lock"></i>
                                    </label>
                                    <div class="col-xs-8 col-md-9">
                                        <input type="text" class="form-control" name="clave">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <a href="/admin/main" class="btn btn-primary">Ingresar&nbsp;<i class="fas fa-sign-in-alt"></i></a>
                                        <!-- <button class="btn btn-primary">Ingresar&nbsp;<i class="fas fa-sign-in-alt "></i></button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop