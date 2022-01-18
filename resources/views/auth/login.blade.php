
<x-layout>
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="m-t-40 card-box">
            <div class="text-center">
                <a href="{{ route('home')}}" class="logo">Espace Admin</a>
                <h5 class="text-muted m-t-0 font-600">LABORATOIRE D’ANALYSES MÉDICALES</h5>
            </div>
            <div class="text-center">
                <h4 class="text-uppercase font-bold m-b-0">Pr. L. BADEREDDINE</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control @error('email') arsley-error @enderror"  type="email" name="email" :value="old('email')" required autofocus placeholder="Email">
                            @error('email')
                            <ul class="parsley-errors-list filled" id="parsley-id-10">
                                <li class="parsley-required">{{ $message }}</li>
                            </ul>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('password') arsley-error @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                            <ul class="parsley-errors-list filled" id="parsley-id-10">
                                <li class="parsley-required">{{ $message }}</li>
                            </ul>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-custom">
                                <input id="checkbox-signup" type="checkbox" name="remember">
                                <label for="checkbox-signup">
                                    Rester Connecté
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group text-center m-t-30">
                        <div class="col-xs-12">
                            <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Se connecter</button>
                        </div>
                    </div>

                    {{-- <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12">
                            <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                    </div> --}}
                </form>

            </div>
        </div>
        <!-- end card-box-->

        
        
    </div>
</x-layout>
        
        
