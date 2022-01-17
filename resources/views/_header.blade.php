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
                            <li><a href="{{route('about')}}"><i class="ti-user m-r-5"></i>Mon profil</a></li>
                            <li><a href="#"><i class="ti-power-off m-r-5"></i> Déconnexion</a></li>
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

    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li>
                        <a href="{{route('dashboard')}}"><i class="zmdi zmdi-view-dashboard"></i> <span> Tableau de bord </span> </a>
                    </li>
                    

                    <li>
                        <a href="{{route('import')}}"><i class="zmdi zmdi-collection-plus"></i><span>Importer </span> </a>
                    </li>

                    <li>
                        <a href="{{route('about')}}"><i class="zmdi zmdi-collection-text"></i><span>Paramètres </span> </a>
                    </li>

                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>
</header>