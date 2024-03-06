const Encore = require('@symfony/webpack-encore');

Encore
  // Output path for compiled assets (adjust as needed)
  .setOutputPath('public/build/')
  // Public path used by the web server to access the output path
  .setPublicPath('/build')
  // Entry point(s) for your JavaScript application(s)
  .addEntry('app', './assets/app.js')

  // Optional: Enable jQuery (uncomment if needed)
  // .autoProvidejQuery()

  // Optional: Sass/LESS/Stylus pre-processing
  // .addStyleEntry('styles', './assets/styles/app.scss') // For SASS
  // .enableSassLoader() // Or adjust for LESS or Stylus

  // Optional: Babel configuration for transpiling modern JavaScript
  // .configureBabel((config) => {
  //   // Add needed presets or plugins
  // })

  // Optional: Copy assets (images, fonts, etc.)
  // .copyFiles({
  //   from: './assets/images',
  //   to: 'images/[path][name].[ext]',
  // })

  // Optional: Configure Encore modules (adjust as needed)
  // .configureLoader('babel', {
  //   options: {
  //     // Babel options
  //   },
  // })

  // Optional: Enable source maps for easier debugging
  .enableSourceMaps(!Encore.isProduction())
  // Optional: Other Encore configurations

  // Build mode (adjust for development or production)
  .enableVue() // If using Vue.js
  // .enableReact() // If using React.js
  // .enableStimulus() // If using Stimulus
  .enableIntegritySha384()
  .enableTypeScriptLoader(false) // Adjust for TypeScript usage
;

module.exports = Encore.getWebpackConfig();
