 -- //Creando una base de datos desde la consola

DROP DATABASE IF EXISTS platzi_operation;

-- CREATE DATABASE IF NOT EXISTS platzi_operation;

CREATE DATABASE platzi_operation;

--//Seleccionando la Base de Datos para trabajar en ella
USE platzi_operation;

--//Creacion de tablas dentro de la Base de Datos seleccionada
CREATE TABLE IF NOT EXISTS books (
book_id INTEGER (10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
author_id INTEGER(10) UNSIGNED DEFAULT NULL,
title VARCHAR(100) NOT NULL,
`year`INTEGER(11) UNSIGNED NOT NULL DEFAULT '1900',
`language` VARCHAR(2) NOT NULL DEFAULT 'es' COMMENT 'ISO 639-1 Language', 
cover_url VARCHAR(500) DEFAULT NULL,
price DOUBLE(6,2) DEFAULT NULL,
sellable TINYINT(1) NOT NULL DEFAULT '1', --// es una manera de crear un true/false
`copies` INTEGER(11) NOT NULL DEFAULT '1',
`description` TEXT 
); 
--// las comillas a la derecha son para usar como nombres palabras reservadas sin problemas

CREATE TABLE IF NOT EXISTS authors (
	author_id INTEGER (10) UNSIGNED PRIMARY KEY UNIQUE AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	nationality VARCHAR(100) DEFAULT NULL
);

CREATE TABLE clients (

client_id INTEGER(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR(50) NOT NULL,
email VARCHAR(100) NOT NULL UNIQUE,
`birthdate` DATE DEFAULT NULL,
gender ENUM('M','F','ND') DEFAULT 'ND',
active TINYINT(1) NOT NULL DEFAULT '1',
created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP


); 


CREATE TABLE IF NOT EXISTS `transactions`(
    transaction_id INTEGER(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    book_id INTEGER(10) UNSIGNED NOT NULL,
    client_id INTEGER(10) UNSIGNED NOT NULL,
    `type` ENUM('lend','sell') NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    finished TINYINT(1) NOT NULL DEFAULT '0'

);


-- ALTER TABLE

ALTER TABLE authors
ADD COLUMN birthyear INTEGER DEFAULT 1930
AFTER `name`

ALTER TABLE authors
MODIFY COLUMN birthyear `year` DEFAULT 1920

ALTER TABLE authors
DROP COLUMN birthyear

CREATE DATABASE IF NOT EXISTS login_system;

CREATE TABLE users(

user_id INTEGER(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
user_uid VARCHAR(255) UNIQUE NOT NULL,
user_first VARCHAR(255) NOT NULL, 
user_last VARCHAR(255) NOT NULL, 
user_email VARCHAR(255) UNIQUE NOT NULL, 
user_pwd VARCHAR(255) NOT NULL,
active INT(1) NOT NULL DEFAULT '1' 

);