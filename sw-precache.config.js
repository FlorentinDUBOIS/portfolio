module.exports = {
  staticFileGlobs: [
    'built/app.bundle.js',
    'index.html',
    'node_modules/bulma/css/bulma.css',
    'manifest.json'
  ],

  maximumFileSizeToCacheInBytes: 3145728,

  runtimeCaching: [{
    urlPattern: /fonts\.googleapis\.com/,
    handler: 'networkFirst'
  }]
}
