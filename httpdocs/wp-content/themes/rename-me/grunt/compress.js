module.exports = {
	js: {
		options: {
			mode: 'gzip',
			level: 9
		},

		files: [{
			cwd: '<%= paths.js.dist %>',
			expand: true,
			src: ['*.min.js'],
			dest: '<%= paths.js.dist %>',
			ext: '.min.js.gz'
		}]
	},

	css: {
		options: {
			mode: 'gzip',
			level: 9
		},

		files: [{
			cwd: '<%= paths.css.dist %>',
			expand: true,
			src: ['**/*.css'],
			dest: '<%= paths.css.dist %>',
			ext: '.css.gz'
		}]
	},

	jsbr: {
		options: {
			mode: 'brotli',
			brotli: {
				mode: 0,
				quality: 11,
				lgwin: 22,
				lgblock: 0
			}
		},

		files: [{
			cwd: '<%= paths.js.dist %>',
			expand: true,
			src: ['*.min.js'],
			dest: '<%= paths.js.dist %>',
			ext: '.min.js.br'
		}]
	},

	cssbr: {
		options: {
			mode: 'brotli',
			brotli: {
				mode: 0,
				quality: 11,
				lgwin: 22,
				lgblock: 0
			}
		},

		files: [{
			cwd: '<%= paths.css.dist %>',
			expand: true,
			src: ['**/*.css'],
			dest: '<%= paths.css.dist %>',
			ext: '.css.br'
		}]
	}
}
