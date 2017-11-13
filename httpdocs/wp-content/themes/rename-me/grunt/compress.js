module.exports = {

	options: {
		mode: 'gzip',
		level: 9
	},

	js: {
		files: [{
			cwd: '<%= paths.js.dist %>',
			expand: true,
			src: ['*.min.js'],
			dest: '<%= paths.js.dist %>',
			ext: '.js.gz'
		}]
	},

	css: {
		files: [{
			cwd: '<%= paths.css.dist %>',
			expand: true,
			src: ['**/*.css'],
			dest: '<%= paths.css.dist %>',
			ext: '.css.gz'
		}]
	}
}
