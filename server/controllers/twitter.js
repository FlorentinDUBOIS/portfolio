// ----------------------------------------------------------------------------
// requirements
const router  = require( 'express' ).Router();
const twitter = require( 'twitter' );
const logger  = require( 'printit' )({
    prefix: 'twitter',
    date: true
});

const client = new twitter({
    consumer_key: process.env.TWITTER_CONSUMER_KEY,
    consumer_secret: process.env.TWITTER_CONSUMER_SECRET,
    access_token_key: process.env.TWITTER_ACCESS_TOKEN_KEY,
    access_token_secret: process.env.TWITTER_ACCESS_TOKEN_SECRET
});

// ----------------------------------------------------------------------------
// routes
router.get( '/twitter', ( req, res ) => {
    client.get( 'statuses/user_timeline', { screen_name: 'FlorentinDUBOIS' }, ( errors, tweets, response ) => {
        if( errors ) {
            for( var i in errors ) {
                logger.error( errors[i].message );
            }

            return res.sendStatus( 500 );
        }

        res.json( tweets.slice( 0, 6 ));
    });
});

// ----------------------------------------------------------------------------
// exports
module.exports = router;