module.exports = {

    options: {
        nonull: true
    },
    concat: {
        src: [
            '<%= vars.js %>'
        ],
        dest: '<%= vars.buildjs %>'
    }
};
