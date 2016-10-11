module.exports = {
	options: {
		processors: [
			require('autoprefixer')({
				browsers: ['last 3 versions']
			}),
			require('cssnano')()
		]
	},
	dev: {
		src: '<%= vars.css %>',
		dest: '<%= vars.css %>'
	}
};
