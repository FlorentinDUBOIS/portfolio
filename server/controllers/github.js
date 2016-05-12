// ----------------------------------------------------------------------------
// requirements
const router = require( 'express' ).Router();
const logger = require( 'printit' )({ date: true, prefix: 'GitHub' });
const github = new (require( 'github' ))({
    version: '3.0.0',
    protocol: 'https',
    debug: false
});

github.authenticate({
    type: "basic",
    username: process.env.GITHUB_USERNAME,
    password: process.env.GITHUB_PASSWORD
});

// ----------------------------------------------------------------------------
// routes
router.get( '/github/repositories', ( req, res ) => {
    let flags = {
        type: 'all',
        user: process.env.GITHUB_USERNAME,
        sort: 'pushed',
        direction: 'desc'
    };

    github.repos.getFromUser( flags, ( errors, data ) => {
        if( errors ) {
            for( let error in errors ) {
                logger.error( error.message );
            }

            res.sendStatus( 500 );

            throw errors;
        }

        res.json( data.slice( 0, 6 ));
    });
});

router.get( '/github/repositories/:repo/readme', ( req, res ) => {
    let flags = {
        user: process.env.GITHUB_USERNAME,
        repo: req.params.repo
    };

    github.repos.getReadme( flags, ( errors, data ) => {
         if( errors ) {
            for( let error in errors ) {
                logger.error( error.message );
            }

            res.sendStatus( 500 );

            throw errors;
        }

        res.json( data );
    });
});

router.get( '/github/user', ( req, res ) => {
    github.user.get({}, ( errors, data ) => {
        if( errors ) {
            for( let error in errors ) {
                logger.error( error.message );
            }

            res.sendStatus( 500 );

            throw errors;
        }

        res.json( data );
    });
});

// ----------------------------------------------------------------------------
// exports routes
module.exports = router;