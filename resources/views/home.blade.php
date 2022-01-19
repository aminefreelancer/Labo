<x-layout>
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page"  >
        <div class="m-t-80 card-box" >
            <div class="text-center">
                
                <h4>
                    <a href="{{route('home')}}" style="color:black">
                        {{$labo->header}} 
                    </a>
                </h4>
                <h4 class="text-uppercase font-bold m-b-0">
                    <a href="./" style="color:black">
                        {{$labo->title}}
                    </a>
                </h4>
                @if($labo->indication)
                    <h5 style="color:black; font-weight:600">
                        {{$labo->indication}} 
                    </h5>
                @endif
                @if($labo->mobile)
                    <h5 style="color:black">                        
                        {{$labo->mobile}}
                    </h5>
                @endif
                <h5 style="color:black">
                    <i class="fa fa-map-marker"></i> {{$labo->address}}
                </h5>
                @if($labo->phone)
                    <h4 style="color:black">
                        <i class="fa fa-phone"></i> {{$labo->phone}} 
                    </h4>
                @endif
                @if($labo->email)
                    <h4 style="color:black">                        
                        <i class="fa fa-envelope"></i> {{$labo->email}}
                    </h4>
                @endif
                <hr>
                <h4 class="text-uppercase font-bold m-b-0">Consultation des résultats</h4>
            </div>
            <div class="panel-body">
                <form autocomplete="off" method="post" action="{{route('getResult')}}" role="form" class="text-center">
                    @csrf
                    <div class="user-thumb">
                        <img src="assets/images/user.png" class="img-responsive img-circle img-thumbnail" alt="patient">
                    </div>
                    <div class="form-group">
                        <p class="text-muted m-t-10">
                            Veuillez tapez le code de vos résultats
                        </p>
                        <div class="input-group m-t-30">
                            <input type="text" class="form-control" name="code" placeholder="Code des résultats" required="">
                            <span class="input-group-btn">
                                <button type="submit" name="submit" class="btn btn-success w-sm waves-effect waves-light">
                                    Valider
                                </button>
                            </span>
                        </div>
                    </div>
                    @if (session()->has('warning') or session()->has('fail'))
                        <div class="alert {{(session()->has('warning')) ? 'alert-warning' : 'alert-danger'}} alert-dismissible text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ (session()->has('warning')) ? session('warning') : session('fail') }}</strong>
                        </div>
                    @endif
                </form>
            </div>
            
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.9435413533033!2d2.9755971151415883!3d36.69989457996941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128faf700c2d8987%3A0x3aca14d1fe3b003f!2slaboratoire%20professeur%20Badereddine!5e0!3m2!1sen!2sdz!4v1642595352539!5m2!1sen!2sdz" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            
        </div>
        
        
    </div>
</x-layout>