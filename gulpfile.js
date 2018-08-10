var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concatcss = require('gulp-concat'),
    clean = require('gulp-clean'),
    plumber = require('gulp-plumber'),
    prefix = require('gulp-autoprefixer'),
    concatjs = require('gulp-concat'),
    browserSync = require('browser-sync').create();




gulp.task('scripts', function() {
    return gulp.src('resources/assets/js/artmarket/*.js')
        .pipe(concatjs('main.js'))
        .pipe(gulp.dest('public/js'));
});

gulp.task('blocks', function() {
    return gulp.src('resources/assets/sass/blocks/**/*.scss')
        .pipe(plumber())
        .pipe(concatcss("_blocks.scss"))
        .pipe(gulp.dest('resources/assets/sass/build/'))
        .pipe(browserSync.stream());
});

gulp.task('sass', function() {
    return gulp.src('resources/assets/sass/main.scss')
        .pipe(plumber())
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix({
            browsers: ['last 10 versions'],
            cascade: true
        }))
        .pipe(gulp.dest('public/css'))
        .pipe(browserSync.stream());
});

gulp.task('clean', function () {
    return gulp.src('resources/assets/sass/build/_blocks.scss', {read: false})
        .pipe(clean())
    .pipe(browserSync.stream());
});


gulp.task('watch', function() {
    browserSync.init({
        //server: "./app"
        proxy: 'http://laravel.jside.loc/account/paintings'
    });

    gulp.watch('resources/assets/sass/blocks/**/*.scss', gulp.series('blocks', 'sass', 'clean'));
});