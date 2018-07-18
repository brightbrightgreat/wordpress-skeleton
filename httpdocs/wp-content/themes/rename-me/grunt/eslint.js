module.exports = {
	fix: {
		options: {
			fix: true,
		},

		src: [
			'<%= paths.js.global %>/**/*.js',
			'<%= paths.js.single %>/**/*.js'
		]
	},

	check: {
		options: {
			fix: false,
		},

		src: [
			'<%= paths.js.global %>/**/*.js',
			'<%= paths.js.single %>/**/*.js'
		]
	}
};
