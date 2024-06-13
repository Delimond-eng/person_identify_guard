<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Magnifica Questionnaire Form Wizard includes Corona Virus Covid-19 questionnaire">
    <meta name="author" content="Ansonika">
    <title>Formulaire d'identification</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_1.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('assets/img/logo_1.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('assets/img/logo_1.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="{{ asset('assets/img/logo_1.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="{{ asset('assets/img/logo_1.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    @yield('styles')

    <!-- MODERNIZR MENU -->
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>

</head>

<body>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <a href="#"><img src="{{ asset('assets/img/drapeau_drc.png') }}" alt="" height="50"></a>
                </div>
                <div class="col-9">
                    <div id="social">
                        <ul>

                        </ul>
                    </div>
                    <!-- /social -->
                    <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
                    <!-- /menu button -->
                    <nav>
                        <ul class="cd-primary-nav">
                            <li><a href="#" class="animated_link">Formulaire d'identification citoyen</a></li>
                            <li><a href="#" class="animated_link">Formulaire d'enregistrement des vehicules</a></li>
                            <li>
                                <a href="#" class="animated_link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                    <!-- /menu -->
                </div>
            </div>
        </div>
        <!-- /container -->
    </header>
    <!-- /Header -->

    <div class="container">
        @yield('content')
    </div>
    <!-- /container -->

    <div class="container">
        <footer id="home" class="clearfix">
            <p>© 2024 Ville de Kinshasa</p>
            <ul>
                <li><a href="javascript:void(0)" class="animated_link">Questions</a></li>
                <li><a href="javascript:void(0)" class="animated_link">Termes & conditions d'utilisation</a></li>
            </ul>
        </footer>
        <!-- end footer-->
    </div>
    <!-- /container -->

    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <!-- /cd-overlay-nav -->
    <div class="cd-overlay-content">
        <span></span>
    </div>
    <!-- /cd-overlay-content -->

    <!-- Modal terms -->
    <div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>,
                        mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus,
                        pro ne quod dicunt sensibus.</p>
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                        dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                        sensibus. Lorem ipsum dolor sit amet,
                        <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores
                        id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                        sensibus.
                    </p>
                    <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                        dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                        sensibus.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal info -->
    <div class="modal fade" id="more-info" tabindex="-1" role="dialog" aria-labelledby="more-infoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="more-infoLabel">Instructions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <h4>Instructions Générales :</h4>
                    <p>Les champs marqués avec un astérisque (*) sont obligatoires et doivent être remplis avant de soumettre le formulaire.</p>
                    <p>Veuillez vous assurer que les données saisies sont exactes et dans le format demandé (par exemple, les dates doivent être au format JJ/MM/AAAA).</p>

                    <h4>Informations Personnelles :</h4>
                    <ul>
                        <li><strong>Nom, Post-nom et Prénom :</strong> Indiquez vos noms de famille et prénom(s) respectifs.</li>
                        <li><strong>Date de Naissance :</strong> Sélectionnez votre date de naissance dans le calendrier.</li>
                        <li><strong>Sexe :</strong> Choisissez votre sexe en cochant l'une des options proposées (Masculin ou Féminin).</li>
                        <li><strong>État Civil :</strong> Sélectionnez votre état civil parmi les options disponibles (Célibataire, Marié(e), Divorcé(e), Veuf(ve)).</li>
                    </ul>

                    <h4>Informations Additionnelles :</h4>
                    <ul>
                        <li><strong>Adresse :</strong> Renseignez votre adresse complète.</li>
                        <li><strong>Nombre de Personnes dans la Famille :</strong> Indiquez le nombre de personnes vivant dans votre foyer.</li>
                    </ul>

                    <h4>Conjoints :</h4>
                    <p>Si votre état civil est "Marié(e)", veuillez fournir les informations concernant votre conjoint (nom et date de naissance).</p>

                    <h4>Enfants :</h4>
                    <p>Ajoutez les informations pour chaque enfant (nom et date de naissance). Vous pouvez ajouter plusieurs enfants en cliquant sur le bouton "Ajouter un Enfant".</p>

                    <h4>Membres de la Famille Sous Tutelle :</h4>
                    <p>Si vous avez des membres de la famille sous votre tutelle, veuillez saisir leurs noms et liens de parenté. Vous pouvez ajouter plusieurs membres en cliquant sur le bouton "Ajouter un Membre de la Famille".</p>

                    <h4>Titres Académiques :</h4>
                    <p>Indiquez les titres académiques que vous avez obtenus, en fournissant le libellé du titre et la date d'obtention. Vous pouvez ajouter plusieurs titres en cliquant sur le bouton "Ajouter un Titre Académique".</p>

                    <h4>Informations Géographiques :</h4>
                    <ul>
                        <li><strong>Province, Territoire, Secteur et Chefferie :</strong> Sélectionnez les options correspondantes dans les listes déroulantes. Les options seront chargées dynamiquement en fonction de vos sélections.</li>
                    </ul>

                    <h4>Soumission du Formulaire :</h4>
                    <p>Une fois que toutes les informations requises sont correctement remplies, cliquez sur le bouton "Soumettre" pour envoyer vos données.</p>

                    <h4>Remarques :</h4>
                    <p>Assurez-vous que toutes les informations sont correctes avant de soumettre le formulaire. Une fois soumis, vos données seront enregistrées dans notre base de données de manière sécurisée.</p>
                    <p>En cas d'erreur ou de message de validation, veuillez corriger les informations indiquées avant de soumettre à nouveau le formulaire.</p>

                    <p>Merci de votre coopération et de votre attention à remplir ce formulaire avec précision.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn_1" data-dismiss="modal">Fermer</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('assets/js/velocity.min.js') }}"></script>
    <script src="{{ asset('assets/js/common_functions.js') }}"></script>

    <!-- Wizard script with branch -->
    <script src="{{ asset('assets/js/wizard_with_branch.js') }}"></script>
    @yield('scripts')
</body>

</html>
