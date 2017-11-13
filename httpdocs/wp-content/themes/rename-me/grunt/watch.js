module.exports = {

	php: {
		files: [
			'../**/*.php',
			'../classes/**/*.php'
		],
		tasks: ['php'],
		options: { spawn: false },
	},

	styles: {
		files: [
			'<%= paths.css.source %>/**/*.scss',
			'<%= paths.css.expanded %>/**/*.css',
			'<%= paths.css.dist %>/**/*.css'
		],
		tasks: ['css', 'notify:css'],
		options: { spawn: false },
	},

	scripts: {
		files: [
			'<%= paths.js.source %>/**/*.js',
			'<%= paths.js.dist %>/**/*.js'
		],
		tasks: ['javascript', 'notify:js'],
		options: { spawn: false },
	},

	svgs: {
		files: ['<%= paths.img.svg %>/*.svg'],
		tasks: ['svgs', 'notify:svg'],
		options : { spawn: false }
	}
};
