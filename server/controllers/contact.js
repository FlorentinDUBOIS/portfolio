// ----------------------------------------------------------------------------
// requirements
const router = require( 'express' ).Router();
const logger = require( 'printit' )({ date: true, prefix: 'mail' });
const mailer = require( 'directmail' )({
    debug: false,
    name: process.env.HOSTNAME
});

// ----------------------------------------------------------------------------
// routes
router.post( '/contact/send', ( req, res ) => {
    try {
        mailer.send({
            from: process.env.CONTACT_EMAIL,
            recipients: [res.body.address],
            date: (new Date()).toISOString(),
            subject: req.body.subject,
            message: req.body.message
        });

        res.sendStatus( 200 );
    } catch( e ) {
        logger.error( e.message );

        res.sendStatus( 500 );
    }
});

// ----------------------------------------------------------------------------
// exports routes
module.exports = router;