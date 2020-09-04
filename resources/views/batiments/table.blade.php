<div class="table-responsive">
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
                    {!! Form::open(['route' => ['batiments.destroy', $batiment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('batiments.show', [$batiment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('batiments.edit', [$batiment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
