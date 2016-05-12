// ----------------------------------------------------------------------------
// requirements
const router = require( 'express' ).Router();

// ----------------------------------------------------------------------------
// routes
router.get( '/navigation', ( req, res ) => {
    res.json([
        { link: '#about',            icon: 'fingerprint',     translate: 'navigation.about' },
        { link: '#skills',           icon: 'devices',         translate: 'navigation.skills' },
        { link: '#projects',         icon: 'polymer',         translate: 'navigation.projects' },
        { link: '#timeline',         icon: 'business_center', translate: 'navigation.timeline' },
        { link: '#contact',          icon: 'send',            translate: 'navigation.contact' },
        { link: 'assets/resume.pdf', icon: 'file_download',   translate: 'navigation.resume' }
    ]);
});

// ----------------------------------------------------------------------------
// exports routes
module.exports = router;