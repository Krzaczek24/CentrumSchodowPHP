<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '78.46.43.228',
    'username'  => 'krzaczek_cs',
    'password'  => 'h#)G@)81b5B22$E',
    'database'  => 'krzaczek_centrumschodow',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);

$capsule->bootEloquent();