var gulp = require('gulp'),
	less = require('gulp-less'),
	watch = require('gulp-watch'),
	prefix = require('gulp-autoprefixer'),
	plumber = require('gulp-plumber'),
	livereload = require('gulp-livereload'),
	path = require('path');

gulp.task('less', function() {
	return gulp.src('./css/*.less')
		.pipe(plumber())
		.pipe(less())
		.pipe(prefix("last 8 version", "> 1%", "ie 8", "ie 7"), { cascade:true })
		.pipe(gulp.dest('./css'))
		.pipe(livereload());
});

gulp.task('js-reload', function() {
	return gulp.src('./js/*.js')
		.pipe(livereload());
});


gulp.task('watch', function() {
	livereload.listen();

	gulp.watch('./css/*.less', ['less']);

	//gulp.watch('./frontend/web/novo/js/*.js', ['js-reload']);
});


gulp.task('default', ['watch']); // Default will run the 'entry' watch task
