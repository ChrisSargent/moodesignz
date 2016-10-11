module.exports = {

	push: {
		options: {
			recursive: true,
			src: '<%= vars.wplocal %>',
			dest: '<%= vars.wpremote %>',
			host: 'n72f3258732714@p3nlpaas001.shr.prod.phx3.secureserver.net',
			delete: true,
			exclude: [
				'node_modules',
				'.gitignore',
				'grunt',
				'.git',
				'gruntfile.js',
				'.DS_Store',
				'_design'
			],
			ssh: true,
			args: ['--verbose']
		}
	}
};
