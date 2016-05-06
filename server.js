// ----------------------------------------------------------------------------
// requirements
const express = require( 'express' );
const helmet  = require( 'helmet' );
const http    = require( 'http' );
const path    = require( 'path' );
const walk    = require( 'walk' );
const app     = express();
const logger  = require( 'printit' )({
    prefix: 'server',
    date: true
});

// ----------------------------------------------------------------------------
// process error
process.on( 'uncaughtException', ( e ) => logger.error( e.message ));

// ----------------------------------------------------------------------------
// configurations
logger.info( 'Set definition of express framework' );

app.engine( 'jade', require( 'jade' ).__express );

app.set( 'views', path.join( __dirname, 'client' ));
app.set( 'view engine', 'jade' );

// ----------------------------------------------------------------------------
// modules
logger.info( 'Load express modules' );

app.use( helmet());

// ----------------------------------------------------------------------------
// static routes
let routes = [
    { syml: '/angular', real: 'node_modules/angular' },
    { syml: '/angular', real: 'node_modules/angular-animate' },
    { syml: '/angular', real: 'node_modules/angular-aria' },
    { syml: '/angular', real: 'node_modules/angular-material' },
    { syml: '/angular', real: 'node_modules/angular-messages' },
    { syml: '/angular', real: 'node_modules/angular-route' },
    { syml: '/angular', real: 'node_modules/angular-sanitize' },
    { syml: '/angular', real: 'node_modules/angular-translate/dist' },

    { syml: '/assets',  real: 'client/assets' },

    { syml: '/imports.min.css', real: 'client/imports.min.css' },
    { syml: '/app.min.js',      real: 'client/app.min.js' }
];

logger.info( 'Load statics routes' );
for( let route of routes ) {
    logger.info( `Load static route : ${ route.real } -> ${ route.syml }` );

    app.use( route.syml, express.static( path.join( __dirname, route.real )));
}

// ----------------------------------------------------------------------------
// walk controller
logger.info( 'Create walker' );

let walker = walk.walk( path.join( __dirname, 'server', 'controllers' ));

walker.on( 'file', ( root, fileStats, next ) => {
    logger.info( `Load file : ${ path.join( root, fileStats.name ) }` )

    app.use( require( path.join( root, fileStats.name )));

    next();
});

// ----------------------------------------------------------------------------
// listen
http.createServer( app ).listen( process.env.PORT || 80, () => {
    logger.info( 'Launch server on', process.env.PORT || 80 );
});