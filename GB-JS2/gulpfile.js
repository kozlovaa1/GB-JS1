var gulp = require('gulp');
var dest = require('gulp-dest');
var useref = require('gulp-useref');
var sass = require('gulp-sass');
var babel = require('gulp-babel');
var concat = require('gulp-concat');
var browserSync = require('browser-sync').create();

gulp.task('task-name', function () {
// код
});


gulp.task('browserSync', function () {
    browserSync({
        server: {
            baseDir: 'app'
        },
    })
});

gulp.task('sass', function () {
    return gulp.src('app/scss/**/*.scss') // Получаем все файлы с окончанием .scss в папке app/scss и дочерних директориях
        .pipe(sass())
        .pipe(concat('style.css'))
        .pipe(gulp.dest('app/css'))
        .pipe(browserSync.reload({
            stream: true
        }))
});

gulp.task('watch', ['browserSync', 'sass'], function () {
    gulp.watch('app/scss/**/*.scss', ['sass'])
    // Обновляем браузер при любых изменениях в HTML или JS
        .pipe('app/*.html', browserSync.reload)
        .pipe('app/js/**/*.js', browserSync.reload)
});

gulp.task('useref', function () {
    var assets = useref.assets();
    return gulp.src('app/*.html')
        .pipe(assets)
        .pipe(assets.restore())
        .pipe(useref())
        .pipe(gulp.dest('dist'))
});

gulp.task('babel', function () {
    return gulp.src('app/js/**/*.js')
        .pipe(babel({
            presets: ['env']
        }))
        .pipe(gulp.dest('app/js'))
});




