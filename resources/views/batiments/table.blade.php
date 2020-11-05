<div class="">
    <table class="table" id="batiments-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($batiments as $batiment)
            <tr>
                <td>{{ $batiment->nom }}</td>
            <td>{{ $batiment->adresse }}</td>
            <td>{{ $batiment->description }}</td>
            <td>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-info dropdown-toggle pull-right" data-toggle="dropdown" aria-expanded="false">
                        Action <span class="fa fa-caret-down"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="{{ route('batiments.edit', $batiment->id) }}" title="Modifier les détails du batiment"><i class="ion ion-edit"></i>Modifier</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('reparations.create', [2,$batiment->id]) }}" class="" title="Ajouter Depenses"><i class="ion ion-cash"></i></i>Ajouter dépense</a>
                        </li>
                        <li class="divider"></li>
                        <li class="text-center">
                            {!! Form::button('<i class="glyphicon glyphicon-trash text-danger"></i> Effacer', ['type' => 'submit', 'class' => 'btn btn-link', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </li>
                    </ul>
                </div>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
