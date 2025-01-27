const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
*/
mix.sass("resources/sass/styles.scss", "public/css").options({
    processCssUrls: false,
});

mix.copy("resources/favicon.ico", "public/favicon.ico");
mix.copy("resources/css", "public/css");
mix.copy("resources/font", "public/font");
mix.copy("resources/icon", "public/icon");
mix.copy("resources/img", "public/img");
mix.copy("resources/js", "public/js");
mix.copy("resources/plugin", "public/plugin");

if (mix.inProduction()) {
    mix.version();
} else {
    mix.webpackConfig({
        stats: {
            children: true,
        },
    });
}
