// ----------------------------------------------------------------------------
// requirements
const gulp    = require( 'gulp' );
const plugins = require( 'gulp-load-plugins' )();

// ----------------------------------------------------------------------------
// default
gulp.task( 'default', ['watch']);

// ----------------------------------------------------------------------------
// watch
gulp.task( 'watch', ['build'], () => {

});

// ----------------------------------------------------------------------------
// build
gulp.task( 'build', ['build:react']);

// ----------------------------------------------------------------------------
// build:react
gulp.task( 'build:react', () => {
    if( process.env.NODE_ENV == 'production' ) {
        gulp.src(['client/src/main.jsx'])
            .pipe( plugins.plumber())
            .pipe( plugins.sourcemaps.init())
            .pipe( plugins.babel())
            .pipe( plugins.browserify())
            .pipe( plugins.rename({ suffix: '.min' }))
            .pipe( plugins.uglify({ compress: {}}))
            .pipe( plugins.sourcemaps.write( '.' ))
            .pipe( gulp.dest( 'client/dists' ));

    } else {
        gulp.src(['client/src/main.jsx'])
            .pipe( plugins.plumber())
            .pipe( plugins.sourcemaps.init())
            .pipe( plugins.babel())
            .pipe( plugins.browserify())
            .pipe( plugins.sourcemaps.write( '.' ))
            .pipe( gulp.dest( 'client/dists' ));
    }
});
