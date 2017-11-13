module.exports = {

	options: {
		parseFiles: true,
		devFile: false,
		classPrefix: 'support-',
		uglify: true,
		setClasses: true,
		excludeTests: [
			'emoji',
			'svg',
			'json'
		]
	},

	files: [
		'<%= paths.css.dist %>/*.css',
		'<%= paths.js.global %>/*.js',
		'<%= paths.js.single %>/*.js'
	]

};
