var gulp = require('gulp');

gulp.task('task-name', function() {
// код
});


gulp.task('browserSync', function() {
    browserSync({
        server: {
            baseDir: 'app'
        },
    })
});

gulp.task('sass', function() {
    return gulp.src('app/scss/**/*.scss') // Получаем все файлы с окончанием .scss в папке app/scss и дочерних директориях
        .pipe(sass())
        .pipe(gulp.dest('app/css'))
        .pipe(browserSync.reload({
            stream: true
        }))
});

gulp.task('watch', ['browserSync', 'sass'], function (){
    gulp.watch('app/scss/**/*.scss', ['sass']);
// Обновляем браузер при любых изменениях в HTML или JS
    gulp.watch('app/*.html', browserSync.reload);
    gulp.watch('app/js/**/*.js', browserSync.reload);
});

var useref = require('gulp-useref');

gulp.task('useref', function(){
    var assets = useref.assets();
    return gulp.src('app/*.html')
        .pipe(assets)
        .pipe(assets.restore())
        .pipe(useref())
        .pipe(gulp.dest('dist'))
});




