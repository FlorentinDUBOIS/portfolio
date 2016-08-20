// ----------------------------------------------------------------------------
// rootpath
require( 'rootpath' )();

// ----------------------------------------------------------------------------
// requirements
const pug         = require( 'pug' );
const helmet      = require( 'helmet' );
const morgan      = require( 'morgan' );
const compression = require( 'compression' );
const Server      = require( 'server/models/server' );

// ----------------------------------------------------------------------------
// create server
let server = new Server();

// ----------------------------------------------------------------------------
// settings
server.engine( 'jade', pug.__express );

server.set( 'views', 'client/views' );
server.set( 'view engine', 'jade' );

// ----------------------------------------------------------------------------
// plugins
server.plugin( helmet());
server.plugin( compression());

if( server.get( 'env' ) == 'production' ) {
    server.plugin( morgan( 'common' ));
} else {
    server.plugin( morgan( 'dev' ));
}

// ----------------------------------------------------------------------------
// load controller
server.load( 'server/controllers' );
server.loadStatic();

// ----------------------------------------------------------------------------
// listen
server.listen( process.env.PORT || 80 );
