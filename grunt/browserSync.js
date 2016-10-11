module.exports = {

  options: {
    proxy: '<%= vars.bsproxy %>',
    notify: false
  },
  dev: {
    options: {
      watchTask: true
    },
    src: '<%= vars.bswatch %>'
  },
  build: {
    options: {
      watchTask: false
    },
    src: '<%= vars.bswatch %>'
  }
};
