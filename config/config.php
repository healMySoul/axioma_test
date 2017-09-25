<?php

Config::set('site_name', 'Axioma Test');

Config::set('routes', [
    'default' => '',
    'admin' => 'admin_',
]);

Config::set('default_route', 'default');
Config::set('default_controller', 'site');
Config::set('default_action', 'index');

Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'mvc');
