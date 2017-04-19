module.exports = {
  staticFileGlobs: [
    'built/app.bundle.js',
    'index.html',
    'node_modules/bulma/css/bulma.css',
    'manifest.json'
  ],

  runtimeCaching: [{
    urlPattern: /fonts\.googleapis\.com/,
    handler: 'networkFirst'
  }]
}
