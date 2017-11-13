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
		cwd: '<%= paths.img.svg %>',
		src: ['*.svg'],
		dest: 'svgs',
		ext: '.svg',
		extDot: 'first'
	}

};
