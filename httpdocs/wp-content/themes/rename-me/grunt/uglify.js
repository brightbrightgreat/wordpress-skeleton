module.exports = {

	options: {
		sourceMap: true
	},

	global: {
		files: [{
			cwd: '<%= paths.js.global %>',
			src: '*.js',
			dest: '<%= paths.js.dist %>',
			expand: true,
			ext: '.min.js'
		}]
	},

	single: {
		files: [{
			cwd: '<%= paths.js.single %>',
			src: '*.js',
			dest: '<%= paths.js.dist %>',
			expand: true,
			ext: '.min.js'
		}]
	},

	libs: {
		files: [{
			src: '<%= paths.js.libs %>/*.js',
			dest: '<%= paths.js.dist %>/libs.min.js'
		}]
	}

};
