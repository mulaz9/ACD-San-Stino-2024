const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const autoprefixer = require("gulp-autoprefixer");
const cleanCSS = require("gulp-clean-css");
const sourcemaps = require("gulp-sourcemaps");
const rename = require("gulp-rename");
const uglify = require("gulp-uglify");
const plumber = require("gulp-plumber");

// Task per i CSS principali
gulp.task("styles", function () {
  return gulp
    .src("./css/scss/main.scss")
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("./css"));
});

// Task per gli stili admin
gulp.task("admin-styles", function () {
  return gulp
    .src("./css/scss/admin.scss")
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("./css"));
});

// Minificazione JS
gulp.task("minify-js", function () {
  return gulp
    .src(["js/*.js", "!js/*.min.js"])
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest("js/"));
});

// Watcher
gulp.task("default", function () {
  gulp.watch("./css/scss/**/*.scss", gulp.series("styles", "admin-styles"));
  gulp.watch(["js/*.js", "!js/*.min.js"], gulp.series("minify-js"));
});
