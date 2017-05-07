module.exports = {
  staticFileGlobs: [
    'built/app.bundle.js',
    'index.html',
    'manifest.json'
  ],

  maximumFileSizeToCacheInBytes: 3145728,

  runtimeCaching: [{
    urlPattern: /fonts\.googleapis\.com|secure\.gravatar\.com|assets\/images/,
    handler: 'cacheFirst'
  }]
}
