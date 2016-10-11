module.exports = {

    // Development Files
    src: 'wordpress/wp-content/themes/moodesignz/',
    sass: '<%= vars.src %>/sass/main.sass',
    js: '<%= vars.src %>/js/**/*.js',
    images: 'wordpress/wp-content/uploads/',

    // Build Files
    build: '<%= vars.src %>',
    css: '<%= vars.build %>/css/moo_ui.css',
    buildjs: '<%= vars.build %>/moo_scripts.min.js',

    // BrowserSync
    bswatch: ['<%= vars.build %>**/*.php', '<%= vars.css %>', '<%= vars.buildjs %>'],
    bsproxy: 'moodesignz.dev/wordpress/',

    // Rsync Folder
    wplocal: 'wordpress/wp-content/themes/',
    wpremote: 'html/wp-content/themes/'
};
