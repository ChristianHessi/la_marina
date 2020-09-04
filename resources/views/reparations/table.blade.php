<div class="table-responsive">
    <table class="table" id="reparations-table">
        <thead>
            <tr>
                <th>Motif</th>
        <th>Date</th>
        <th>Montant</th>
        <th>Observations</th>
        <th>Chambre Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reparations as $reparation)
            <tr>
                <td>{{ $reparation->motif }}</td>
            <td>{{ $reparation->date }}</td>
            <td>{{ $reparation->montant }}</td>
            <td>{{ $reparation->observations }}</td>
            <td>{{ $reparation->chambre_id }}</td>
                <td>
                    {!! Form::open(['route' => ['reparations.destroy', $reparation->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('reparations.show', [$reparation->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('reparations.edit', [$reparation->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
