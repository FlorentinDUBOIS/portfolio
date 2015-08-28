'use strict'

# require basic
require! 'gulp'
require! 'gulp-concat'

# require languages
require! 'gulp-coffee'
require! 'gulp-livescript'
require! 'gulp-less'
require! 'gulp-autoprefixer'
require! 'gulp-sass'

# default task
gulp.task 'default' !->
    languages = ['ls' 'coffee' 'sass' 'scss' 'less']

    for let language in languages
        gulp.watch [language + '/*.' + language, language + '/**/*.' + language] [language]

# build task for compiling
# to javaScript
gulp.task 'ls' ->
    gulp.src ['ls/*.ls' 'ls/**/*.ls']
        .pipe gulp-livescript!
        .pipe gulp.dest 'build/js'

gulp.task 'coffee' ->
    gulp.src ['coffee/*.coffee' 'coffee/**/*.coffee']
        .pipe gulp-coffee!
        .pipe gulp.dest 'build/js'

# to cascading stylesheet
gulp.task 'less' ->
    gulp.src ['less/*.less' 'less/**/*.less']
        .pipe gulp-less!
        .pipe gulp-autoprefixer!
        .pipe gulp.dest 'build/css'

gulp.task 'sass' ->
    gulp.src ['sass/*.sass' 'sass/**/*.sass']
        .pipe gulp-sass!
        .pipe gulp-autoprefixer!
        .pipe gulp.dest 'build/css'

gulp.task 'scss' ->
    gulp.src ['scss/*.scss' 'scss/**/*.scss']
        .pipe gulp-sass.sync!
        .pipe gulp-autoprefixer!
        .pipe gulp.dest 'build/css'
