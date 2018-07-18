module.exports = {
	your_target: {
		files: {
			'<%= paths.css.global %>/core.scss': '<%= paths.css.global %>/**/*.scss'
		},
		options: {
			useSingleQuotes: false,
		}
	}
};
