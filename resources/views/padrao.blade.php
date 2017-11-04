<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        
        <!-- CSS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('css/estilo.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/jquery.mask.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
        <script src="{{asset('js/validator.js')}}"></script>
        <script src="{{asset('js/validator.min.js')}}"></script>
        <script src =" https://unpkg.com/sweetalert/dist/sweetalert.min.js "> </script > 

        <script>
            $(document).ready(function () {
                $('#telefoneFixo').mask('(00) 0000-0000');
                $('#telefoneCelular').mask('(00) 00000-0000');
                $('#postal_code').mask('00000-000');
            })

            function confirmacao() {
                $.notify({
                    message: 'Cadastro salvo com sucesso'
                }, {
                    type: 'success'
                })
                return false
            }
        </script>
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="asset('images/ico/apple-touch-icon-72-precomposed.png')">
        <link rel="apple-touch-icon-precomposed" href="asset('images/ico/apple-touch-icon-57-precomposed.png')">
        <!-- script validação do formulário -->
    </head>
    <body class="homepage">
        @if(Auth::check())
            {{Auth::logout()}}
            @endif
        <header id="header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-4">
                            <div class="top-number"><p><i class="fa fa-phone-square"></i>  +55 15 3259-8400</p></div>
                        </div>
                        <div class="col-sm-6 col-xs-8">
                            <div class="social">
                                <div class="search">
                                    <form role="form">Buscar
                                        <input type="text" class="search-form" autocomplete="off">
                                        <i class="fa fa-search"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.container-->
            </div><!--/.top-bar-->

            <nav class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Barra de navegação</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img src="{{asset('images/brasao.png')}}" height="106" width="99" alt="logo"></a>
                    </div>
                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="@yield('home')"><a href="/">Home</a></li>
                            <li class="@yield('servico')"><a href="{{url('/solicitacao')}}">Solicitação de Serviço e Denúncia</a></li>
                            <li class="@yield('acompanharServico')"><a href="{{url('/acompanhar-servico')}}">Acompanhar Serviço</a></li>
                            
                            @if(Auth::guest())
                            <li class="@yield('login')"><a href="{{route('login')}}">Login</a></li>
                            <li class="@yield('cadastrar')"><a href="{{route('register')}}">Cadastrar</a></li>

                            <!-- MENU DROP DOWN - USUÁRIO LOGADO -->
                            @else
                            <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="caret">{{substr(strtolower(Auth::user()->nome),0,strpos(strtolower(Auth::user()->nome),' '))}}</span>
                                </a>

                                <ul class="dropdown-menu" id="logout-form" >
                                    <li><a href="{{ route('logout') }}" >Deslogar</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            </ul>
                            @endif

                            <li class="@yield('sobre')"><a href="{{url('/sobre')}}">Sobre Nós</a></li>
                        </ul>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->

        </header><!--/header-->

        <!-- CONTEUDO PRINCIPAL -->


        <br />
        <div class="container">
            @yield('content')
        </div>
        <section id="bottom">
            <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="widget">
                            <h3>Navegação</h3>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="{{url('/solicitacao')}}">Solicitação de serviços e Denúncia</a></li>
                                <li><a href="{{url('/acompanhar-servico')}}">Acompanhar Serviço</a></li>
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('register')}}">Cadastrar</a></li>
                                <li><a href="{{url('/sobre')}}">Sobre Nós</a></li>
                            </ul>
                        </div>
                    </div><!--/.col-md-3-->

                    <div class="col-md-4 col-sm-4">
                        <div class="widget">
                            <h3>Endereço</h3>
                            <ul>
                                <li><a href="#">Avenida Cônego João Clímaco, 140</a></li>
                                <li><a href="#">Centro</a></li>
                                <li><a href="#">18270-900</a></li>
                                <li><a href="#">Tatuí/SP</a></li>
                                <li><a href="#">+55 15 3259-8400</a></li>
                                <li><a href="#">ouvidoria@tatui.sp.gov.br</a></li>
                            </ul>
                        </div>
                    </div><!--/.col-md-3-->

                    <div class="col-md-4 col-sm-4">
                        <div class="widget">
                            <h3>LINKS ÚTEIS</h3>
                            <ul>
                                <li><a href="ouvidoria.html">O que é uma Ouvidoria</a></li>
                                <li><a href="faq.html">Guia de uso do Sistema</a></li>
                                <li><a href="equipe.html">A nossa Equipe</a></li>
                                <li><a href="https://www.tatui.sp.gov.br">Portal da Prefeitura</a></li>
                                <li><a href="https://www.facebook.com/PrefeituradeTatui/">Facebook</a></li>
                                <li><a href="contato.html">Entre em Contato</a></li>
                            </ul>
                        </div>
                    </div><!--/.col-md-3-->

                </div>
            </div>
        </section><!--/#bottom-->

        <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        &copy; 2017 <a target="_blank" href="#" title="">Sistemas de Ouvidoria  CWCE Systems</a>. Todos os Direitos Reservados.
                    </div>
                    <div class="col-sm-6">
                        <ul class="pull-right">
                            <li><a href="/">Home</a></li>
                            <li><a href="/sobre">Sobre Nós</a></li>
                            <li><a href="faq.html">Perguntas Frequentes</a></li>
                            <li><a href="contato.html">Entre em contato</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!--/#footer-->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('js/jquery.isotope.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/high-contrast.js')}}"></script>

    </body>
</html>
