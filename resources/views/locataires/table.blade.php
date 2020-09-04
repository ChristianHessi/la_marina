<div class="table-responsive">
    <table class="table" id="locataires-table">
        <thead>
            <tr>
                <th>Nom</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Date Entree</th>
        <th>Actif</th>
        <th>Chambre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($locataires as $locataire)
            <tr>
                <td>{{ $locataire->nom }}</td>
            <td>{{ $locataire->tel }}</td>
            <td>{{ $locataire->email }}</td>
            <td>{{ $locataire->date_entree->format('d/m/Y') }}</td>
            <td>{{ ($locataire->actif) ? 'oui' : 'non' }}</td>
            <td>{{ $locataire->chambre->code }}</td>
                <td>
                    {!! Form::open(['route' => ['locataires.destroy', $locataire->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('locataires.show', [$locataire->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('locataires.edit', [$locataire->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
