var gulp = require('gulp');
var minify = require('gulp-minifier');
var rename = require("gulp-rename");
 
// rename via string 
gulp.src("./src/main/text/hello.txt")
  .pipe(rename("main/text/ciao/goodbye.md"))
  .pipe(gulp.dest("./dist")); 

gulp.task('minify:js', function() {
  return gulp.src('./resources/assets/vendor/js/main.js', !'./resources/assets/vendor/js/main.min.js').pipe(minify({
    minify: true,
    collapseWhitespace: true,
    conservativeCollapse: true,
    minifyJS: true,
    getKeptComment: function (content, filePath) {
        var m = content.match(/\/\*![\s\S]*?\*\//img);
        return m && m.join('\n') + '\n' || '';
    }
  }))
  .pipe(rename("main.min.js"))
  .pipe(gulp.dest('./resources/assets/vendor/js'));
});

gulp.task('minify:css', function() {
  return gulp.src('./resources/assets/vendor/css/main.css', !'./resources/assets/vendor/css/main.min.css').pipe(minify({
    minify: true,
    collapseWhitespace: true,
    conservativeCollapse: true,
    minifyCSS: true,
    getKeptComment: function (content, filePath) {
        var m = content.match(/\/\*![\s\S]*?\*\//img);
        return m && m.join('\n') + '\n' || '';
    }
  }))
  .pipe(rename("main.min.css"))
  .pipe(gulp.dest('./resources/assets/vendor/css'));
});

gulp.task('default', [ 'minify:js', 'minify:css']);