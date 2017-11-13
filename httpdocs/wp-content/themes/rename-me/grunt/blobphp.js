module.exports = {
	check: {
		src: process.cwd(),
		options: {
			colors: true,
			warnings: true
		}
	},
	fix: {
		src: process.cwd(),
		options: {
			fix: true
		},
	}
};
