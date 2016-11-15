let gulp = require('gulp');
let path = require('path');
let swPrecache = require('sw-precache');

gulp.task('generate-service-worker', function(callback) {
  let rootDir = __dirname;

  swPrecache.write(path.join(rootDir, 'service-worker.js'), {
    stripPrefix: rootDir,
    staticFileGlobs: [
      rootDir + '/!(node_modules)/*.{js,html,css,png,jpg,gif,svg,eot,ttf,woff}',
      rootDir + '/node_modules/material-design-lite/*.{js,html,css,png,jpg,gif,svg,eot,ttf,woff}',
    ],
  }, callback);
});
