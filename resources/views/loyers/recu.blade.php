@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Recu de Versement de Loyer
        </h1>
        <div class="row">
            <button class="btn btn-primary pull-right" onclick="imprimer('recu')">Imprimer</button>
        </div>
    </section>
    <div class="content" >
        <div >
            <div id="recu" class="box container">
                <div class="col-xs-offset-1 col-xs-10 box-body" id="recu">
                    <div id="entete">
                        <div class="text-center">
                            <h2 class="text-primary">Recu de paiement loyer</h2><br>
                            <p>Période : <b>{{ $loyer->debut->format('d/m/Y') .' au '. $loyer->fin->format('d/m/Y') }}</b></p>
                            <p>Chambre : <b>{{ $loyer->locataire->chambre->code }}</b></p>
                        </div>
                        <div class="col-xs-6 contrat text-center">
                            <h4>Proprietaire</h4>
                            <p>La Marine SCI</p>
                        </div>
                        <div class="col-xs-6 contrat text-center">
                            <h4>Locataire</h4>
                            <p>{{ $loyer->locataire->nom }}</p>
                        </div>
                    </div>
                    <div id="tableau" class="contrat col-xs-offset-2 col-xs-8">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Detail du règlement</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Loyer</td>
                                    <td>{{ $loyer->montant }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="col-xs-12">
                        <p><strong>Je soussigné M. La marine SCI, proprietaire du logement designé ci-dessus, déclare avoir recu de la part du locataire la somme mentionnée au titre du loyer</strong> </p>
                        <br><br>
                        <p>Fait a Douala le <b>{{ $loyer->date_versement->format('d/m/Y') }}</b></p>
                        <br>
                        <p class="text-right">Le bailleur <br><b>La MARINE SCI</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <style>
        #entete{
            border: #000000 solid 1px;
            margin-top: 5px;
        }
        .contrat{
            border: #000000 solid 1px;
        }
        #tableau{
            margin-top: 50px;
            padding: 0px ;
            margin-bottom: 10px;
        }
        .table{
            margin-bottom: 0px;
        }
        @media print{
            #recu{
                margin-top: 200px;
            }
        }
    </style>
@endsection
@push('scripts')
    <script>
            function imprimer(recu){
                var printContents = document.getElementById(recu).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
    </script>
@endpush