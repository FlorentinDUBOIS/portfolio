let gulp = require('gulp');
let path = require('path');
let swPrecache = require('sw-precache');

gulp.task('generate-service-worker', function(callback) {
  let rootDir = '.';

  swPrecache.write(path.join(rootDir, 'service-worker.js'), {
    staticFileGlobs: [
      `${rootDir}/images/**/*.*`,
      `${rootDir}/scripts/**/*.*`,
      `${rootDir}/stylesheets/**/*.*`,
      `${rootDir}/index.html`,
      `${rootDir}/manifest.json`,
      `${rootDir}/service-worker.js`,
      `${rootDir}/node_modules/material-design-lite/*.*`,
    ],
  }, callback);
});
