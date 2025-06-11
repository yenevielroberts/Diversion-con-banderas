<?php
include('includes/errorHandler.php');
include('/workspaces/m7-a14-diversi-n-con-banderas-yenevielroberts/funciones.php');
    $db = new SQLite3('flags.db');

    $db->exec("CREATE TABLE IF NOT EXISTS users(
        'user_id' INTEGER,
        'user_nom' TEXT not null,
        'user_password' TEXT NOT NULL,
        'user_type' TEXT not null CHECK (user_type in ('common_user', 'admin_user')),
        PRIMARY KEY ('user_id' AUTOINCREMENT)

    );");

    $db->exec("INSERT INTO users ('user_nom', 'user_password','user_type') VALUES ('yene','1f3870be274f6c49b3e31a0c6728957f','admin_user')");

$db->exec("CREATE TABLE IF NOT EXISTS partidas(
    'par_id' INTEGER,
    'par_partida' INTEGER,
    'par_preg_acertadas' INTEGER,
    'user_id' INTEGER  not null,
    PRIMARY KEY ('par_id' AUTOINCREMENT),
    FOREIGN KEY ('user_id') REFERENCES users (user_id)

);");

    $db->exec("CREATE TABLE IF NOT EXISTS ranking(
        'ran_id' INTEGER,
        'total_partidas' INTEGER,
        'total_preg_acertadas' INTEGER,
        'user_id' INTEGER  not null,
        PRIMARY KEY ('ran_id' AUTOINCREMENT),
        FOREIGN KEY ('user_id') REFERENCES users (user_id)
    
    );");
    
$db->close();

?>