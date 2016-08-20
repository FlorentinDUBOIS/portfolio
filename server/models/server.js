// ----------------------------------------------------------------------------
// requirements
const path    = require( 'path' );
const walk    = require( 'walk' );
const express = require( 'express' );
const logger  = new (require( 'server/models/logger' ))( 'Server' );

// ----------------------------------------------------------------------------
// create class
class Server {
    constructor() {
        this.server = express();

        this.server.set( 'env', process.env.NODE_ENV || 'developement' );
        this.server.set( 'debug', process.env.DEBUG  || true );
    }

    plugin( plugin ) {
        this.server.use( plugin );
    }

    engine( ext, fn ) {
        if( this.server.get( 'env' ) == 'developement' && this.server.get( 'debug' )) {
            logger.info( `Load engine for ${ ext }` );
        }

        this.server.engine( ext, fn );
    }

    set( key, val ) {
        if( this.server.get( 'env' ) == 'developement' && this.server.get( 'debug' )) {
            logger.info( `Set variable ${ key } to ${ val }` );
        }

        this.server.set( key, val );
    }

    get( key ) {
        return this.server.get( key );
    }

    listen( port ) {
        if( this.server.get( 'env' ) == 'developement' && this.server.get( 'debug' )) {
            logger.info( `Listen on port: ${ port }` );
        }

        this.server.listen( port );
    }

    loadStatic() {
        let dirnames = require( 'server/static' );

        for( let dirname of dirnames ) {
            if( this.server.get( 'env' ) == 'developement' && this.server.get( 'debug' )) {
                logger.info( `Load static path ${ dirname.real } -> ${ dirname.syml }` );
            }

            this.server.use( dirname.syml, express.static( dirname.real ));
        }
    }

    load( pathname ) {
        let walker = walk.walk( pathname );

        walker.on( 'file', ( root, stat, next ) => {
            if( this.server.get( 'env' ) == 'developement' && this.server.get( 'debug' )) {
                logger.info( `Load file ${ stat.name }` );
            }

            this.server.use( require( path.join( root, stat.name )));

            next();
        });
    }
}

// ----------------------------------------------------------------------------
// exports
module.exports = Server;
