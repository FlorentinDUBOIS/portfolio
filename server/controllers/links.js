// ----------------------------------------------------------------------------
// requirements
const router = require( 'express' ).Router();

// ----------------------------------------------------------------------------
// routes
router.get( '/links', ( req, res ) => {
    res.json([
        { translate: 'presentation.github', link: 'https://github.com/FlorentinDUBOIS' },
        { translate: 'presentation.google', link: 'https://plus.google.com/100395044725382027486' },
        { translate: 'presentation.linked', link: 'https://www.linkedin.com/in/florentin-dubois-73b045114' },
        { translate: 'presentation.tweet',  link: 'https://twitter.com/FlorentinDUBOIS' },
        { translate: 'presentation.travis', link: 'https://travis-ci.org/FlorentinDUBOIS' },
        { translate: 'presentation.docker', link: 'https://hub.docker.com/u/florentindubois' }
    ]);
});

// ----------------------------------------------------------------------------
// exports routes
module.exports = router;