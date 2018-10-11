var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass('admin/admin.scss', 'public/css/admin');
});
