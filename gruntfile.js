// Gruntfile.js
module.exports = function(grunt) {
    require('load-grunt-config')(grunt);
    grunt.registerTask('dev', ['sass', 'concat', 'browserSync:dev', 'watch']);
    grunt.registerTask('build', ['sass', 'postcss', 'concat', 'uglify', 'browserSync:build']);
    grunt.registerTask('deploy', ['rsync:push']);
};
