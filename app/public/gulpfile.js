const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const settings = require('./settings');

// compile scss to css
  function style(){
    //1. where is my scss file
    // return gulp.src('./'+themeLocation+'/sass/**/*.scss')
    return gulp.src(settings.themeLocation+'sass/*.scss')
    //2. pass that file through sass compiler
    .pipe(sass().on('error',sass.logError))
      //3. where do I save the compiled css?
    .pipe(gulp.dest(settings.themeLocation+'css/'));
    //4. STREAM CHANGE TO ALL browser


  }

  function cpStyle() {
    return gulp.src(settings.themeLocation+'css/style.css')
    .pipe(gulp.dest(settings.themeLocation))
    .pipe(browserSync.stream());
  }


  function watch(done){
    browserSync.init({
      notify: false,
      proxy: settings.urlToPreview,
      ghostMode: false
    });
    gulp.watch(settings.themeLocation+'sass/**/*.scss',gulp.series(style,cpStyle));
    gulp.watch(settings.themeLocation+'*.php').on('change',browserSync.reload);
    gulp.watch(settings.themeLocation+'js/**/*.js').on('change',browserSync.reload);
    done();
  }


  exports.cpStyle =cpStyle;
  exports.style = style;
  exports.watch = watch;
