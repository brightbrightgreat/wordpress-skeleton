const sass = require('node-sass');

module.exports = {
	options: {
		style: 'expanded',
		implementation: sass,
	},

	global: {
		files: [{
			cwd: '<%= paths.css.global %>',
			expand: true,
			src: ['*.scss'],
			dest: '<%= paths.css.expanded %>',
			ext: '.css'
		}],
	},

	single: {
		files: [{
			cwd: '<%= paths.css.single %>',
			expand: true,
			src: ['*.scss'],
			dest: '<%= paths.css.expanded %>',
			ext: '.css'
		}]
	}
};
