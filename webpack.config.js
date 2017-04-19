const {resolve} = require('path')
const {optimize} = require('webpack')

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
        loader: 'babel-loader'
      }, {
        loader: 'awesome-typescript-loader',
      }]
    }]
  }
}
