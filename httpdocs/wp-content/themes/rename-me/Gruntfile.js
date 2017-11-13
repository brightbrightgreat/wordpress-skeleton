module.exports = function(grunt) {
	var path = require('path');

	require('load-grunt-config')(grunt, {
		// path to task.js files, defaults to grunt dir
		configPath: path.join(process.cwd(), 'grunt'),

		// Pass data to tasks
		data: {

			// Re-usable filesystem path variables
			paths: {
				js: {
					source: 'source/js',
					dist: 'dist/js',

					libs: 'source/js/libs',
					global: 'source/js/global',
					single: 'source/js/single'
				},

				css: {
					source: 'source/scss',
					expanded: 'source/css',
					dist: 'dist/css',

					libs: 'source/scss/libs',
					global: 'source/scss/global',
					single: 'source/scss/single'
				},

				svg: {
					source: 'source/svgs',
					dist: 'dist/svgs'
				}
			}
		}
	});
};
