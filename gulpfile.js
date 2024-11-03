const gulp = require("gulp"),
  concatCss = require("gulp-concat-css"),
  cleanCSS = require("gulp-clean-css"),
  sass = require("gulp-sass")(require("sass")),
  autoprefixer = require("gulp-autoprefixer"),
  uglify = require("gulp-uglify"),
  sourcemaps = require("gulp-sourcemaps"),
  rename = require("gulp-rename");

// gulp.task("scss", function sassFunc() {
//   return gulp
//     .src("./css/*.scss")
//     .pipe(scss())
//     .pipe(concatCss("main.scss"))
//     .pipe(gulp.dest("./css"));
// });

gulp.task("styles", function minifyFunc() {
  return gulp
    .src("./css/scss/main.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(concatCss("main.css"))
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("./css"));
});

gulp.task("admin-styles", function minifyFunc() {
  return gulp
    .src("./css/scss/admin.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(concatCss("admin.css"))
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("./css"));
});

gulp.task("minify-js", function () {
  return gulp
    .src(["js/*.js", "!js/*.min.js"])
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(uglify())
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("js/"));
});

gulp.task("default", function watchFunc() {
  gulp.watch("./css/scss/*.scss", gulp.series("styles"));
  gulp.watch("./css/scss/*.scss", gulp.series("admin-styles"));
  gulp.watch(["js/*.js", "!js/*.min.js"], gulp.series("minify-js"));
});
