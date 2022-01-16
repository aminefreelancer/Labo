<x-layout>
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page"  >
        <div class="m-t-80 card-box" >
            <div class="text-center">
                
                <h4><a href="./" style="color:black">Header</a></h4>
                <h4 class="text-uppercase font-bold m-b-0"><a href="./" style="color:black">Titre</a></h4>
                
                <h5 style="color:black; font-weight:600">indication</h5>
                
                <h5 style="color:black">                        
                    mobile
                </h5>
                <h5 style="color:black"><i class="fa fa-map-marker"></i>adresse</h5>
                <h4 style="color:black">
                    <i class="fa fa-phone"></i> telephone 
                </h4>
                email
                <h4 style="color:black">                        
                    <i class="fa fa-envelope"></i> email
                </h4>

                <hr>
                <h4 class="text-uppercase font-bold m-b-0">Consultation des résultats</h4>
            </div>
            <div class="panel-body">
                <form autocomplete="off" method="post" action="dashboard.php" role="form" class="text-center">
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
                    
                            <div class="alert alert-danger alert-dismissible text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Aucun résultat trouvé !</strong> 
                            </div>
                    
                            <div class="alert alert-warning alert-dismissible text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Résultat expiré !</strong> 
                            </div>
                    
                </form>


            </div>
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1596.957550355338!2d5.760489458151401!3d36.82055429498609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12f2607a07587e49%3A0x357dd4a82e0d152d!2sLabo%20Medical%20Dr.%20Bourouied!5e0!3m2!1sfr!2sdz!4v1625679537497!5m2!1sfr!2sdz" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        
        
    </div>
</x-layout>