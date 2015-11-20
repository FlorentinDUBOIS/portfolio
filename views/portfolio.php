<header>
    <nav>
        <div class="nav-wrapper">
            <a class="button-collapse" data-activates="mobile-nav" ><i class="material-icons">menu</i></a>

            <ul class="left hide-on-med-and-down" >
                <li class="waves-effect waves-light" ><a href="#me" ><i class="left material-icons">perm_identity</i>A propos de moi</a></li>
                <li class="waves-effect waves-light" ><a href="#skills" ><i class="left material-icons">settings</i>Mes compétences</a></li>
                <li class="waves-effect waves-light" ><a href="#experiences" ><i class="left material-icons">work</i>Mes expériences</a></li>
                <li class="waves-effect waves-light" ><a href="#projects" ><i class="left material-icons">code</i>Projets</a></li>
                <li class="waves-effect waves-light" ><a href="#graduate" ><i class="left material-icons">done</i>Diplômes</a></li>
                <li class="waves-effect waves-light" ><a href="#contact" ><i class="left material-icons">forum</i>Me contacter</a></li>
            </ul>

            <ul class="side-nav" id="mobile-nav">
                <li class="waves-effect waves-light" ><a href="#me" ><i class="left material-icons">perm_identity</i>A propos de moi</a></li>
                <li class="waves-effect waves-light" ><a href="#skills" ><i class="left material-icons">settings</i>Mes compétences</a></li>
                <li class="waves-effect waves-light" ><a href="#experiences" ><i class="left material-icons">work</i>Mes expériences</a></li>
                <li class="waves-effect waves-light" ><a href="#projects" ><i class="left material-icons">code</i>Projets</a></li>
                <li class="waves-effect waves-light" ><a href="#graduate" ><i class="left material-icons">done</i>Diplômes</a></li>
                <li class="waves-effect waves-light" ><a href="#contact" ><i class="left material-icons">forum</i>Me contacter</a></li>
            </ul>
        </div>
    </nav>
</header>

<main data-ng-app="app" >
    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/cisco-bridge.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="me" >
        <div class="container">
            <h1 class="header" >A propos de moi</h1>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/cloud-bit.png' ); ?>" /></div>
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
                        <div class="card-image waves-effect waves-block waves-light">
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
                        <div class="card-image waves-effect waves-block waves-light">
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
                        <div class="card-image waves-effect waves-block waves-light">
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

            <h3>Data, cloud and others</h3>
            <div class="divider"></div>

            <div class="row">
                <div class="col s12 m4 l3" data-ng-repeat="other in Others" >
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
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
        <div class="parallax"><img src="<?= Document::file( 'assets/images/computer-resize.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="experiences">
        <div class="container">
            <h2 class="header" >Mes expériences</h2>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/kiss.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="projects" >
        <div class="container">
            <h2 class="header" >Projets</h2>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/paper-plane.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="contact" >
        <div class="container">
            <h2 class="header" >Me contacter</h2>
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
                    <li><a class="grey-text text-lighten-3" href="#graduate" >Diplômes</a></li>
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
    // when document is ready
    $( window.document ).on( 'ready', function() {
        $( '.button-collapse' ).sideNav();
        $( '.parallax' ).parallax();
    });

    // declaration of module
    var app = angular.module( 'app', []);

    // declare controller
    app.controller( 'languages', ['$scope', '$http', function( $scope, $http ) {
        $scope.languages = [];
        $scope.webs      = [];
        $scope.OSs       = [];
        $scope.Others    = [];

        $http.get( '<?= Document::rewrite( '/portfolio/languages', $args ); ?>' ).then( function( response ) {
            $scope.languages = response.data;
        });

        $http.get( '<?= Document::rewrite( '/portfolio/webs', $args ); ?>' ).then( function( response ) {
            $scope.webs  = response.data;
        });

        $http.get( '<?= Document::rewrite( '/portfolio/OSs', $args ); ?>' ).then( function( response ) {
            $scope.OSs  = response.data;
        });

        $http.get( '<?= Document::rewrite( '/portfolio/others', $args ); ?>' ).then( function( response ) {
            $scope.Others  = response.data;
        });
    }]);
</script>
