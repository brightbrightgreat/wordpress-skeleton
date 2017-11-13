module.exports = {
	options: {
		map: {
			inline: false, // save all sourcemaps as separate files...
			annotation: '<%= paths.css.dist %>' // ...to the specified directory
		},
		processors: [
			require("autoprefixer")( { browsers: "last 3 versions" } ),
			require("postcss-fixes")(),
			require("cssnano")({
				safe: true,
				preferredQuote: "single"
			})
		]
	},

	files: {
		cwd: '<%= paths.css.expanded %>',
		src: '*.css',
		dest: '<%= paths.css.dist %>',
		expand: true,
		ext: '.css'
	}
};
