<div class="">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                {{--@include('chambres.show_fields')--}}
                {{--<a href="{{ route('chambres.index') }}" class="btn btn-default">Back</a>--}}
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Nom locataire</th>
                    <th>Debut du bail</th>
                    <th>Fin du bail</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $locataire->nom }}</td>
                        <td>{{ $locataire->date_entree->format('d/m/Y') }}</td>
                        <td>{{ $locataire->date_fin->format('d/m/Y') }}</td>
                        <td>{{ $locataire->tel }}</td>
                        <td>{{ $locataire->email }}</td>
                        <td>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Action <span class="fa fa-caret-down"></span>
                                </button>
                                <ul class="dropdown-menu text-blue">
                                    <li>
                                        <a href="{!! route('locataires.edit', [$locataire->id]) !!}" title="Modifier Les infos du locataire"><i class="glyphicon glyphicon-edit"></i>Modifier</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" class="" title="Imprimer Contrat"><i class="glyphicon glyphicon-print"></i>Imprimer contrat</a>
                                    </li>
                                    <li></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br><br>
    <div class="box box-info">
        <div class="box-header with-border">
            <p class="box-title">Resumé des loyers versés
            <h4 class="pull-right">
                <a class="btn btn-info pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('loyers.create', [$locataire->id]) !!}"><i class="fa fa-plus"></i> Ajouter</a>
            </h4>
        </div>
        <div class="box-body">
            <table class="table table-striped table-bordered" id="versement-table">
                <thead>
                <tr>
                    <th>Montant</th>
                    <th>Date de versement</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($locataire->loyers as $loyer)
                    <tr>
                        <td>{{ $loyer->montant }}</td>
                        <td>{{ $loyer->date_versement->format('d/m/Y') }}</td>
                        <td>{{ $loyer->debut->format('d/m/Y') }}</td>
                        <td>{{ $loyer->fin->format('d/m/Y') }}</td>
                        <td>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Action <span class="fa fa-caret-down"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="{!! route('loyers.edit', [$loyer->id]) !!}" title="Modifier Les details du versement"><i class="glyphicon glyphicon-edit"></i>Modifier</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ route('loyers.recu', [$loyer->id]) }}" class="" title="Imprimer Recu"><i class="glyphicon glyphicon-print"></i>Imprimer Recu</a>
                                    </li>
                                    <li></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        <div class="box-footer">
            <a href="{{ route('locataires.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        const app = new Vue({
            el: '#app',
            data: {
                message: "Bonjour le monde"
            }
        })
    </script>
@endpush