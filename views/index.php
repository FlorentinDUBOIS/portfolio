<header>

</header>

<nav>
    <div class="nav-wrapper">
        <a class="button-collapse" data-activates="mobile-nav" ><i class="material-icons">menu</i></a>

        <ul class="left hide-on-med-and-down" >
            <li class="waves-effect waves-light" ><a href="#me" ><i class="left material-icons">perm_identity</i>A propos</a></li>
            <li class="waves-effect waves-light" ><a href="#skills" ><i class="left material-icons">settings</i>Mes compétences</a></li>
            <li class="waves-effect waves-light" ><a href="#projects" ><i class="left material-icons">code</i>Mes projets</a></li>
            <li class="waves-effect waves-light" ><a href="#contact" ><i class="left material-icons">forum</i>Me contacter</a></li>
        </ul>

        <ul class="side-nav" id="mobile-nav">
            <li style="width: 100%;" class="waves-effect waves-light" ><a href="#me" ><i class="left material-icons">perm_identity</i>A propos</a></li>
            <li style="width: 100%;" class="waves-effect waves-light" ><a href="#skills" ><i class="left material-icons">settings</i>Mes compétences</a></li>
            <li style="width: 100%;" class="waves-effect waves-light" ><a href="#projects" ><i class="left material-icons">code</i>Mes projets</a></li>
            <li style="width: 100%;" class="waves-effect waves-light" ><a href="#contact" ><i class="left material-icons">forum</i>Me contacter</a></li>
        </ul>
    </div>
</nav>

<main>
    <div class="parallax-container">
        <div class="parallax"><img src="assets/images/cisco-bridge.jpg" /></div>
    </div>

    <div class="section white" id="me" >
        <div class="row container">

        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="assets/images/cloud-bit.png" /></div>
    </div>

    <div class="section white" id="skills">
        <div class="row container">

        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="assets/images/kiss.jpg" /></div>
    </div>

    <div class="section white" id="projects" >
        <div class="row container">

        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="assets/images/paper-plane.jpg" /></div>
    </div>

    <div class="section white" id="contact" >
        <div class="row container">

        </div>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="assets/images/planet.jpg" /></div>
    </div>
</main>

<footer class="page-footer" style="margin-top: 0;" >
    <div class="container">
        <div class="row">
            <div class="col l3 m4 s12">
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#me" >A propos</a></li>
                    <li><a class="grey-text text-lighten-3" href="#skills" >Mes compétences</a></li>
                    <li><a class="grey-text text-lighten-3" href="#projects" >Mes projets</a></li>
                    <li><a class="grey-text text-lighten-3" href="#contact" >Me contacter</a></li>
                </ul>
            </div>

            <div class="col l3 m4 s12">
                <ul>
                    <li><a class="grey-text text-lighten-3" href=".?url=/portfolio/sitemap" >Carte du site</a></li>
                    <li><a class="grey-text text-lighten-3" href=".?url=/portfolio/mentions" >Mentions légales</a></li>
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
    $( window.document ).on( 'ready', function() {
        $( '.button-collapse' ).sideNav();
        $( '.parallax' ).parallax();
    });
</script>
