require! 'gulp'
require! 'gulp-less'
require! 'gulp-livescript'
require! 'gulp-concat'
require! 'gulp-autoprefixer'

require! 'browser-sync'

gulp.task 'default' ['browser-sync'] !->
    gulp.watch [
        'views/ressources/ls/*.ls'
        'views/ressources/ls/**/*.ls'
    ] ['lsify']

    gulp.watch [
        'views/ressources/js/*.js'
        'views/ressources/js/**/*.js'
    ] ['jsify']

    gulp.watch [
        'views/ressources/less/*.less'
        'views/ressources/less/**/*.less'
    ] ['lessify']

    gulp.watch [
        'views/ressources/css/*.css'
        'views/ressources/css/**/*.css'
    ] ['cssify']

gulp.task 'browser-sync' !->
    browser-sync {
        proxy: 'localhost'
        files: 'views/ressources/less/*.css'
        browser: []
    }

gulp.task 'lsify' ->
    gulp.src [
        'views/ressources/ls/*.ls'
        'views/ressources/ls/**/*.ls'
    ]
        .pipe gulp-livescript bare: true
        .pipe gulp-concat 'main.ls.js'
        .pipe gulp.dest 'views/ressources/'

gulp.task 'jsify' ->
    gulp.src [
        'views/ressources/js/*.js'
        'views/ressources/js/**/*.js'
    ]
        .pipe gulp-concat 'main.js'
        .pipe gulp-dest 'views/ressources/'

gulp.task 'cssify' ->
    gulp.src [
        'views/ressources/css/*.css'
        'views/ressources/css/**/*.css'
    ]
        .pipe gulp-autoprefixer!
        .pipe gulp-concat 'main.css'
        .pipe gulp.dest 'views/ressources/'

gulp.task 'lessify' ->
    gulp.src [
        'views/ressources/less/*.less'
        'views/ressources/less/**/*.less'
    ]
        .pipe gulp-less!
        .pipe gulp-autoprefixer!
        .pipe gulp-concat 'main.less.css'
        .pipe gulp.dest 'views/ressources/'
