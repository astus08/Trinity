gulp            = require('gulp');
$               = require('gulp-load-plugins')();

browserSync     = require('browser-sync').create();

var path = {
    css     : 'view/css/',
    scss    : 'view/css/'
}

gulp.task('browser_reload', function(done) {
    browserSync.reload();
    done();
});

gulp.task('sass_compilation_+_prefixer', function(){
    gulp.src(path.scss + '*.scss')
    .pipe($.sass().on('error', $.sass.logError))
    .pipe($.autoprefixer())
    .pipe(gulp.dest(path.css));
})


gulp.task('default', function(){
    browserSync.init({
        proxy: "localhost:8080/Trinity"
    });

    gulp.watch(path.scss + '**/*.scss', ['sass_compilation_+_prefixer']);

    gulp.watch(['*.html', 'js/*.js', '*.php', 'css/*.css'], ['browser_reload']);
})