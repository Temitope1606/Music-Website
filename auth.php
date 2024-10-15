<?php
ob_start();
session_start();
require_once("musicWeb.php");

// declaring and initializing an object
$mw = new musicWeb("localhost", "root", "", "musicwebsite_project");

$sql = "CREATE TABLE IF NOT EXISTS userinfo_table(
    sn INT AUTO_INCREMENT PRIMARY KEY,
    username text NOT NULL,
    email text NOT NULL,
    password text NOT NULL,
    favorite_music_genre text NOT NULL,
    user_category text NOT NULL,
    date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$musicSql = "CREATE TABLE IF NOT EXISTS songlist_table(
song_id INT AUTO_INCREMENT PRIMARY KEY,
song_title text NOT NULL,
artist text NOT NULL,
music_file VARCHAR(255) NOT NULL,
music_picture VARCHAR(255) NOT NULL,
genre text NOT NULL,
date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$KpopMusicSql = "CREATE TABLE IF NOT EXISTS kpop_table(
    song_id INT AUTO_INCREMENT PRIMARY KEY,
    song_title text NOT NULL,
    artist text NOT NULL,
    music_file VARCHAR(255) NOT NULL,
    music_picture VARCHAR(255) NOT NULL,
    genre text NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

$PopRBMusicSql = "CREATE TABLE IF NOT EXISTS pop_rnb_table(
    song_id INT AUTO_INCREMENT PRIMARY KEY,
    song_title text NOT NULL,
    artist text NOT NULL,
    music_file VARCHAR(255) NOT NULL,
    music_picture VARCHAR(255) NOT NULL,
    genre text NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

$hiphopMusicSql = "CREATE TABLE IF NOT EXISTS hiphop_table(
    song_id INT AUTO_INCREMENT PRIMARY KEY,
    song_title text NOT NULL,
    artist text NOT NULL,
    music_file VARCHAR(255) NOT NULL,
    music_picture VARCHAR(255) NOT NULL,
    genre text NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

$gospelMusicSql = "CREATE TABLE IF NOT EXISTS gospel_table(
    song_id INT AUTO_INCREMENT PRIMARY KEY,
    song_title text NOT NULL,
    artist text NOT NULL,
    music_file VARCHAR(255) NOT NULL,
    music_picture VARCHAR(255) NOT NULL,
    genre text NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

$SamplemusicSql = "CREATE TABLE IF NOT EXISTS sample_songlist_table(
    song_id INT AUTO_INCREMENT PRIMARY KEY,
    song_title text NOT NULL,
    artist text NOT NULL,
    music_file VARCHAR(255) NOT NULL,
    music_picture VARCHAR(255) NOT NULL,
    genre text NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";


$mw->createTable($sql);
$mw->createTable($musicSql);
$mw->createTable($KpopMusicSql);
$mw->createTable($PopRBMusicSql);
$mw->createTable($hiphopMusicSql);
$mw->createTable($gospelMusicSql);
$mw->createTable($SamplemusicSql);
