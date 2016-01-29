<header class="valign-wrapper" style="justify-content: center;" >
        <div class="valign">
            <div class="row valign-wrapper">
                <div class="col s4 m4 l2 offset-m4 offset-l4" id="bonjour-img" style="opacity: 0;" >
                    <img src="<?= Document::file( 'assets/images/florentin.png' ) ?>" class="circle responsive-img" />
                </div>

                <div class="col s4 m4 l4" id="bonjour-text" style="opacity: 0;" >
                    <h1 class="white-text" style="width: 100%;"><?= WELCOME ?></h1>
                </div>
            </div>
        </div>
</header>

<div class="navbar-fixed" >
    <nav>
        <div class="nav-wrapper">
            <a class="button-collapse"  data-activates="mobile-nav" ><i class="material-icons">menu</i></a>

            <ul class="left hide-on-med-and-down" >
                <li class="waves-effect waves-light" ><a data-href="#me" ><i class="left material-icons">perm_identity</i><?= ABOUT_ME ?></a></li>
                <li class="waves-effect waves-light" ><a data-href="#formation" ><i class="left material-icons">done</i><?= EDUCATIONS ?></a></li>
                <li class="waves-effect waves-light" ><a data-href="#experiences" ><i class="left material-icons">work</i><?= EXPERIENCES ?></a></li>
                <li class="waves-effect waves-light" ><a data-href="#projects" ><i class="left material-icons">code</i><?= PROJECTS ?></a></li>
                <li class="waves-effect waves-light" ><a data-href="#skills" ><i class="left material-icons">settings</i><?= SKILLS ?></a></li>
                <li class="waves-effect waves-light" ><a data-href="#contact" ><i class="left material-icons">forum</i><?= CONTACT_ME ?></a></li>
            </ul>

            <ul class="side-nav" id="mobile-nav">
                <li class="waves-effect waves-light" ><a data-href="#me" ><i class="left material-icons">perm_identity</i><?= ABOUT_ME ?></a></li>
                <li class="waves-effect waves-light" ><a data-href="#formation" ><i class="left material-icons">done</i><?= EDUCATIONS ?></a></li>
                <li class="waves-effect waves-light" ><a data-href="#experiences" ><i class="left material-icons">work</i><?= EXPERIENCES ?></a></li>
                <li class="waves-effect waves-light" ><a data-href="#projects" ><i class="left material-icons">code</i><?= PROJECTS ?></a></li>
                <li class="waves-effect waves-light" ><a data-href="#skills" ><i class="left material-icons">settings</i><?= SKILLS ?></a></li>
                <li class="waves-effect waves-light" ><a data-href="#contact" ><i class="left material-icons">forum</i><?= CONTACT_ME ?></a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;" >
    <div class="btn-floating btn-large red">
        <i class="material-icons large">translate</i>
    </div>

    <ul>
        <li><a href="<?= Document::rewrite( '/portfolio/en-US/index.html' ) ?>" class="btn-floating btn-large green">En</a></li>
        <li><a href="<?= Document::rewrite( '/portfolio/fr-FR/index.html' ) ?>" class="btn-floating btn-large blue">Fr</a></li>
    </ul>
</div>

