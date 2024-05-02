-- Creacion de base de datos
CREATE DATABASE IF NOT EXISTS test;

-- Seleccion de la base de datos creada
USE test;

-- Crear la table 
CREATE TABLE pokemon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_identificador VARCHAR(50),
    imagen VARCHAR(255),
    nombre VARCHAR(100),
    tipo TEXT,
    descripcion TEXT
);


-- Insertar Pokemones.-
INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
VALUES ('PIK001', 'pikachu', 'Pikachu', 'Electrico', 'Un pequeño Pokémon roedor que tiene electricidad almacenada en sus mejillas.');
INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
VALUES ('CHA002', 'charmander', 'Charmander', 'Fuego', 'Un pequeño lagarto con una llama ardiente en su cola.');
INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
VALUES ('BUL003', 'bulbasaur', 'Bulbasaur', 'Planta', 'Un Pokémon que tiene una semilla en su lomo desde el día que nace.');
INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
VALUES ('SQU004', 'squirtle', 'Squirtle', 'Agua', 'Una pequeña tortuga que lanza chorros de agua desde su boca.');
INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
VALUES ('JIG005', 'jigglypuff', 'Jigglypuff', 'Normal', 'Un Pokémon con forma de bola rosada que canta canciones de cuna para dormir a sus enemigos.');
INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
VALUES ('GEN006', 'gengar', 'Gengar', 'Fantasma', 'Un Pokémon que se esconde en las sombras y disfruta asustando a la gente.');
INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
VALUES ('VAP007', 'vaporeon', 'Vaporeon', 'Agua', 'Un Pokémon con una estructura corporal similar a la del agua.');
INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
VALUES ('ALA008', 'alakazam', 'Alakazam', 'Psiquico', 'Un Pokémon con una inteligencia y habilidades psíquicas extraordinarias.');
INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
VALUES ('DRA009', 'dragonite', 'Dragonite', 'Dragon', 'Un Pokémon que se dice que ha volado alrededor del mundo en solo 16 horas.');
INSERT INTO pokemon (numero_identificador, imagen, nombre, tipo, descripcion) 
VALUES ('SNO010', 'snorlax', 'Snorlax', 'Normal', 'Un Pokémon extremadamente perezoso que duerme todo el día y come sin parar cuando está despierto.');
