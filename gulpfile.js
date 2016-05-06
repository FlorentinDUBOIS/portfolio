// ----------------------------------------------------------------------------
// gulpfile

// ----------------------------------------------------------------------------
// requirements
const gulp    = require( 'gulp' );
const plugins = require( 'gulp-load-plugins' )();

// ----------------------------------------------------------------------------
// default task
gulp.task( 'default', ['watch']);

// ----------------------------------------------------------------------------
// watch task
gulp.task( 'watch', ['build'], () => {
    gulp.watch(['client/app/**/!(.lang).js'], ['build:js']);
    gulp.watch(['client/stylesheets/**/*.scss'], ['build:scss']);
});

// ----------------------------------------------------------------------------
// build task
gulp.task( 'build', ['build:js', 'build:scss']);

// ----------------------------------------------------------------------------
// build:js task
gulp.task( 'build:js', () => {
    gulp.src(['client/app/**/!(.lang).js'])
        .pipe( plugins.plumberNotifier())
        .pipe( plugins.concat( 'app.min.js' ))
        .pipe( gulp.dest( 'client' ))
        .pipe( require( 'vinyl-named' )())
        .pipe( require( 'webpack-stream' )())
        .pipe( plugins.uglify({ compress: {}}))
        .pipe( gulp.dest( 'client' ));
});

// ----------------------------------------------------------------------------
// build:scss
gulp.task( 'build:scss', () => {
    gulp.src(['client/stylesheets/imports.scss'])
        .pipe( plugins.plumberNotifier())
        .pipe( plugins.sass.sync())
        .pipe( plugins.autoprefixer({
            browsers: ['last 3 versions', '> 5%'],
			cascade: false
        }))
        .pipe( plugins.cssnano())
        .pipe( plugins.rename({ suffix: '.min' }))
        .pipe( gulp.dest( 'client' ));
});