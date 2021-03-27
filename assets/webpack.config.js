const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const cssnano = require('cssnano') //https://cssnano.co/
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const CopyPlugin = require('copy-webpack-plugin'); // https://webpack.js.org/plugins/copy-webpack-plugin/
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
// manage dependencies between front+backend
const DependencyExtractionWebpackPlugin = require( '@wordpress/dependency-extraction-webpack-plugin' );

const path = require('path');

const JS_DIR = path.resolve(__dirname, 'src/js');
const IMG_DIR = path.resolve(__dirname, 'src/img');
const LIB_DIR = path.resolve(__dirname, 'src/library');
const BUILD_DIR = path.resolve(__dirname, 'build');

const entry = {
  main: JS_DIR + '/main.js',
  single: JS_DIR + '/single.js',
  editor: JS_DIR + '/editor.js',
  blocks: JS_DIR + '/blocks.js'
}
const output = {
  path: BUILD_DIR,
  filename: 'js/[name].js'
}

const rules = [
  {
    test: /\.js$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: 'babel-loader'
  },
  {
    test: /\.scss$/,
    exclude: /node_modules/,
    use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
  },
  {
    test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
    use: [{
      loader: 'file-loader',
      options: {
        name: '[path][name].[ext]',
        // because /build > /src/js
        publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
      }
    }]
  },
  {
    test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
    exclude: [IMG_DIR, /node_modules/],
    use: {
      loader: 'file-loader',
      options: {
        name: '[path][name].[ext]',
        publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
      }
    }
  }
]

const plugins = (argv) => [

  new CleanWebpackPlugin({
    // automatically remove all unused webpack assets on rebuild
    cleanStaleWebpackAssets: ('production ' === argv.mode)
  }),

  new MiniCssExtractPlugin({
    filename: 'css/[name].css'
  }),

  new CopyPlugin({
    patterns: [
      { from: LIB_DIR, to: BUILD_DIR + '/library' }
    ]
  }),

  new BrowserSyncPlugin(
    // BrowserSync options
    {
      // browse to http://localhost:3000/ during development
      host: 'localhost',
      port: 3000,
      // proxy the Webpack Dev Server endpoint
      // (which should be serving on http://localhost:3100/)
      // through BrowserSync
      // proxy: 'http://localhost:3100/'
      proxy: 'http://dummycontent.local/'
    },
    // plugin options
    {
      // prevent BrowserSync from reloading the page
      // and let Webpack Dev Server take care of this
      // reload: false
    }
  ),

  new DependencyExtractionWebpackPlugin( {
		injectPolyfill: true,
    // 
		combineAssets: true,
	} )

]

// env - https://webpack.js.org/api/cli/#environment-options
// argv -  https://webpack.js.org/configuration/configuration-types/#exporting-a-function
module.exports = (env, argv) => ({
  entry: entry,
  output: output,
  devtool: 'source-map',
  module: {
    rules: rules
  },
  optimization: {
    minimizer: [
      new OptimizeCssAssetsPlugin({
        cssProcessor: cssnano
      }),
      new UglifyJsPlugin({
        cache: false,
        parallel: true,
        sourceMap: false
      })
    ]
  },
  plugins: plugins(argv),
  externals: {
    jquery: 'jQuery'
  }
})