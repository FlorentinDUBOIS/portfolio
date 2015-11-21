<header class="valign-wrapper" style="justify-content: center;" >
        <div class="valign">
            <div class="row valign-wrapper">
                <div class="col s4 m4 l2 offset-s4 offset-m4 offset-l4" id="bonjour-img" style="opacity: 0;" >
                    <img src="<?= Document::file( 'assets/images/florentin.png' ) ?>" class="circle responsive-img" />
                </div>

                <div class="col s4 m4 l4" id="bonjour-text" style="opacity: 0;" >
                    <h1 class="white-text" style="width: 100%;">Bonjour !</h1>
                </div>
            </div>
        </div>
</header>

<div> <!-- class="navbar-fixed" | & décider si le menu doit etre fixe -->
    <nav>
        <div class="nav-wrapper">
            <a class="button-collapse" data-activates="mobile-nav" ><i class="material-icons">menu</i></a>

            <ul class="left hide-on-med-and-down" >
                <li class="waves-effect waves-light" ><a href="#me" ><i class="left material-icons">perm_identity</i>A propos de moi</a></li>
                <li class="waves-effect waves-light" ><a href="#skills" ><i class="left material-icons">settings</i>Mes compétences</a></li>
                <li class="waves-effect waves-light" ><a href="#experiences" ><i class="left material-icons">work</i>Mes expériences</a></li>
                <li class="waves-effect waves-light" ><a href="#projects" ><i class="left material-icons">code</i>Projets</a></li>
                <li class="waves-effect waves-light" ><a href="#formation" ><i class="left material-icons">done</i>Formations</a></li>
                <li class="waves-effect waves-light" ><a href="#contact" ><i class="left material-icons">forum</i>Me contacter</a></li>
            </ul>

            <ul class="side-nav" id="mobile-nav">
                <li class="waves-effect waves-light" ><a href="#me" ><i class="left material-icons">perm_identity</i>A propos de moi</a></li>
                <li class="waves-effect waves-light" ><a href="#skills" ><i class="left material-icons">settings</i>Mes compétences</a></li>
                <li class="waves-effect waves-light" ><a href="#experiences" ><i class="left material-icons">work</i>Mes expériences</a></li>
                <li class="waves-effect waves-light" ><a href="#projects" ><i class="left material-icons">code</i>Projets</a></li>
                <li class="waves-effect waves-light" ><a href="#formation" ><i class="left material-icons">done</i>Formations</a></li>
                <li class="waves-effect waves-light" ><a href="#contact" ><i class="left material-icons">forum</i>Me contacter</a></li>
            </ul>
        </div>
    </nav>
</div>

