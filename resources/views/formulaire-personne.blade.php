@extends('layouts.app')

@section('content')
    <div id="form_container">
        <div class="row no-gutters">
            <div class="col-lg-3">
                <div id="left_form">
                    <figure><img src="assets/img/logo_1.png" alt="" height="120"></figure>
                    <h2>Formulaire <span>d'identification des personnnes </span></h2>

                    <a href="#0" id="more_info" data-toggle="modal" data-target="#more-info"><i
                            class="pe-7s-info"></i></a>
                </div>
            </div>
            <div class="col-lg-9">
                <div id="wizard_container">
                    <!-- /top-wizard -->
                    <form id="wrapped" method="post" action="{{ route('person.store') }}" >
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div id="middle-wizard">
                            <div class="container-fluid">
                                <h3 class="main_question ml-2"><i class="arrow_right"></i>Veuillez renseigner les champs requis !</h3>

                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                </div>
                                <div class="form-group">
                                    <label for="postnom">Post-nom</label>
                                    <input type="text" class="form-control" id="postnom" name="postnom" required>
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                                </div>
                                <div class="form-group">
                                    <label for="date_naissance">Date de Naissance</label>
                                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                                </div>

                                <div class="form-group radio_input">
                                    <label for="sexe" class="mr-3">Sexe :</label>
                                    <label class="container_radio mr-3">Masculin
                                        <input type="radio" name="sexe" value="M" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container_radio">Féminin
                                        <input type="radio" name="sexe" value="F" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="form-group radio_input">
                                    <label for="etatcivil" class="mr-3">État Civil :</label>
                                    <label class="container_radio mr-3">Célibataire
                                        <input type="radio" name="etat_civil" value="celibataire" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container_radio">Marié(e)
                                        <input type="radio" name="etat_civil" value="marié" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container_radio">Divorcé(e)
                                        <input type="radio" name="etat_civil" value="divorcé" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container_radio">Veuf(ve)
                                        <input type="radio" name="etat_civil" value="veuf" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div id="conjoints-section" class="d-none form-section">
                                    <h4>Conjoint</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="conjoint_nom">Nom du Conjoint</label>
                                            <input type="text" class="form-control" id="conjoint_nom" name="conjoints[0][conjoint_nom]">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="conjoint_date_naissance">Date de Naissance du Conjoint</label>
                                            <input type="date" class="form-control" id="conjoint_date_naissance" name="conjoints[0][conjoint_date_naissance]">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                                </div>
                                <div class="form-group">
                                    <label for="nbre_personne_famille">Nombre de Personnes dans la Famille</label>
                                    <input type="number" class="form-control" id="nbre_personne_famille" name="nbre_personne_famille">
                                </div>


                                <div id="enfants-section" class="form-section d-none">
                                    <h4>Enfants</h4>
                                    <div class="enfant-group border p-3 mb-3">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="enfant_nom">Nom de l'Enfant</label>
                                                <input type="text" class="form-control" name="enfants[0][eft_nom]">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="enfant_date_naissance">Date de Naissance de l'Enfant</label>
                                                <input type="date" class="form-control" name="enfants[0][eft_date_naissance]">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-enfant">Ajouter un Enfant</button>
                                </div>


                                <div id="famille-charges-section" class="form-section d-none">
                                    <h4>Membres de la Famille Sous Tutelle</h4>
                                    <div class="famille-charge-group border p-3 mb-3">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="famille_nom">Nom du Membre</label>
                                                <input type="text" class="form-control" name="famille_charges[0][nom_membre_famille]">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="famille_lien">Lien de Parenté</label>
                                                <input type="text" class="form-control" name="famille_charges[0][lien_parent]">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-famille-charge">Ajouter un Membre de la Famille</button>
                                </div>

                                <div class="form-group">
                                    <label for="province_id">Province</label>
                                    <select class="form-control" id="province_id" name="province_id" required>
                                        <option value="">Sélectionner une province</option>
                                        <!-- Options dynamiques -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="territoire_id">Territoire</label>
                                    <select class="form-control" id="territoire_id" name="territoire_id" required>
                                        <option value="">Sélectionner un territoire</option>
                                        <!-- Options dynamiques -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="secteur_id">Secteur</label>
                                    <select class="form-control" id="secteur_id" name="secteur_id" required>
                                        <option value="">Sélectionner un secteur</option>
                                        <!-- Options dynamiques -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="chefferie_id">Chefferie</label>
                                    <select class="form-control" id="chefferie_id" name="chefferie_id" required>
                                        <option value="">Sélectionner une chefferie</option>
                                        <!-- Options dynamiques -->
                                    </select>
                                </div>

                                <div id="etudes-section" class="form-section">
                                    <h4>Titres Académiques</h4>
                                    <div class="etude-titre-group border p-3 mb-3">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="titre_libelle">Libellé du Titre</label>
                                                <input type="text" class="form-control" name="etude_titres[0][titre_libelle]">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="titre_date_obtention">Date d'Obtention</label>
                                                <input type="date" class="form-control" name="etude_titres[0][titre_date_obtention]">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-etude-titre">Ajouter un Titre Académique</button>
                                </div>

                                <!-- /row-->
                            </div>
                            <!-- /step-->
                        </div>
                        <!-- /middle-wizard -->
                        <div style="display: flex; justify-content: end;" class="mr-2">
                            <button type="button" class="btn btn-secondary btn-lg mr-3">Annuler</button>
                            <button type="submit" name="process" class="submit">Soumettre</button>
                        </div>
                        <!-- /bottom-wizard -->
                    </form>
                </div>
                <!-- /Wizard container -->
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Form_container -->
@endsection

@section("scripts")
<script src="{{asset('assets/js/app.js') }}"></script>
@endsection
