<x-layout>

    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="result">
                <div class="col-sm-12">
                    @if(count($results))
                        <div class="btn-group pull-right m-t-15">
                            <a data-toggle="modal" data-target="#deletePdfExp" class="btn btn-warning waves-effect waves-light">Supprimer les PDF expirés <span class="m-l-5"><i class="fa fa-trash-o"></i></span></a>
                            <a data-toggle="modal" data-target="#deleteAllPdf" class="btn btn-danger waves-effect waves-light">Effacer Tout <span class="m-l-5"><i class="fa fa-trash"></i></span></a>
                        </div>
                    @endif
                    <div class="btn-group pull-right m-t-15">
                        <a href="{{route('import')}}" class="btn btn-custom waves-effect waves-light">Importer <span class="m-l-5"><i class="fa fa-plus"></i></span></a>
                    </div>
                    <h4 class="page-title">Liste des résultats</h4>
                </div>
            </div>

            <div id="deletePdfExp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deletePdfExp" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Suppression des résultats expirés :</h4>
                        </div>
                        <form action="{{route('destroyExpired')}}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="modal-body">
                                <p>Voulez-vous supprimer tous les fichiers expirés ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Non</button>
                                <button type="submit" name="deleteExp" class="btn btn-danger waves-effect waves-light">Oui</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div id="deleteAllPdf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteAllPdf" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Vider la banque des PDF: </h4>
                        </div>
                        <form action="{{route('destroyAll')}}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="modal-body">
                                <p>Voulez-vous vider tous les résultats d'analyses ?</p>
                                <div class="alert alert-danger text-center">
                                    <strong>Attention !</strong> Action irréversible.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Non</button>
                                <button type="submit" name="deleteAllPdf" class="btn btn-danger waves-effect waves-light">Oui</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            

            <div class="row">
                <div class="col-lg-12" >
                    <div class="card-box" style="min-width: 600px">

                    @if (session()->has('success') or session()->has('fail'))
                        <div class="alert {{(session()->has('success')) ? 'alert-success' : 'alert-danger'}} alert-dismissible text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ (session()->has('success')) ? session('success') : session('fail') }}
                        </div>
                    @endif
                    @if(count($results))
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Nombre de vue</th>
                                    <th>Expire le</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($results as $result)
                                    <tr>
                                        <td>#</td>
                                        
                                        <td>{{$result->code }}</td>
                                        <td>{{$result->views }}</td>
                                        <td>
                                            @if(strtotime($result->expired) < strtotime('today')) 
                                                <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete{{$result->id}}"> Expiré</a>
                                            @else 
                                                {{date('d-m-Y', strtotime($result->expired))}}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#view{{$result->id }}"> <i class="fa fa-file-pdf-o"></i></a>
                                            <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#expire{{$result->id }}"> <i class="fa fa-calendar-o"></i></a>
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete{{$result->id }}"> <i class="fa fa-trash-o"></i></a>
                                        </td>

                                        <div id="view{{$result->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Résultat : {{$result->code }}</h4>
                                                    </div>
                                                        <div class="modal-body">
                                                            <div class="result ">
                                                                
                                                                <embed src="{{asset('storage/pdf/'.$result->code)}}" width="100%" height="500" alt="pdf">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal -->

                                        <div id="expire{{$result->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Modifier la date d'expiration : {{$result->code }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <form method="POST" action="{{route('updateExpired')}}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <div class="col-md-9 col-sx-6">
                                                                        <p>Date d'expiration : </p>
                                                                        <input type="hidden" name="id" value="{{$result->id }}">
                                                                        <input type="date" name="expired" class="form-control" required value="{{$result->expired }}">
                                                                    </div>
                                                                    <div class="col-md-3 col-sx-6 text-center">
                                                                        <p>.<br></p>
                                                                        <button type="submit" name="update" class="btn btn-success">Modifier</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal -->

                                        <div id="delete{{$result->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete{{$result->id }}" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="remove{{$result->id }}">Supression des résultats : {{$result->code }}</h4>
                                                    </div>
                                                    <form action="{{route('destroy')}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="{{$result->id }}">
                                                            <input type="hidden" name="code" value="{{$result->code }}">
                                                            <p>Voulez-vous supprimer ce fichier ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Non</button>
                                                            <button type="submit" name="delete" class="btn btn-danger waves-effect waves-light">Oui</button>
                                                        </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">Aucun résultat trouvé ! <a href="{{route('import')}}"> Importer </a></p>
                    @endif
                    </div>
                </div><!-- end col -->
            </div>
            
            @include('_footer')
            

        </div>
        <!-- end container -->


    </div>

</x-layout>