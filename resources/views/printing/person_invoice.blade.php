<!-- resources/views/personne/cv.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV de {{ $personne->nom }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .cv-container {
            width: 800px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #000000;
            padding-bottom: 10px
        }
        .header img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 1px solid #000;
            margin-right: 20px;
        }
        .header div {
            flex: 1;
        }
        .header h1{
            font-weight: 900;
        }
        .header h1, .header h2 {
            margin: 0;
        }
        .content label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        .content .field {
            border: 1px solid #000;
            padding: 8px;
            margin-top: 5px;
            width: 100%;
        }
        .table-container {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .section-title {
            font-size: 20px;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        @media print {
            .row {
                display: flex !important;
                flex-wrap: wrap !important;
            }
            .col-md-6 {
                width: 50% !important;
            }
            .col-md-12 {
                width: 100% !important;
            }
            .table-container {
                page-break-inside: avoid !important;
            }
            table {
                width: 100% !important;
                border-collapse: collapse !important;
                margin-bottom: 20px !important;
            }
            table, th, td {
                border: 1px solid black !important;
            }
        }
    </style>
</head>
<body>
    <div class="cv-container">
        <div class="header">
            <img src="{{ $personne->photo }}" alt="Photo de {{ $personne->nom }}">
            <div>
                <h1 class="mb-2 fw-bold">{{ $personne->nom }} {{ $personne->postnom }} {{ $personne->prenom }}</h1>
                <h2>NPI: {{ $personne->idnat }}</h2>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <label for="sexe">Sexe:</label>
                    <div class="field" id="sexe">{{ $personne->sexe }}</div>
                </div>
                <div class="col-md-6">
                    <label for="etat_civil">État Civil:</label>
                    <div class="field" id="etat_civil">{{ $personne->etat_civil }}</div>
                </div>
                <div class="col-md-6">
                     <label for="adresse">Adresse:</label>
                    <div class="field" id="adresse">{{ $personne->adresse }}</div>
                </div>
                <div class="col-md-6">
                    <label for="email">Email:</label>
                    <div class="field" id="email">{{ $personne->email }}</div>
                </div>
                <div class="col-md-6">
                    <label for="telephone">Téléphone:</label>
                    <div class="field" id="telephone">{{ $personne->telephone }}</div>
                </div>
                @if($personne->nbre_personne_famille)
                <div class="col-md-6">
                    <label for="nbre_personne_famille">Nombre de Personnes dans la Famille:</label>
                    <div class="field" id="nbre_personne_famille">{{ $personne->nbre_personne_famille }}</div>
                </div>
                @endif

                <div class="col-md-6">
                    <label for="province_id">Province:</label>
                    <div class="field" id="province_id">{{ $personne->province->province_libelle }}</div>
                </div>
                <div class="col-md-6">
                    <label for="territoire_id">Territoire:</label>
                    <div class="field" id="territoire_id">{{ $personne->territoire->territoire_libelle }}</div>
                </div>
                <div class="col-md-6">
                    <label for="secteur_id">Secteur:</label>
                    <div class="field" id="secteur_id">{{ $personne->secteur->secteur_libelle }}</div>
                </div>
                <div class="col-md-6">
                    <label for="chefferie_id">Chefferie:</label>
                    <div class="field" id="chefferie_id">{{ $personne->chefferie->chefferie_libelle }}</div>
                </div>
                <div class="col-md-6">
                    <label for="niveau_etude">Niveau d'Étude:</label>
                    <div class="field" id="niveau_etude">{{ $personne->niveau_etude }}</div>
                </div>
                <div class="col-md-6">
                    <label for="profession">Profession:</label>
                    <div class="field" id="profession">{{ $personne->profession }}</div>
                </div>
                <div class="col-md-6">
                    <label for="profession_institution">Institution de la Profession:</label>
                    <div class="field" id="profession_institution">{{ $personne->profession_institution }}</div>
                </div>
                <div class="col-md-6">
                    <label for="nationalite">Nationalité:</label>
                    <div class="field" id="nationalite">{{ $personne->nationalite }}</div>
                </div>

                <div class="col-md-12">
                    @if ($personne->conjoint)
                    <div class="table-container">
                        <div class="section-title">Conjoint</div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Date de Naissance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $personne->conjoint->conjoint_nom }}</td>
                                    <td>{{ $personne->conjoint->conjoint_date_naissance->format('d/m/Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($personne->enfants->count() > 0)
                    <div class="table-container">
                        <div class="section-title">Enfants</div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Date de Naissance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personne->enfants as $enfant)
                                <tr>
                                    <td>{{ $enfant->eft_nom }}</td>
                                    <td>{{ $enfant->eft_date_naissance->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($personne->membres->count() > 0)
                    <div class="table-container">
                        <div class="section-title">Membres de la Famille sous tutelle</div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Lien parental</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personne->membres as $membre)
                                <tr>
                                    <td>{{ $membre->nom_membre_famille }}</td>
                                    <td>{{ $membre->lien_parent }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($personne->etudes->count() > 0)
                    <div class="table-container">
                        <div class="section-title">Titre d'Études</div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Diplôme/Brevet</th>
                                    <th>Année</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personne->etudes as $etude)
                                <tr>
                                    <td>{{ $etude->titre_libelle }}</td>
                                    <td>{{ $etude->titre_date_obtention->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>

            </div>


        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            print();
        })
    </script>
</body>
</html>

