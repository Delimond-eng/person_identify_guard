@extends('layouts.ui')
@section('content')
    <div class="container">
        <!-- Start::row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body p-0 product-checkout">
                        <ul class="nav nav-tabs tab-style-2 d-sm-flex d-block border-bottom border-block-end-dashed" id="myTab1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="personal-tab" data-bs-toggle="tab"
                                    data-bs-target="#personal-tab-pane" type="button" role="tab"
                                    aria-controls="personal-tab" aria-selected="true"><i
                                        class="ri-user-2-fill me-2 align-middle"></i>Infos personnelles</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="study-tab" data-bs-toggle="tab"
                                    data-bs-target="#study-tab-pane" type="button" role="tab"
                                    aria-controls="study-tab" aria-selected="true"><i
                                        class="bx bxs-graduation me-2 align-middle"></i>Etudes faites</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="photo-tab" data-bs-toggle="tab"
                                    data-bs-target="#photo-tab-pane" type="button" role="tab"
                                    aria-controls="photo-tab" aria-selected="false"><i
                                        class="ri-camera-2-fill me-2 align-middle"></i>Capture photos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="family-tab" data-bs-toggle="tab"
                                    data-bs-target="#family-tab-pane" type="button" role="tab"
                                    aria-controls="family-tab" aria-selected="false"><i
                                        class="ri-group-fill me-2 align-middle"></i>Charge familliale</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active border-0 p-0" id="personal-tab-pane" role="tabpanel"
                                aria-labelledby="personal-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">01</p>
                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div>Infos personnelles </div>
                                    </div>
                                    <div class="row gy-4 mb-4">
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="fullname-add" placeholder="Nom" name="nom" required>
                                                <label for="fullname-add">Nom</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="postnom-add" placeholder="Post-nom" name="postnom" required>
                                                <label for="postnom-add">Post-nom</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="prenom-add" placeholder="Prénom" name="prenom" required>
                                                <label for="prenom-add">Prénom</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="email-add" placeholder="Email" name="email" required>
                                                <label for="email-add">Email (optionnel)</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <input type="tel" class="form-control" id="telephone-add" placeholder="Téléphone" name="telephone" required>
                                                <label for="telephone-add">Téléphone</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <input type="date" class="form-control" id="date_naissance-add" placeholder="Date de Naissance" name="date_naissance" required>
                                                <label for="date_naissance-add">Date de Naissance</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="sexe-add" class="form-label">Sexe *</label>
                                            <div>
                                                <label class="container_radio">Masculin
                                                    <input type="radio" name="sexe" value="M" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="container_radio">Féminin
                                                    <input type="radio" name="sexe" value="F" class="required">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="etatcivil-add" class="form-label">État Civil :</label>
                                            <div>
                                                <label class="container_radio">Célibataire
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
                                        </div>
                                         <div class="col-xl-12 d-none" id="conjoints-section">
                                            <div  class="card custom-card border shadow-none mb-3">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        Conjoint *
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row gy-3">
                                                        <div class="col-xl-6">
                                                            <div class="form-floating">
                                                                <label for="conjoint_nom" class="form-label">Nom du Conjoint *</label>
                                                                <input type="text" placeholder="entrez le nom du conjoint..." class="form-control" id="conjoint_nom" name="conjoints[0][conjoint_nom]">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control" id="conjoint_date_naissance-add" placeholder="Date de Naissance" name="conjoints[0][conjoint_date_naissance]">
                                                                <label for="conjoint_date_naissance-add">Date de Naissance</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <select class="form-control" id="province_id" name="province_id" required>
                                                    <option value="">Sélectionner une province</option>
                                                    <!-- Options dynamiques -->
                                                </select>
                                                <label for="province_id">Province *</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <select class="form-control" id="territoire_id" name="territoire_id" required>
                                                    <option value="">Sélectionner un territoire</option>
                                                    <!-- Options dynamiques -->
                                                </select>
                                                <label for="territoire_id">Territoire *</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <select class="form-control" id="secteur_id" name="secteur_id" required>
                                                    <option value="">Sélectionner un secteur</option>
                                                    <!-- Options dynamiques -->
                                                </select>
                                                <label for="secteur_id">Secteur *</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <select class="form-control" id="chefferie_id" name="chefferie_id" required>
                                                    <option value="">Sélectionner une chefferie</option>
                                                    <!-- Options dynamiques -->
                                                </select>
                                                <label for="chefferie_id">Chefferie *</label>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <input type="text" placeholder="entrez l'emploi actuel" class="form-control" id="profession" name="profession">
                                                <label for="profession">Emploi actuel(optionnel)</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-floating">
                                                <input type="text" placeholder="entrez le nom de l'institution..." class="form-control" id="institution" name="profession_institution" required>
                                                <label for="institution">Lieu de travail(Entreprise ou institution) </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-floating">
                                                <textarea  placeholder="entrez l'adresse actuel... ex: n°04, av..., q..., c..." class="form-control" id="adresse-add" name="adresse" required></textarea>
                                                <label for="adresse-add">Adresse actuelle *</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <button type="button" class="btn btn-primary" id="personal-next-trigger">Suvant<i class="ri-arrow-right-line ms-2 align-middle d-inline-block"></i></button>
                                </div>
                            </div>
                            <div class="tab-pane fade border-0 p-0" id="study-tab-pane" role="tabpanel"
                                aria-labelledby="study-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">02</p>
                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div>Etudes faites(optionnel)</div>
                                    </div>
                                    <div class="row gy-4 mb-4">

                                        <div class="col-xl-12">
                                            <div id="enfants-section" class="card custom-card border shadow-none mb-3">
                                                <div class="card-header d-flex justify-content-between w-100">
                                                    <div class="card-title">
                                                        Enfants *
                                                    </div>
                                                    <button type="button" class="btn btn-primary btn-sm" id="add-etude-titre">
                                                        <i class="ri-add-line me-1 align-middle fs-14 fw-semibold d-inline-block"></i>
                                                        Ajouter titre
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row gy-3" id="enfants-list">
                                                        <!-- Dynamic children sections will be appended here -->
                                                        <div class="col-xl-6 enfant-group section-group" id="enfant-0">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" placeholder="entrez le libellé du titre..." class="form-control" name="etude_titres[0][titre_libelle]">
                                                                <label for="titre_libelle">Libellé du Titre</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 enfant-group section-group" id="enfant-0">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control" name="etude_titres[0][titre_date_obtention]">
                                                                <label for="titre_date_obtention">Date d'Obtention</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-between">
                                    <button type="button" class="btn btn-primary-light m-1" id="back-study-trigger"><i class="ri-arrow-left-line me-2 align-middle d-inline-block"></i>Précédent</button>
                                    <button type="button" class="btn btn-primary m-1" id="study-next-trigger">Suivant<i class="ri-arrow-right-line align-middle ms-2 d-inline-block"></i></button>
                                </div>
                            </div>
                            <div class="tab-pane fade border-0 p-0" id="photo-tab-pane"
                                role="tabpanel" aria-labelledby="photo-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <div class="p-5 checkout-payment-success my-3">
                                        <p class="mb-1 fw-semibold text-muted op-5 fs-20">03</p>
                                        <div class="mb-5">
                                            <h5 class="text-primary fw-semibold">Capturez la photo</h5>
                                        </div>
                                        <div class="mb-5">
                                            <div class="row d-flexn justify-content-center align-items-center">
                                                <div class="col-md-3">
                                                    <div class="photo-picker" id="photo-picker" style="position: relative;">
                                                        <video id="video-preview" style="border-radius: 5px; position: relative; cursor: pointer;" height="150" class="d-none img-fluid" autoplay></video>
                                                        <img id="photo-preview" style="border-radius: 5px; position: relative; width: 100%; cursor: pointer;" height="150" class="img-fluid" src="{{ asset('assets/img/camera-placeholder.jpg') }}">

                                                        <button type="button" id="capture-btn" class="btn btn-outline-primary btn-sm w-100 mt-3">
                                                            <i class="ri-camera-2-line me-1"></i>Lancer caméra
                                                        </button>
                                                        <label for="photo" class="btn btn-outline-dark btn-sm w-100 mt-2">
                                                            <i class="ri-attachment-2 me-1"></i>Charger photo
                                                        </label>
                                                        <input type="file" id="photo" name="photo" style="visibility: hidden">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-between">
                                    <button type="button" class="btn btn-primary-light m-1" id="back-photo-trigger"><i class="ri-arrow-left-line me-2 align-middle d-inline-block"></i>Précédeent</button>
                                    <button type="button" class="btn btn-primary m-1" id="photo-next-trigger">Suivant<i class="ri-arrow-right-line align-middle ms-2 d-inline-block"></i></button>
                                </div>
                            </div>
                            <div class="tab-pane fade border-0 p-0" id="family-tab-pane" role="tabpanel"
                                aria-labelledby="family-tab-pane" tabindex="0">
                                <div class="p-4">
                                    <p class="mb-1 fw-semibold text-muted op-5 fs-20">04</p>
                                    <div class="fs-15 fw-semibold d-sm-flex d-block align-items-center justify-content-between mb-3">
                                        <div>Charge familliale</div>
                                    </div>

                                    <div class="row gy-4 mb-4">
                                        <div class="col-xl-12">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" placeholder="entrez le nombre des personnes qui composent la famille..." id="nbre_personne_famille" name="nbre_personne_famille">
                                                <label for="nbre_personne_famille">Nombre de Personnes dans la Famille(optionnel)</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div id="enfants-section" class="card custom-card border shadow-none mb-3">
                                                <div class="card-header d-flex justify-content-between w-100">
                                                    <div class="card-title">
                                                        Enfants *
                                                    </div>
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        <i class="ri-add-line me-1 align-middle fs-14 fw-semibold d-inline-block"></i>
                                                        Ajouter enfant
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row gy-3" id="enfants-list">
                                                        <!-- Dynamic children sections will be appended here -->
                                                        <div class="col-xl-6 enfant-group section-group" id="enfant-0">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="enfant_nom-0" placeholder="entrez le nom complet de l'enfant..." name="enfants[0][eft_nom]">
                                                                <label for="enfant_nom-0">Nom de l'Enfant</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 enfant-group section-group" id="enfant-0">
                                                            <div class="form-floating">
                                                                <input type="date" class="form-control" id="enfant_date_naissance-0" placeholder="Date de Naissance" name="enfants[0][eft_date_naissance]">
                                                                <label for="enfant_date_naissance-0">Date de Naissance de l'Enfant</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div id="enfants-section" class="card custom-card border shadow-none mb-3">
                                                <div class="card-header d-flex justify-content-between w-100">
                                                    <div class="card-title">
                                                        Membres de la Famille Sous Tutelle *
                                                    </div>
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        <i class="ri-add-line me-1 align-middle fs-14 fw-semibold d-inline-block"></i>
                                                        Ajouter membre
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row gy-3" id="enfants-list">
                                                        <!-- Dynamic children sections will be appended here -->
                                                        <div class="col-xl-6 enfant-group section-group" id="enfant-0">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" placeholder="entrez le nom du membre de la famille..." class="form-control" name="famille_charges[0][nom_membre_famille]">
                                                                <label for="famille_nom">Nom du Membre</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 enfant-group section-group" id="enfant-0">
                                                            <div class="form-floating">
                                                                <select class="form-select" name="famille_charges[0][lien_parent]" id="famille_lien">
                                                                    <option value="Parent">Parent</option>
                                                                    <option value="Frère">Frère</option>
                                                                    <option value="Soeur">Soeur</option>
                                                                    <option value="Cousin">Cousin(e)</option>
                                                                    <option value="Ami">Ami(e)</option>
                                                                    <option value="Autre">Autre</option>
                                                                </select>
                                                                <label for="famille_lien">Lien de Parenté</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-between">
                                    <button type="button" class="btn btn-primary-light m-1" id="back-family-trigger"><i class="ri-arrow-left-line me-2 align-middle d-inline-block"></i>Précédent</button>
                                    <button type="button" class="btn btn-success m-1">Sauvegarder<i class="ri-check-double-fill align-middle ms-2 d-inline-block"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End::row-1 -->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets2/js/app.js') }}"></script>
    <script src="{{ asset('assets2/js/tab_manager.js') }}"></script>
@endsection
