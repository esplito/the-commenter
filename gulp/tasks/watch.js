var gulp = require('gulp'),
watch = require('gulp-watch'),
browserSync = require('browser-sync').create();

gulp.task('browsersync-init', function(){
  browserSync.init({
    notify: false,
    proxy: 'localhost:8080/the-commenter/app/',
    port: 8843,
    open: true
  });
});

gulp.task('watch-php', function () {
  watch('./app/**/*.php', function() {
    browserSync.reload();
  });
});

gulp.task('watch-css', function() {
  watch('./app/assets/styles/**/*.css', gulp.series('styles', 'cssInject'), function() {
    browserSync.reload();
  });
});

gulp.task('watch-js', function(){
  watch('./app/assets/scripts/*.js', function() {
    browserSync.reload();
  });
});
gulp.task('watch', gulp.parallel('browsersync-init', 'watch-php', 'watch-css', 'watch-js'), function() {
  
});

gulp.task('cssInject', function() {
  return gulp.src('./app/temp/styles/styles.css')
    .pipe(browserSync.stream());
});