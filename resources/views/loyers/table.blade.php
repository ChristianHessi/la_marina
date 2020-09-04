<div class="table-responsive">
    <table class="table" id="loyers-table">
        <thead>
            <tr>
                <th>Montant</th>
        <th>Date Versement</th>
        <th>Debut</th>
        <th>Fin</th>
        <th>Locataire Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($loyers as $loyer)
            <tr>
                <td>{{ $loyer->montant }}</td>
            <td>{{ $loyer->date_versement }}</td>
            <td>{{ $loyer->debut }}</td>
            <td>{{ $loyer->fin }}</td>
            <td>{{ $loyer->locataire_id }}</td>
                <td>
                    {!! Form::open(['route' => ['loyers.destroy', $loyer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('loyers.show', [$loyer->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('loyers.edit', [$loyer->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
