var gulp = require('gulp'),
	uglify = require('gulp-uglify'),
	concat = require('gulp-concat'),
	minifyCss = require('gulp-clean-css'),
	cssimport = require('gulp-cssimport'),
	sourceMaps = require('gulp-sourcemaps'),
	watch = require('gulp-watch');

gulp.task('default', function(){
	gulp.start('js','css');
});
gulp.task('css',function(){
	//Get css files, minify, concatonate and output
	//Comma separate in src for multiple
	gulp.src(['./src/css/*.css'])
	.pipe(cssimport())
	.pipe(sourceMaps.init())
	.pipe(minifyCss())
	.pipe(concat('style.css'))
	.pipe(sourceMaps.write())
	.pipe(gulp.dest('./trunk/wp-content/themes/wp-bootstrap-starter-child/'));
});
gulp.task('js', function(){
	gulp.src(['./src/js/*.js'])
	.pipe(uglify())
	.pipe(concat('script.js'))
	.pipe(gulp.dest('./trunk/wp-content/themes/bootstrap-child/css/'));
});
gulp.task('watch', function(){
	gulp.start('default');
	gulp.watch('./src/css/*.css', ['css']);
	gulp.watch('./src/js/*', ['js']);
});