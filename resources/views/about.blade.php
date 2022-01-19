<x-layout>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="card-box m-t-20">
                    <div class="row">
                        <div class="col-lg-6" >
                            <h4 class="header-title m-t-0 m-b-30">Informations Labo </h4>
                            <form action="{{route('updateLabo')}}" method="POST" >
                                @csrf
                                @method('PUT')
                                <div class="col-md-6 form-group">
                                    <label>En-tête *</label>
                                    <input type="text" name="header" required value="{{$labo->header}}" class="form-control">
                                    @error('header')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Titre *</label>
                                    <input type="text" name="title" required class="form-control" value="{{$labo->title}}">
                                    @error('title')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>

                                <div class="col-xs-6 form-group">
                                    <label>Adresse </label>
                                    <input type="text" name="address" class="form-control" value="{{$labo->address}}">
                                    @error('address')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>

                                <div class="col-xs-6 form-group">
                                    <label>Mobile </label>
                                    <input type="text" name="mobile" class="form-control" value="{{$labo->mobile}}">
                                    @error('mobile')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>

                                <div class="col-xs-12 form-group">
                                    <label>Description </label>
                                    <input type="text" name="indication" class="form-control" value="{{$labo->indication}}">
                                    @error('indication')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>

                                <div class="col-xs-6 form-group">
                                    <label>Téléphone </label>
                                    <input type="text" name="phone" class="form-control" value="{{$labo->phone}}">
                                    @error('phone')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>

                                <div class="col-xs-6 form-group">
                                    <label>Email </label>
                                    <input type="email" name="email" class="form-control" value="{{$labo->email}}">
                                    @error('email')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>

                                <div class="col-xs-6 m-b-20">
                                    <label>Délais d'expiration </label>
                                    <select name="expiry" id="expiry" required class="form-control">
                                        <option value="">-</option>
                                        <option @if($labo->expiry == '+1 month') selected @endif value="+1 month">1 mois</option>
                                        <option @if($labo->expiry == '+2 months') selected @endif value="+2 months">2 mois</option>
                                        <option @if($labo->expiry == '+3 months') selected @endif value="+3 months">3 mois</option>
                                        <option @if($labo->expiry == '+6 months') selected @endif value="+6 months">6 mois</option>
                                        <option @if($labo->expiry == '+12 months') selected @endif value="+12 months">12 mois</option>
                                    </select>
                                    @error('expiry')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>

                                <div class="col-xs-6 text-right m-b-20">
                                    <button name="update" class="btn btn-primary m-t-20 waves-effect waves-light" type="submit">
                                        Mettre à jour
                                    </button>
                                </div>
                                    
                                @if (session()->has('success'))
                                    <div class="col-xs-12">
                                        <div class="alert alert-success alert-dismissible text-center">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                @endif

                                
                            </form>
                        </div>

                        <div class="col-lg-6" >
                            <h4 class="header-title m-t-0 m-b-30">Pramètres Compte</h4>
                            <form autocomplete="off" action="{{route('updateAccount')}}" method="POST" >
                                @method('PUT') @csrf
                                <div class="col-xs-12 form-group">
                                    <label>Email</label>
                                    <input type="email" autocomplete="off" name="email_user" parsley-trigger="change" required value="{{auth()->user()->email}}" class="form-control">
                                    @error('email_user')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>
                                <div class="col-xs-12 form-group">
                                    <label>Mot de passe actuel</label>
                                    <input type="password" autocomplete="off" name="current_password" required class="form-control">
                                    @error('current_password')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>

                                <div class="col-xs-6 form-group">
                                    <label>Nouveau Mot de passe </label>
                                    <input type="password" autocomplete="off" name="new_password" class="form-control">
                                    @error('new_password')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>
                                <div class="col-xs-6 form-group">
                                    <label>Confirmer Mot de passe </label>
                                    <input type="password" autocomplete="off" name="new_confirm_password" class="form-control">
                                    @error('new_confirm_password')
                                        <x-error-flash>
                                            {{ $message }}
                                        </x-error-flash>
                                    @enderror
                                </div>

                                <div class="form-group text-center m-b-0">
                                    <button name="modifier" class="btn btn-primary waves-effect waves-light" type="submit">
                                        Mettre à jour
                                    </button>
                                </div>

                                @if (session()->has('success-account'))
                                    <div class="col-xs-12 m-t-20">
                                        <div class="alert alert-success alert-dismissible text-center">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{ session('success-account') }}
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>            
            @include('_footer')
        </div>
    </div>
</x-layout>