<main data-ng-app="app" >
    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/cisco-bridge.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="me" >
        <div class="container">
            <h1 class="header" >A propos de moi</h1>

            <br>

            <div class="row">
                <div class="col s12 m4 l2">
                    <img src="<?= Document::file( 'assets/images/florentin.png' ) ?>" class="circle responsive-img" />
                </div>

                <div class="col s12 m8 l10">
                    <p class="text-high grey-text darken-1">Salut !</p>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/computer-resize.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="skills" data-ng-controller="languages" >
        <div class="container">
            <h2 class="header" >Mes compétences</h2>
            <br />

            <h3>Logiciel</h3>
            <div class="divider"></div>

            <div class="row">
                <div class="col s12 m4 l3" data-ng-repeat="language in languages" >
                    <div class="card">
                        <div class="card-image waves-effect waves-block">
                            <img src="{{ language.image }}" class="activator">
                        </div>

                        <div class="card-content">
                            <h4 class="card-title activator" >{{ language.header }}</h4>
                        </div>

                        <div class="card-reveal">
                            <h4 class="card-title grey-text text-darken-4" >{{ language.header }}<i class="material-icons right grey-text text-darken-4">close</i></h4>
                            <div data-ng-bind-html="language.comment" ></div>
                        </div>
                    </div>
                </div>
            </div>

            <br />

            <h3>Web</h3>
            <div class="divider"></div>

            <div class="row">
                <div class="col s12 m4 l3" data-ng-repeat="language in webs" >
                    <div class="card">
                        <div class="card-image waves-effect waves-block">
                            <img src="{{ language.image }}" class="activator">
                        </div>

                        <div class="card-content">
                            <h4 class="card-title activator" >{{ language.header }}</h4>
                        </div>

                        <div class="card-reveal">
                            <h4 class="card-title grey-text text-darken-4" >{{ language.header }}<i class="material-icons right grey-text text-darken-4">close</i></h4>
                            <div data-ng-bind-html="language.comment" ></div>
                        </div>
                    </div>
                </div>
            </div>

            <br />

            <h3>Système d'exploitation</h3>
            <div class="divider"></div>

            <div class="row">
                <div class="col s12 m4 l3" data-ng-repeat="os in OSs" >
                    <div class="card">
                        <div class="card-image waves-effect waves-block">
                            <img src="{{ os.image }}" class="activator">
                        </div>

                        <div class="card-content">
                            <h4 class="card-title activator" >{{ os.header }}</h4>
                        </div>

                        <div class="card-reveal">
                            <h4 class="card-title grey-text text-darken-4" >{{ os.header }}<i class="material-icons right grey-text text-darken-4">close</i></h4>
                            <div data-ng-bind-html="os.comment" ></div>
                        </div>
                    </div>
                </div>
            </div>

            <br />

            <h3>Base de données et autres</h3>
            <div class="divider"></div>

            <div class="row">
                <div class="col s12 m4 l3" data-ng-repeat="other in Others" >
                    <div class="card">
                        <div class="card-image waves-effect waves-block">
                            <img src="{{ other.image }}" class="activator">
                        </div>

                        <div class="card-content">
                            <h4 class="card-title activator" >{{ other.header }}</h4>
                        </div>

                        <div class="card-reveal">
                            <h4 class="card-title grey-text text-darken-4" >{{ other.header }}<i class="material-icons right grey-text text-darken-4">close</i></h4>
                            <div data-ng-bind-html="other.comment" ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/building.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="experiences" data-ng-controller="experiences" >
        <div class="container">
            <h2 class="header" >Mes expériences</h2>

            <br />

            <div class="card" data-ng-repeat="experience in experiences" >
                <div class="card-content">
                    <h4>{{ experience.name }} <span class="right grey-text darken-1">{{ experience.date }}</span></h4>
                </div>

                <div class="card-action" data-ng-bind-html="experience.description" ></div>
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/kiss.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="projects" data-ng-controller="project" >
        <div class="container">
            <h2 class="header" >Projets</h2>

            <br>

            <ul class="collapsible popout" data-collapsible="expandable" >
                <li data-ng-repeat="project in projects" >
                    <div class="collapsible-header">{{ project.name }} <span class="right">{{ project.date }}</span></div>
                    <div class="collapsible-body" data-ng-bind-html="project.description" ></div>
                </li>
            </ul>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/graduate.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="formation" data-ng-controller="formation" >
        <div class="container">
            <h2 class="header" >Formations</h2>

            <br>

            <div class="card" data-ng-repeat="formation in formations" >
                <div class="card-content">
                    <h4>{{ formation.name }} <span class="right grey-text darken-1">{{ formation.date }}</span></h4>
                </div>

                <div class="card-action" data-ng-bind-html="formation.description" ></div>
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/paper-plane.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="contact" >
        <div class="container">
            <h2 class="header" >Me contacter</h2>

            <br>

            <div class="row">
                <div class="col s12 m4 l4">
                    <div class="collection">
                        <a href="#contact" class="collection-item active">Portfolio</a>
                        <a href="https://github.com/FlorentinDUBOIS" class="collection-item">Github - FlorentinDUBOIS</a>
                        <a href="https://twitter.com/FlorentinDUBOIS" class="collection-item">Twitter - @FlorentinDUBOIS</a>
                    </div>
                </div>

                <div class="col s12 m8 l8">
                    <form action="<?= Document::rewrite( '/portfolio/message' ); ?>" method="post" accept-charset="utf-8" name="contact" >
                        <div class="row">
                            <div class="col s12 m6 l6 input-field">
                                <input type="text" id="firstname" name="firstname" required="required" pattern="[\w\- ]+" />
                                <label for="firstname">Prénom</label>
                            </div>

                            <div class="col s12 m6 l6 input-field">
                                <input type="text" id="lastname" name="lastname" required="required" pattern="[\w\- ]+" />
                                <label for="lastname">Nom</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 input-field">
                                <input type="email" id="mail" name="mail" required="required" pattern="[\w\-\.]+@[\w\-]+\.[\w]{2,}" />
                                <label for="mail">Votre courriel</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 input-field">
                                <textarea name="mail-content" id="mail-content" class="materialize-textarea" required="required" ></textarea>
                                <label for="mail-content">Laissez-moi un message</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m4 l2 offset-m8 offset-l10">
                                <button class="btn-large waves-effect waves-light" type="submit" >
                                    Envoyer
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/planet.jpg' ); ?>" /></div>
    </div>
</main>

