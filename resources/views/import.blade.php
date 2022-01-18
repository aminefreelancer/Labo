<x-layout>

    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Téléverser les fichiers PDF</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    
                    <div class="card-box">
                        <form action="{{route('import')}}" class="dropzone" id="dropzonewidget" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <input hidden name="documents" id="documents" type="text" accept="application/pdf" />
                        </form>  
                    </div>
                    
                </div>
            </div>

            <div class="hidden-print">
                <div class="pull-right">
                    <a href="{{route('dashboard')}}" class="btn btn-primary waves-effect waves-light">Retour</a>
                </div>
            </div>

            @include('_footer')
        </div>
    </div>


    @section('javascript')
    <script>
        var segments = location.href.split('/');
        var action = segments[4];
        if (action == 'dropzone') {
            var fileList = new Array;
            var i = 0;
            $("#dropzonewidget").dropzone({
                url: "import",
                addRemoveLinks: false,
                acceptedFiles: 'application/pdf',
                init: function () {
                    this.on("success", function (file, serverFileName) {
                        file.serverFn = serverFileName;
                        fileList[i] = {
                            "serverFileName": serverFileName,
                            "fileName": file.name,
                            "fileId": i
                        };
                        i++;
                    });
                }

            });
            
        }
    </script>    
    @endsection
</x-layout>