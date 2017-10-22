const { resolve } = require("path");

module.exports = {
  entry: resolve(__dirname, "src/index.js"),
  output: {
    filename: "portfolio.bundle.js",
    path: resolve(__dirname, "dist")
  },

  module: {
    rules: [
      {
        test: /\.js$/,
        use: "babel-loader"
      }
    ]
  }
};
