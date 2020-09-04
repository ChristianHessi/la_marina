@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $locataire->nom }}
        </h1>
    </section>
    <div class="content">
        <div class="col-xs-8 col-xs-offset-2">
            @include('locataires.show_fields')
        </div>
    </div>
@endsection
