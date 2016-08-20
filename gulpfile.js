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
    gulp.watch(['client/src/**/*.jsx'], ['build:react']);
    gulp.watch(['client/ressources/**/*.scss'], ['build:stylesheet']);
});

// ----------------------------------------------------------------------------
// build
gulp.task( 'build', ['build:react', 'build:stylesheet']);

// ----------------------------------------------------------------------------
// build:stylesheet
gulp.task( 'build:stylesheet', () => {
    if( process.env.NODE_ENV == 'production' ) {
        gulp.src(['client/ressources/main.scss'])
            .pipe( plugins.plumberNotifier())
            .pipe( plugins.sourcemaps.init())
            .pipe( plugins.sass.sync())
            .pipe( plugins.autoprefixer())
            .pipe( plugins.cssnano())
            .pipe( plugins.sourcemaps.write( '.' ))
            .pipe( gulp.dest( 'client/dists' ));

    } else {
        gulp.src(['client/ressources/main.scss'])
            .pipe( plugins.plumberNotifier())
            .pipe( plugins.sourcemaps.init())
            .pipe( plugins.sass.sync())
            .pipe( plugins.autoprefixer())
            .pipe( plugins.cssbeautify())
            .pipe( plugins.sourcemaps.write( '.' ))
            .pipe( gulp.dest( 'client/dists' ));
    }
});

// ----------------------------------------------------------------------------
// build:react
gulp.task( 'build:react', () => {
    if( process.env.NODE_ENV == 'production' ) {
        gulp.src(['client/src/main.jsx'])
            .pipe( plugins.plumberNotifier())
            .pipe( plugins.sourcemaps.init())
            .pipe( plugins.browserify({ transform: ['babelify'] }))
            .pipe( plugins.rename({ extname: '.js' }))
            .pipe( plugins.uglify({ compress: {}}))
            .pipe( plugins.sourcemaps.write( '.' ))
            .pipe( gulp.dest( 'client/dists' ));

    } else {
        gulp.src(['client/src/main.jsx'])
            .pipe( plugins.plumberNotifier())
            .pipe( plugins.sourcemaps.init())
            .pipe( plugins.browserify({ transform: ['babelify'] }))
            .pipe( plugins.rename({ extname: '.js' }))
            .pipe( plugins.uglify({ compress: false }))
            .pipe( plugins.sourcemaps.write( '.' ))
            .pipe( gulp.dest( 'client/dists' ));
    }
});
