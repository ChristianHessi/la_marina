@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
{{--            Recu de {{ $loyer->locataire->nom .'- chambre '. $loyer->locataire->chambre->code .' du '. $loyer->debut .' au '. $loyer->fin }}--}}
            Recu Locataire
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
                            <p>Période 10/08/2020 au 10/09/2020</p>
                            <p>Chambre : 302</p>
                        </div>
                        <div class="col-xs-6 contrat text-center">
                            <h4>Proprietaire</h4>
                            <p>La Marine SCI</p>
                        </div>
                        <div class="col-xs-6 contrat text-center">
                            <h4>Locataire</h4>
                            <p>Christian hessi</p>
                        </div>
                    </div>
                    <div id="tableau" class="contrat">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Detail du règlement</th>
                                    <th>Montant</th>
                                    <th>Observation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Loyer</td>
                                    <td>300000</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div>
                        <p><strong>Je soussigné M. La marine SCI, proprietaire du logement designé ci-dessus, déclare avoir recu de la part du locataire la somme mentionnée au titre du loyer</strong> </p>
                        <br><br>
                        <p>Fait a Douala le 10/08/2020</p>
                        <br>
                        <p class="text-right">Le bailleur <br>La MARINE SCI</p>
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
            margin-top: 100px;

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