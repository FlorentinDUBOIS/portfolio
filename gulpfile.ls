require! 'gulp'
require! 'gulp-less'
require! 'gulp-livescript'
require! 'gulp-concat'
require! 'gulp-autoprefixer'

require! 'browser-sync'

gulp.task 'default' ['browser-sync'] !->
    gulp.watch ['task.ls'] ['taskify']
    gulp.watch [
        'views/ressources/ls/*.ls'
        'views/ressources/ls/**/*.ls'
    ] ['lsify']

    gulp.watch [
        'views/ressources/less/*.less'
        'views/ressources/less/**/*.less'
    ] ['lessify']

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

gulp.task 'lessify' ->
    gulp.src [
        'views/ressources/less/*.less'
        'views/ressources/less/**/*.less'
    ]
        .pipe gulp-less!
        .pipe gulp-autoprefixer!
        .pipe gulp-concat 'main.less.css'
        .pipe gulp.dest 'views/ressources/'
