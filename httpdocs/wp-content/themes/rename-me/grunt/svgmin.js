module.exports = {
	options: {
		plugins: [
			{ removeViewBox: false },
			{ removeUselessStrokeAndFill: true },
			{ removeRasterImages: true }
		]
	},

	files: {
		expand: true,
		cwd: '<%= paths.svg.source %>',
		src: ['**/*.svg'],
		ext: '.svg',
		dest: '<%= paths.svg.dist %>',
		extDot: 'first',
		flatten: true
	}

};
