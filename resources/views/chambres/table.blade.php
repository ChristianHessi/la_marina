<div class="table-responsive">
    <table class="table" id="chambres-table">
        <thead>
            <tr>
                <th>Code</th>
        <th>Etage</th>
        <th>Montant Loyer</th>
        <th>Description</th>
        <th>Batiment Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($chambres as $chambre)
            <tr>
                <td>{{ $chambre->code }}</td>
            <td>{{ $chambre->etage }}</td>
            <td>{{ $chambre->montant_loyer }}</td>
            <td>{{ $chambre->description }}</td>
            <td>{{ $chambre->batiment->nom }}</td>
                <td>
                    {!! Form::open(['route' => ['chambres.destroy', $chambre->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('chambres.show', [$chambre->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('chambres.edit', [$chambre->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
