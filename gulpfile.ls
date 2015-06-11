require! 'gulp'
require! 'gulp-less'
require! 'gulp-livescript'
require! 'gulp-concat'
require! 'gulp-autoprefixer'
require! 'gulp-sass'

require! 'browser-sync'
require! 'bs-html-injector'

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

    gulp.watch [
        'views/ressources/scss/*.scss'
        'views/ressources/scss/**/*.scss'
    ] ['scssify']

    gulp.watch [
        'views/ressources/sass/*.sass'
        'views/ressources/sass/**/*.sass'
    ] ['sassify']

    gulp.watch [
        'views/*.php'
        'views/**.php'
    ] [bs-html-injector]

gulp.task 'browser-sync' !->
    browser-sync.use bs-html-injector, {
        files: [
            'views/*.php'
            'views/**.php'
        ]
    }

    browser-sync {
        proxy: 'localhost'
        files: 'views/ressources/less/*.css'
        browser: []
    }

gulp.task 'sassify' ->
    gulp.src [
        'views/ressources/sass/*.sass'
        'views/ressources/sass/**/*.sass'
    ]
        .pipe gulp-sass!
        .pipe gulp-autoprefixer!
        .pipe gulp-dest 'views/ressources/sass/'
        .pipe gulp-concat 'main.sass.css'
        .pipe gulp-dest 'views/ressources/'

gulp.task 'scssify' ->
    gulp.src [
        'views/ressources/scss/*.scss'
        'views/ressources/scss/**/*.scss'
    ]
        .pipe gulp-sass.sync!
        .pipe gulp-autoprefixer!
        .pipe gulp-dest 'views/ressources/scss/'
        .pipe gulp-concat 'main.scss.css'
        .pipe gulp-dest 'views/ressources/'

gulp.task 'lsify' ->
    gulp.src [
        'views/ressources/ls/*.ls'
        'views/ressources/ls/**/*.ls'
    ]
        .pipe gulp-livescript bare: true
        .pipe gulp-dest 'views/ressources/ls/'
        .pipe gulp-concat 'main.ls.js'
        .pipe gulp.dest 'views/ressources/'

gulp.task 'jsify' ->
    gulp.src [
        'views/ressources/js/*.js'
        'views/ressources/js/**/*.js'
    ]
        .pipe gulp-dest 'views/ressources/js/'
        .pipe gulp-concat 'main.js'
        .pipe gulp-dest 'views/ressources/'

gulp.task 'cssify' ->
    gulp.src [
        'views/ressources/css/*.css'
        'views/ressources/css/**/*.css'
    ]
        .pipe gulp-autoprefixer!
        .pipe gulp-dest 'views/ressources/css/'
        .pipe gulp-concat 'main.css'
        .pipe gulp.dest 'views/ressources/'

gulp.task 'lessify' ->
    gulp.src [
        'views/ressources/less/*.less'
        'views/ressources/less/**/*.less'
    ]
        .pipe gulp-less!
        .pipe gulp-autoprefixer!
        .pipe gulp-dest 'views/ressources/less/'
        .pipe gulp-concat 'main.less.css'
        .pipe gulp.dest 'views/ressources/'
