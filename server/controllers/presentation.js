// ----------------------------------------------------------------------------
// requirements
const router = require( 'express' ).Router();

// ----------------------------------------------------------------------------
// routes
router.get( '/presentation', ( req, res ) => {
    res.json([
        { path: 'assets/github.svg',    name: 'presentation.github', link: 'https://github.com/FlorentinDUBOIS' },
        { path: 'assets/google+.svg',   name: 'presentation.google', link: 'https://plus.google.com/100395044725382027486' },
        { path: 'assets/linkedin.svg',  name: 'presentation.linked', link: 'https://www.linkedin.com/in/florentin-dubois-73b045114' },
        { path: 'assets/tweet.svg',     name: 'presentation.tweet',  link: 'https://twitter.com/FlorentinDUBOIS' },
        { path: 'assets/travis-ci.svg', name: 'presentation.travis', link: 'https://travis-ci.org/FlorentinDUBOIS' },
        { path: 'assets/docker.svg',    name: 'presentation.docker', link: 'https://hub.docker.com/u/florentindubois' }
    ]);
});

// ----------------------------------------------------------------------------
// exports routes
module.exports = router;