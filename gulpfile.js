(function() {
    // -----------------------------------------------------------------------------
    // use strict mode
    "use strict";

    // -----------------------------------------------------------------------------
    // require
    const gulp        = require( "gulp" );
    const gutil       = require( "gulp-util" );
    const prefix      = require( "gulp-autoprefixer" );
    const less        = require( "gulp-less" );
    const sass        = require( "gulp-sass" );
    const webpack     = require( "gulp-webpack" );
    const jsbeautify  = require( "gulp-beautify" );
    const cssbeautify = require( "gulp-cssbeautify" );
    const jsmin       = require( "gulp-jsmin" );
    const cssmin      = require( "gulp-minify-css" );
    const rename      = require( "gulp-rename" );

    // -----------------------------------------------------------------------------
    // webpack extension
    const named   = require( "vinyl-named-with-path" );
    const vifs    = require( "vinyl-fs" );

    // -----------------------------------------------------------------------------
    // constants
    // constant for gulp-autoprefixer
    const prefixOptions      = require( "./autoprefixer.config.js" );

    // constant for gulp-webpack
    const webpackOptions     = require( "./webpack.config.js" );

    // constant for css beautify
    const cssbeautifyOptions = require( "./beautify-css.config.js" );

    // constant for js beautify
    const jsbeautifyOptions  = require( "./beatify-js.config.js" );

    // -----------------------------------------------------------------------------
    // default task
    gulp.task( "default", ["watch"], function() {

    });

    // -----------------------------------------------------------------------------
    // watch task
    gulp.task( "watch", [], function() {
        // -----------------------------------------------------------------------------
        // watch javascripts
        gulp.watch(["assets/js/**/*.js"], ["build:js"]);
        gulp.watch(["assets/es6/**/*.js"], ["build:es6"]);

        // -----------------------------------------------------------------------------
        // watch stylesheets
        gulp.watch(["assets/css/**/*.css"], ["build:css"]);
        gulp.watch(["assets/less/**/*.less"], ["build:less"]);
        gulp.watch(["assets/sass/**/*.sass"], ["build:sass"]);
        gulp.watch(["assets/scss/**/*.scss"], ["build:scss"]);
    });

    // -----------------------------------------------------------------------------
    // build task
    gulp.task( "build", ["build:js", "build:es6", "build:css", "build:less", "build:sass", "build:scss"], function() {

    });

    // -----------------------------------------------------------------------------
    // build es6 task
    gulp.task( "build:js", [], () => {
        vifs.src(["assets/js/**/*.js"])
            .pipe( named().on( "error", gutil.log ))
            .pipe( webpack( webpackOptions ).on( "error", gutil.log ))
            .pipe( jsbeautify( jsbeautifyOptions ).on( "error", gutil.log ))
            .pipe( gulp.dest( "assets/build/javascripts" ).on( "error", gutil.log ))
            .pipe( jsmin().on( "error", gutil.log ))
            .pipe( rename({ suffix: ".min" }).on( "error", gutil.log ))
            .pipe( vifs.dest( "assets/build/javascripts" ).on( "error", gutil.log ));
    });

    // -----------------------------------------------------------------------------
    // build es6 task
    gulp.task( "build:es6", [], () => {
        vifs.src(["assets/es6/**/*.js"])
            .pipe( named().on( "error", gutil.log ))
            .pipe( webpack( webpackOptions ).on( "error", gutil.log ))
            .pipe( jsbeautify( jsbeautifyOptions ).on( "error", gutil.log ))
            .pipe( gulp.dest( "assets/build/javascripts" ).on( "error", gutil.log ))
            .pipe( jsmin().on( "error", gutil.log ))
            .pipe( rename({ suffix: ".min" }).on( "error", gutil.log ))
            .pipe( vifs.dest( "assets/build/javascripts" ).on( "error", gutil.log ));
    });

    // -----------------------------------------------------------------------------
    // build css task
    gulp.task( "build:css", [], () => {
        gulp.src(["assets/css/**/*.css"])
            .pipe( prefix( prefixOptions ).on( "error", gutil.log ))
            .pipe( cssbeautify( cssbeautifyOptions ).on( "error", gutil.log ))
            .pipe( gulp.dest( "assets/build/stylesheets" ).on( "error", gutil.log ))
            .pipe( cssmin().on( "error", gutil.log ))
            .pipe( rename({ suffix: ".min" }).on( "error", gutil.log ))
            .pipe( gulp.dest( "assets/build/stylesheets" ).on( "error", gutil.log ));
    });

    // -----------------------------------------------------------------------------
    // build less task
    gulp.task( "build:less", [], () => {
        gulp.src(["assets/less/**/*.less"])
            .pipe( less().on( "error", gutil.log ))
            .pipe( prefix( prefixOptions ).on( "error", gutil.log ))
            .pipe( cssbeautify( cssbeautifyOptions ).on( "error", gutil.log ))
            .pipe( gulp.dest( "assets/build/stylesheets" ).on( "error", gutil.log ))
            .pipe( cssmin().on( "error", gutil.log ))
            .pipe( rename({ suffix: ".min" }).on( "error", gutil.log ))
            .pipe( gulp.dest( "assets/build/stylesheets" ).on( "error", gutil.log ));
    });

    // -----------------------------------------------------------------------------
    // build sass task
    gulp.task( "build:sass", [], () => {
        gulp.src(["assets/sass/**/*.sass"])
            .pipe( sass().on( "error", gutil.log ))
            .pipe( prefix( prefixOptions ).on( "error", gutil.log ))
            .pipe( cssbeautify( cssbeautifyOptions ).on( "error", gutil.log ))
            .pipe( gulp.dest( "assets/build/stylesheets" ).on( "error", gutil.log ))
            .pipe( cssmin().on( "error", gutil.log ))
            .pipe( rename({ suffix: ".min" }).on( "error", gutil.log ))
            .pipe( gulp.dest( "assets/build/stylesheets" ).on( "error", gutil.log ));
    });

    // -----------------------------------------------------------------------------
    // build scss task
    gulp.task( "build:scss", [], () => {
        gulp.src(["assets/scss/**/*.scss"])
            .pipe( sass.sync().on( "error", gutil.log ))
            .pipe( prefix( prefixOptions ).on( "error", gutil.log ))
            .pipe( cssbeautify( cssbeautifyOptions ).on( "error", gutil.log ))
            .pipe( gulp.dest( "assets/build/stylesheets" ).on( "error", gutil.log ))
            .pipe( cssmin().on( "error", gutil.log ))
            .pipe( rename({ suffix: ".min" }).on( "error", gutil.log ))
            .pipe( gulp.dest( "assets/build/stylesheets" ).on( "error", gutil.log ));
    });

    // -----------------------------------------------------------------------------
    // install task
    gulp.task( "install", ["install:dir"], function() {

    });

    // -----------------------------------------------------------------------------
    // install directory task
    gulp.task( "install:dir", [], function() {
        // -----------------------------------------------------------------------------
        // require shelljs
        const sh = require( "shelljs" );

        // -----------------------------------------------------------------------------
        // create directory if not create
        // assets
        sh.mkdir( "-p", "assets" );

        sh.mkdir( "-p", "assets/js" );
        sh.mkdir( "-p", "assets/fonts" );
        sh.mkdir( "-p", "assets/images" );
        sh.mkdir( "-p", "assets/es6" );
        sh.mkdir( "-p", "assets/css" );
        sh.mkdir( "-p", "assets/less" );
        sh.mkdir( "-p", "assets/sass" );
        sh.mkdir( "-p", "assets/scss" );
        sh.mkdir( "-p", "assets/build" );

        sh.mkdir( "-p", "assets/build/javascripts" );
        sh.mkdir( "-p", "assets/build/stylesheets" );
    });
}).call( this );
