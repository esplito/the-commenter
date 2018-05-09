var gulp = require('gulp'),
watch = require('gulp-watch'),
browserSync = require('browser-sync').create();


gulp.task('watch', function() {

  browserSync.init({
    notify: false,
    proxy: 'localhost/the-commenter/app/',
    port: 8080,
    open: true
  });

  watch('./app/**/*.php', function() {
    browserSync.reload();
  });

  watch('./app/assets/styles/**/*.css', function() {
    gulp.start('refreshCss');
  });

  watch('./app/assets/scripts/*.js', function() {
    browserSync.reload();
  });

});

gulp.task('cssInject', ['styles'],function() {
  return gulp.src('./app/temp/styles/styles.css')
    .pipe(browserSync.stream());
});

gulp.task('refreshCss', ['cssInject'], function(){
  browserSync.reload();
});