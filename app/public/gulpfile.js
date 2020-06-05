const gulp = require('gulp');
const sass = require('gulp-sass');
const webpack = require('webpack');
const webpackConfig = require('./webpack.config.js');
const browserSync = require('browser-sync').create();
const settings = require('./settings');

  // To run Webpack, we just have to invoke the webpack
  //  function from the module and pass it our webpackConfig.
  //  However, to make this work well with Gulp,
// we should wrap it in a Promise that can handle the success and error states
  function scriptTask(cb) {
    return new Promise((resolve, reject) => {
        webpack(webpackConfig, (err, stats) => {
            if (err) {
                return reject(err)
            }
            if (stats.hasErrors()) {
                return reject(new Error(stats.compilation.errors.join('\n')))
            }
            resolve()
        })
    })
}

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
// copy css/style.css to ./style.css
  function cpStyle() {
    return gulp.src(settings.themeLocation+'css/style.css')
    .pipe(gulp.dest(settings.themeLocation))
    .pipe(browserSync.stream());
  }

// watch the changes throuh gulp watch
  function watch(done){
    browserSync.init({
      notify: false,
      proxy: settings.urlToPreview,
      ghostMode: false
    });
    gulp.watch(settings.themeLocation+'sass/**/*.scss',gulp.series(style,cpStyle));
    gulp.watch([settings.themeLocation+'js/modules/*.js',settings.themeLocation+'js/custom.js'],gulp.series(scriptTask));
    gulp.watch(settings.themeLocation+'*.php').on('change',browserSync.reload);
    gulp.watch(settings.themeLocation+'js/**/*.js').on('change',browserSync.reload);
    done();
  }


  exports.cpStyle =cpStyle;
  exports.style = style;
  exports.watch = watch;
  exports.scriptTask = scriptTask;