<main data-ng-app="app" >
    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/cisco-bridge.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="me" >
        <div class="container">
            <h1 class="header" ><?= ABOUT_ME ?></h1>

            <br>

            <div class="row">
                <div class="col s12 m4 l2">
                    <img src="<?= Document::file( 'assets/images/florentin.png' ) ?>" class="circle responsive-img" />
                </div>

                <div class="col s12 m8 l10">
                    <p class="text-high grey-text darken-1"><?= ME ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/graduate.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="formation" data-ng-controller="formation" >
        <div class="container">
            <h2 class="header" ><?= EDUCATIONS ?></h2>

            <br>

            <div class="card" data-ng-repeat="formation in formations" >
                <div class="card-content">
                    <h4>{{ formation.name }} <span class="right grey-text darken-1">{{ formation.date }}</span></h4>
                </div>

                <div class="card-action" >
                    <p class="text-high" data-ng-bind-html="formation.description" ></p>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/building.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="experiences" data-ng-controller="experiences" >
        <div class="container">
            <h2 class="header" ><?= EXPERIENCES ?></h2>

            <br />

            <div class="card" data-ng-repeat="experience in experiences" >
                <div class="card-content">
                    <h4>{{ experience.name }} <span class="right grey-text darken-1">{{ experience.date }}</span></h4>
                </div>

                <div class="card-action" >
                    <p class="text-high" data-ng-bind-html="experience.description" ></p>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/kiss.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="projects" data-ng-controller="project" >
        <div class="container">
            <h2 class="header" ><?= PROJECTS ?></h2>

            <br>

            <div class="card" data-ng-repeat="project in projects" >
                <div class="card-content">
                    <h4>{{ project.name }}<span class="right grey-text darken-1">{{ project.date }}</span></h4>
                </div>

                <div class="card-action" >
                    <p class="text-high" data-ng-bind-html="project.description" ></p>
                </div>
            </div>
        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="<?= Document::file( 'assets/images/computer-resize.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="skills" data-ng-controller="languages" >
        <div class="container">
            <h2 class="header" ><?= SKILLS ?></h2>
            <br />

            <h3><?= SOFTWARE ?></h3>
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

            <h3><?= WEB ?></h3>
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

            <h3><?= OPERATING_SYSTEM ?></h3>
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

            <h3><?= DATABASE_OTHERS ?></h3>
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
        <div class="parallax"><img src="<?= Document::file( 'assets/images/paper-plane.jpg' ); ?>" /></div>
    </div>

    <div class="section white" id="contact" >
        <div class="container">
            <h2 class="header" ><?= CONTACT_ME ?></h2>

            <br>

            <div class="row">
                <div class="col s12 m12 l4">
                    <div class="collection">
                        <a data-href="#contact" class="collection-item active" target="_blank" ><?= PORTFOLIO ?></a>
                        <a href="https://github.com/FlorentinDUBOIS" class="collection-item" target="_blank" ><?= GITHUB_ME ?></a>
                        <a href="https://twitter.com/FlorentinDUBOIS" class="collection-item" target="_blank" ><?= TWITTER_ME ?></a>
                    </div>
                </div>

                <div class="col s12 m12 l8">
                    <form action="<?= Document::rewrite( '/portfolio/message' ); ?>" method="post" accept-charset="utf-8" name="contact" >
                        <div class="row">
                            <div class="col s12 m6 l6 input-field">
                                <input type="text" id="firstname" name="firstname" required="required" pattern="[\w\- ]+" />
                                <label for="firstname"><?= FIRSTNAME ?></label>
                            </div>

                            <div class="col s12 m6 l6 input-field">
                                <input type="text" id="lastname" name="lastname" required="required" pattern="[\w\- ]+" />
                                <label for="lastname"><?= LASTNAME ?></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 input-field">
                                <input type="email" id="mail" name="mail" required="required" pattern="[\w\-\.]+@[\w\-]+\.[\w]{2,}" />
                                <label for="mail"><?= OUR_MAIL ?></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12 input-field">
                                <textarea name="mail-content" id="mail-content" class="materialize-textarea" required="required" ></textarea>
                                <label for="mail-content"><?= TOOK_MESSAGE ?></label>
                            </div>
                        </div>

                        <div class="g-recaptcha" data-sitekey="6Lc5zhYTAAAAAMj7TIKapvAP-fy2rOMLaIS4akb2"></div>

                        <div class="row">
                            <div class="col s12 m4 l2 offset-m8 offset-l10">
                                <button class="btn-large waves-effect waves-light" type="submit" >
                                    <?= SEND ?>
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
                    <li><a class="grey-text text-lighten-3" data-href="#me" ><?= ABOUT_ME ?></a></li>
                    <li><a class="grey-text text-lighten-3" data-href="#formation" ><?= EDUCATIONS ?></a></li>
                    <li><a class="grey-text text-lighten-3" data-href="#experiences" ><?= EXPERIENCES ?></a></li>
                    <li><a class="grey-text text-lighten-3" data-href="#projects" ><?= PROJECTS ?></a></li>
                    <li><a class="grey-text text-lighten-3" data-href="#skills" ><?= SKILLS ?></a></li>
                    <li><a class="grey-text text-lighten-3" data-href="#contact" ><?= CONTACT_ME ?></a></li>
                </ul>
            </div>

            <div class="col l3 m4 s12">
                <ul>
                    <li><a class="grey-text text-lighten-3 modal-trigger" href="#modal-mentions" ><?= LICENCE ?></a></li>
                </ul>
            </div>

            <div class="col l6 m4 s12">
                <p class="white-text" ><?= GOOD_VISIT ?></p>
            </div>
        </div>
    </div>

    <div class="footer-copyright" >
        <div class="container">
            <?= COPYRIGHT ?>
        </div>
    </div>
