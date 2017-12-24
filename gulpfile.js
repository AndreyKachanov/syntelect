var gulp           = require('gulp'),
		gutil          = require('gulp-util' ),
		sass           = require('gulp-sass'),
		browserSync    = require('browser-sync'),
		concat         = require('gulp-concat'),
		uglify         = require('gulp-uglify'),
		cleanCSS       = require('gulp-clean-css'),
		rename         = require('gulp-rename'),
		del            = require('del'),
		imagemin       = require('gulp-imagemin'),
		cache          = require('gulp-cache'),
		autoprefixer   = require('gulp-autoprefixer'),
		ftp            = require('vinyl-ftp'),
		notify         = require("gulp-notify"),
		rsync          = require('gulp-rsync');
	

// Скрипты проекта

gulp.task('common-js', function() {
	return gulp.src([
		'js/common.js',
		])
	.pipe(concat('common.min.js'))
	// .pipe(uglify())
	.pipe(gulp.dest('js/'));
});

gulp.task('js', ['common-js'], function() {
	return gulp.src([
		// 'libs/jquery/dist/jquery.min.js',
		'libs/jquery-bgswitcher/jquery.bgswitcher.js',
		'libs/show-more-plugin/jquery.show-more.js',
		'libs/jquery-filestyle/src/jquery-filestyle.min.js',
		'libs/components-font-awesome/fontawesome-markers.min.js',
		'libs/Easy-Responsive-Tabs-to-Accordion/js/easyResponsiveTabs.js',
		'js/common.min.js', // Всегда в конце
		])
	.pipe(concat('scripts.min.js'))
	// .pipe(uglify()) // Минимизировать весь js (на выбор)
	.pipe(gulp.dest('js/'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('browser-sync', function() {
	browserSync({
		// server: {
		// 	baseDir: 'app'
		// },
		notify: false,
		proxy: "syntelect.loc",
		// tunnel: true,
		// tunnel: "projectmane", //Demonstration page: http://projectmane.localtunnel.me
	});
});

gulp.task('sass', function() {
	return gulp.src('sass/**/*.sass')
	.pipe(sass({outputStyle: 'expand'}).on("error", notify.onError()))
	.pipe(rename({suffix: '.min', prefix : ''}))
	.pipe(autoprefixer(['last 15 versions']))
	// .pipe(cleanCSS()) // Опционально, закомментировать при отладке
	.pipe(gulp.dest('css/'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('watch', ['sass', 'js', 'browser-sync'], function() {
	gulp.watch('sass/**/*.sass', ['sass']);
	gulp.watch(['libs/**/*.js', 'js/common.js'], ['js']);
	gulp.watch('*.php', browserSync.reload);
});

var smartgrid = require('smart-grid');
 


gulp.task('grid', function() {
	/* It's principal settings in smart grid project */
	var settings = {
	    outputStyle: 'sass', /* less || scss || sass || styl */
	    columns: 12, /* number of grid columns */
	    offset: '30px', /* gutter width px || % */
	    mobileFirst: false, /* mobileFirst ? 'min-width' : 'max-width' */
	    container: {
	        maxWidth: '1134px', /* max-width оn very large screen */
	        fields: '15px' /* side fields */
	    },
	    breakPoints: {
	        lg: {
	            width: '1100px', /* -> @media (max-width: 1100px) */
	        },
	        md: {
	            width: '960px'
	        },
	        sm: {
	            width: '780px',
	            fields: '15px' /* set fields only if you want to change container.fields */
	        },
	        xs: {
	            width: '560px'
	        }
	        /* 
	        We can create any quantity of break points.
	 
	        some_name: {
	            width: 'Npx',
	            fields: 'N(px|%|rem)',
	            offset: 'N(px|%|rem)'
	        }
	        */
	    }
	};
	 
	smartgrid('libs/', settings);	
});

// gulp.task('imagemin', function() {
// 	return gulp.src('app/img/**/*')
// 	.pipe(cache(imagemin()))
// 	.pipe(gulp.dest('dist/img')); 
// });

// gulp.task('build', ['removedist', 'imagemin', 'sass', 'js'], function() {

// 	var buildFiles = gulp.src([
// 		'app/*.html',
// 		'app/.htaccess',
// 		]).pipe(gulp.dest('dist'));

// 	var buildCss = gulp.src([
// 		'app/css/main.min.css',
// 		]).pipe(gulp.dest('dist/css'));

// 	var buildJs = gulp.src([
// 		'app/js/scripts.min.js',
// 		]).pipe(gulp.dest('dist/js'));

// 	var buildFonts = gulp.src([
// 		'app/fonts/**/*',
// 		]).pipe(gulp.dest('dist/fonts'));

// });

// gulp.task('deploy', function() {

// 	var conn = ftp.create({
// 		host:      'freetzi.com',
// 		user:      'kachanello.freetzi.com',
// 		password:  'G3xMB756G',
// 		parallel:  10,
// 		log: gutil.log
// 	});

// 	var globs = [
// 	'dist/**',
// 	'dist/.htaccess',
// 	];
// 	return gulp.src(globs, {buffer: false})
// 	.pipe(conn.dest('/smitler'));

// });

// gulp.task('rsync', function() {
// 	return gulp.src('dist/**')
// 	.pipe(rsync({
// 		root: 'dist/',
// 		hostname: 'username@yousite.com',
// 		destination: 'yousite/public_html/',
// 		archive: true,
// 		silent: false,
// 		compress: true
// 	}));
// });

// gulp.task('removedist', function() { return del.sync('dist'); });
// gulp.task('clearcache', function () { return cache.clearAll(); });

gulp.task('default', ['watch']);
