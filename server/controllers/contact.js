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
        logger.info( `Send mail from ${ req.body.address } to ${ process.env.CONTACT_EMAIL }` );

        mailer.send({
            from: req.body.address,
            recipients: [process.env.CONTACT_EMAIL],
            date: (new Date()).toISOString(),
            message: `subject=${ req.body.subject }&body=${ req.body.message }`
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