</footer>

<div class="modal" id="modal-mentions" >
    <div class="modal-content" >
        <h4><?= MENTIONS_LEGALES_HEADING ?></h4>
        <p><?= MENTIONS_LEGALES_CONTENT ?></p>
    </div>

    <div class="modal-footer" >
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat"><?= MENTIONS_LEGALES_OK ?></a>
    </div>
</div>

<script type="application/javascript">
    // ----------------------------------------------------------------------------
    // when document is ready
    $( window.document ).on( 'ready', function() {
        // ----------------------------------------------------------------------------
        // materialize
        $( '.button-collapse' ).sideNav();
        $( '.parallax' ).parallax();
        $( '.modal-trigger' ).leanModal();
        $( 'form[name=contact]' ).on( 'submit', function() {
            Materialize.toast( '<?= SEND_MSG ?>', 4000 );

            $this = $( this );
            $.ajax({
                url: $this.attr( 'action' ),
                method: $this.attr( 'method' ) || 'post',
                data: $this.serialize(),
                dataType: 'json',
                async: true,

                success: function( data, status, jqxhr ) {
                    Materialize.toast( '<?= SEND_OK ?>', 4000 );
                },

                error: function( jqxhr, status, error ) {
                    Materialize.toast( '<?= SEND_CAPTCHA ?>', 4000 );
                }
            });

            return false;
        });

        // ----------------------------------------------------------------------------
        // jquery animate scroll
        $( window.document ).on( 'click', 'a[data-href]', function() {
            $( $( this ).attr( 'data-href' )).animatescroll({
                padding: $( 'nav' ).height() -1,
                scrollSpeed: 2000,
                easing: 'easeOutExpo'
            });
        });

        // ----------------------------------------------------------------------------
        // animation at start up
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
    var app = angular.module( 'app', ['ngSanitize']);

    // ----------------------------------------------------------------------------
    // declare controller for languages
    app.controller( 'languages', ['$scope', '$http', function( $scope, $http ) {
        $scope.languages = [];
        $scope.webs      = [];
        $scope.OSs       = [];
        $scope.Others    = [];

        $http.get( '<?= Document::rewrite( '/portfolio/:lang/languages', $args ); ?>' ).then( function( response ) {
            $scope.languages = response.data;
        });

        $http.get( '<?= Document::rewrite( '/portfolio/:lang/webs', $args ); ?>' ).then( function( response ) {
            $scope.webs = response.data;
        });

        $http.get( '<?= Document::rewrite( '/portfolio/:lang/OSs', $args ); ?>' ).then( function( response ) {
            $scope.OSs = response.data;
        });

        $http.get( '<?= Document::rewrite( '/portfolio/:lang/others', $args ); ?>' ).then( function( response ) {
            $scope.Others = response.data;
        });
    }]);

    // ----------------------------------------------------------------------------
    // declare controller for experiences
    app.controller( 'experiences', ['$scope', '$http', function( $scope, $http ) {
        $scope.experiences = [];

        $http.get( '<?= Document::rewrite( '/portfolio/:lang/experiences', $args ); ?>' ).then( function( response ) {
            $scope.experiences = response.data;
        });
    }]);

    // ----------------------------------------------------------------------------
    // declare controller for graduation
    app.controller( 'formation', ['$scope', '$http', function( $scope, $http ) {
        $scope.formations = [];

        $http.get( '<?= Document::rewrite( '/portfolio/:lang/formations', $args ); ?>' ).then( function( response ) {
            $scope.formations = response.data;
        });
    }]);

    // ----------------------------------------------------------------------------
    // declare controller for project
    app.controller( 'project', ['$scope', '$http', function( $scope, $http ) {
        $scope.projects = [];

        $http.get( '<?= Document::rewrite( '/portfolio/:lang/projects', $args ); ?>' ).then( function( response ) {
            $scope.projects = response.data;
        });
    }]);
</script>
