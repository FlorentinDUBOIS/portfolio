const { resolve } = require('path')

module.exports = {
  entry: resolve(__dirname, 'src/app.tsx'),
  output: {
    filename: 'app.bundle.js',
    path: resolve(__dirname, 'built')
  },

  resolve: {
    extensions: [
      ".js",
      ".jsx",
      ".ts",
      ".tsx"
    ]
  },

  module: {
    rules: [{
      test: /\.tsx?$/,
      use: [{
        loader: 'awesome-typescript-loader',
      }]
    }]
  }
}
