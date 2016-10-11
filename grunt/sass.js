module.exports = {

    options: {
        style: 'expanded',
        sourcemap: 'none',
        loadPath: 'bower_components/reset-css/'
    },
    sass: {
        src: '<%= vars.sass %>',
        dest: '<%= vars.css %>'
    }
};
