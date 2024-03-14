const mix = require('laravel-mix');
const webpack = require('webpack');

mix.js('resources/js/app.js', 'public/js')
    .css('resources/css/app.css', 'public/css')
    .version()
    .vue();

mix.webpackConfig({
    plugins: [
        new webpack.DefinePlugin({
            '__VUE_PROD_HYDRATION_MISMATCH_DETAILS__': true,
        }),
    ],
});