<footer class="page-footer" >
    <div class="container">
        <div class="row">
            <div class="col l3 m4 s12">
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#me" >A propos</a></li>
                    <li><a class="grey-text text-lighten-3" href="#skills" >Mes compétences</a></li>
                    <li><a class="grey-text text-lighten-3" href="#experiences" >Mes expériences</a></li>
                    <li><a class="grey-text text-lighten-3" href="#projects" >Projets</a></li>
                    <li><a class="grey-text text-lighten-3" href="#formation" >Formations</a></li>
                    <li><a class="grey-text text-lighten-3" href="#contact" >Me contacter</a></li>
                </ul>
            </div>

            <div class="col l3 m4 s12">
                <ul>
                    <li><a class="grey-text text-lighten-3" href="<?= Document::rewrite( '/portfolio/sitemap', $args ); ?>" >Carte du site</a></li>
                    <li><a class="grey-text text-lighten-3" href="<?= Document::rewrite( '/portfolio/mentions', $args ); ?>" >Mentions légales</a></li>
                </ul>
            </div>

            <div class="col l6 m4 s12">
                <p class="white-text" >Je vous souhaite une bonne visite sur mon portfolio.<br />N'hésitez pas à me laisser un message</p>
            </div>
        </div>
    </div>

    <div class="footer-copyright" >
        <div class="container">
            © <?= date( 'Y' ) ?> Copyright Florentin DUBOIS
        </div>
    </div>
</footer>

<script type="application/javascript">
    // ----------------------------------------------------------------------------
    // when document is ready
    $( window.document ).on( 'ready', function() {
        $( '.button-collapse' ).sideNav();
        $( '.parallax' ).parallax();
        $( 'form[name=contact]' ).on( 'submit', function() {
            Materialize.toast( 'Envoie du message', 4000 );

            $this = $( this );
            $.ajax({
                url: $this.attr( 'action' ),
                method: $this.attr( 'method' ) || 'post',
                data: $this.serialize(),
                dataType: 'json',
                async: true,

                complete: function( jqxhr, status ) {
                    Materialize.toast( 'Message envoyé', 4000 );
                },
            });

            return false;
        });

        setTimeout( function() {
            $( '#bonjour-img' ).animate({
                opacity: '1'
            });

            setTimeout( function() {
                $( '#bonjour-text' ).animate({
                    opacity: '1'
                });

                setTimeout( function() {
                    $( 'header' ).animate({
                        top: '-100%'
                    }, 1000, 'swing', function() {
                        $( 'header' ).css({
                            display: 'none'
                        });
                    });

                }, 1500 );
            }, 500 );
        }, 500 );
    });

    // ----------------------------------------------------------------------------
    // declaration of module
    var app = angular.module( 'app', []);

    // ----------------------------------------------------------------------------
    // declare controller for languages
    app.controller( 'languages', ['$scope', '$http', function( $scope, $http ) {
        $scope.languages = [];
        $scope.webs      = [];
        $scope.OSs       = [];
        $scope.Others    = [];

        $http.get( '<?= Document::rewrite( '/portfolio/languages', $args ); ?>' ).then( function( response ) {
            $scope.languages = response.data;
        });

        $http.get( '<?= Document::rewrite( '/portfolio/webs', $args ); ?>' ).then( function( response ) {
            $scope.webs = response.data;
        });

        $http.get( '<?= Document::rewrite( '/portfolio/OSs', $args ); ?>' ).then( function( response ) {
            $scope.OSs = response.data;
        });

        $http.get( '<?= Document::rewrite( '/portfolio/others', $args ); ?>' ).then( function( response ) {
            $scope.Others = response.data;
        });
    }]);

    // ----------------------------------------------------------------------------
    // declare controller for experiences
    app.controller( 'experiences', ['$scope', '$http', function( $scope, $http ) {
        $scope.experiences = [];

        $http.get( '<?= Document::rewrite( '/portfolio/experiences', $args ); ?>' ).then( function( response ) {
            $scope.experiences = response.data;
        });
    }]);

    // ----------------------------------------------------------------------------
    // declare controller for graduation
    app.controller( 'formation', ['$scope', '$http', function( $scope, $http ) {
        $scope.formations = [];

        $http.get( '<?= Document::rewrite( '/portfolio/formations', $args ); ?>' ).then( function( response ) {
            $scope.formations = response.data;
        });
    }]);

    // ----------------------------------------------------------------------------
    // declare controller for project
    app.controller( 'project', ['$scope', '$http', function( $scope, $http ) {
        $scope.projects = [];

        $http.get( '<?= Document::rewrite( '/portfolio/projects', $args ); ?>' ).then( function( response ) {
            $scope.projects = response.data;
        });
    }]);
</script>
