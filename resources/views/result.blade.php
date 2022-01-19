<x-layout>

    <header id="topnav">
        <div class="topbar-main">
            <div class="container">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{route('home')}}" class="logo">Laboratoire Pr. L. BADEREDDINE</a>
                </div>
                <!-- End Logo container-->


                <div class="menu-extras">

                    <ul class="nav navbar-nav navbar-right pull-right">

                        <li class="dropdown user-box">
                            <a href="#" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                <img src="{{asset('assets/images/user.png')}}" alt="user-img" class="img-circle user-img">
                            </a>

                            <ul class="dropdown-menu">

                                <li><a href="{{route('home')}}"><i class="ti-power-off m-r-5"></i> Quitter</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

            </div>
        </div>

    </header>

    <div class="wrapper" style="padding-top:80px;">
        <div class="container">
            
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-right m-t-15">
                        <a href="{{route('home')}}" class="btn btn-custom waves-effect waves-light">Quitter <span class="m-l-5"><i class="fa fa-sign-out"></i></span></a>
                    </div>
                    <h4 class="page-title">Résultat des Analyses : {{$result->code }}  </h4>
                    <p id="title-mobile"><b>Veuillez cliquer sur le bouton ci-dessous pour télécharger le fichier :</b></p>
                </div>
            </div>


            <div id="pdf-desktop" class="row">
                <embed src="{{asset('storage/pdf/'.$result->code)}}" width="100%" height="1400" alt="pdf">
            </div>

            <div id="pdf-mobile" class="row">
                <iframe src="{{asset('storage/pdf/'.$result->code)}}" style="width:100%;" frameborder="0"></iframe>
            </div>
            <!-- end row -->


            <!-- Footer -->
            @include('_footer')
            <!-- End Footer -->

        </div>
        <!-- end container -->

    </div>
    @section('javascript')
    <script>
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            document.getElementById("pdf-mobile").style.display = 'block';
            document.getElementById("title-mobile").style.display = 'block';
            document.getElementById("pdf-desktop").style.display = 'none';
        }
        else {
            document.getElementById("pdf-mobile").style.display = 'none';
            document.getElementById("pdf-desktop").style.display = 'block';
            document.getElementById("title-mobile").style.display = 'none';
        }

    </script>
    @endsection
</x-layout>