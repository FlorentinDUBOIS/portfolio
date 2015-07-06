require! 'gulp'
require! 'gulp-less'
require! 'gulp-livescript'
require! 'gulp-concat'
require! 'gulp-autoprefixer'
require! 'gulp-sass'
require! 'gulp-coffee'

require! 'browser-sync'
require! 'bs-html-injector'

gulp.task 'default' ['browser-sync'] !->
    languages = ['ls' 'js' 'less' 'css' 'scss' 'sass' 'coffee']

    for language in languages
        gulp.watch [
            'views/ressources/' + language + '/*.' + language
            'views/ressources/' + language + '/**/*.' + language
        ] [language + 'ify']

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
        .pipe gulp.dest 'views/ressources/sass/'

gulp.task 'scssify' ->
    gulp.src [
        'views/ressources/scss/*.scss'
        'views/ressources/scss/**/*.scss'
    ]
        .pipe gulp-sass.sync!
        .pipe gulp-autoprefixer!
        .pipe gulp.dest 'views/ressources/scss/'

gulp.task 'lsify' ->
    gulp.src [
        'views/ressources/ls/*.ls'
        'views/ressources/ls/**/*.ls'
    ]
        .pipe gulp-livescript bare: true
        .pipe gulp.dest 'views/ressources/ls/'

gulp.task 'jsify' ->
    gulp.src [
        'views/ressources/js/*.js'
        'views/ressources/js/**/*.js'
    ]
        .pipe gulp.dest 'views/ressources/js/'

gulp.task 'cssify' ->
    gulp.src [
        'views/ressources/css/*.css'
        'views/ressources/css/**/*.css'
    ]
        .pipe gulp-autoprefixer!
        .pipe gulp.dest 'views/ressources/css/'

gulp.task 'lessify' ->
    gulp.src [
        'views/ressources/less/*.less'
        'views/ressources/less/**/*.less'
    ]
        .pipe gulp-less!
        .pipe gulp-autoprefixer!
        .pipe gulp.dest 'views/ressources/less/'

gulp.task 'coffeeify' ->
    gulp.src [
        'views/ressources/coffee/*.coffee'
        'views/ressources/coffee/**/*.coffee'
    ]
        .pipe gulp-coffee bare: true
        .pipe gulp.dest 'views/ressources/coffee/'
