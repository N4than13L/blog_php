-- Active: 1685716942938@@127.0.0.1@3306@blog

CREATE DATABASE IF NOT EXISTS blog;

USE blog;

-- inicio de las tablas.
CREATE TABLE usuarios (
    id INT(255) AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    pasword VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE categorias (
    id INT(255) AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE entradas(
    id INT(255) AUTO_INCREMENT NOT NULL,
    usuario_id INT(255) NOT NULL,
    categoria_id INT(255) NOT NULL,
    titulo VARCHAR(255) NOT NULL, 
    descripcion MEDIUMTEXT NOT NULL,
    fecha DATE NOT NULL,
    CONSTRAINT pk_entradas PRIMARY KEY(id),
    CONSTRAINT fk_entrada_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    CONSTRAINT fk_entrada_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE NOT ACTION
)ENGINE=InnoDb;


-- fin tablas.

SHOW TABLES;

SELECT * FROM usuarios;

SELECT * FROM categorias;

SELECT * FROM entradas;

-- insertar nuevos registros.
INSERT INTO usuarios VALUES(NULL, 'jose','bonilla', 'nathar@gmail.com', '5550123', '2023-03-06');

INSERT INTO usuarios VALUES(NULL, 'juan','perez', 'juanitoperez@gmail.com', '5550123', '2023-03-06');

INSERT INTO usuarios VALUES(NULL, 'elma','maria santos', 'elmamaria@gmail.com', '5550123', '2023-03-06');

INSERT INTO usuarios VALUES(NULL, 'luis','mendosa', 'mendozaluis@gmail.com', '5550123', '2023-03-06');

-- insertar filas solo con ciertas columnas.

INSERT INTO usuarios (email, pasword) VALUES('nathar@gmail.com', '5550123');

DESCRIBE usuarios;

-- sacar los datos del las tablas.
SELECT nombre, apellidos, email FROM usuarios;

-- operadores aritmeticos.
SELECT id, email,(id*2) as 'operacion' FROM usuarios ORDER BY id ASC;

-- funciones matematicas

SELECT ROUND( id, 2) AS 'operacion' FROM usuarios;

-- funciones para texto.
SELECT UPPER(nombre) FROM usuarios;

SELECT LOWER(nombre) FROM usuarios;

SELECT email, TRIM(CONCAT('   ',nombre, ' ', apellidos, '  '))  AS 'conversion' FROM usuarios;

-- fechas
SELECT email, DATEDIFF(fecha, CURDATE()) AS 'fecha actual' FROM usuarios;

SELECT email, DATE_FORMAT(fecha, '%d-%M-%Y') AS 'fecha actual' FROM usuarios;

SELECT email, STRCMP('hola', 'hol1a') FROM usuarios;

SELECT VERSION() FROM usuarios;

SELECT USER() FROM usuarios;

SELECT DISTINCT DATABASE() FROM usuarios;

SELECT email, IFNULL(apellidos, 'este campo esta vacio') FROM usuarios;

-- where
SELECT * FROM usuarios;

-- sacar nombres y apellidos de todos los usuarios registrados en 2023

SELECT nombre, apellidos FROM usuarios WHERE YEAR(fecha) = 2023;

SELECT * FROM usuarios;

-- sacr usuarios que no se registraron en 2019
SELECT nombre, apellidos FROM usuarios WHERE YEAR(fecha) != 2023 OR ISNULL(fecha);

-- mostrar el email de los usuarios cuando el apellido mantenga la letra a y su contrasena sea 5550123.

SELECT id, nombre, email FROM usuarios WHERE apellidos LIKE '%pe%' AND pasword = '5550123';


-- sacar todos los registro cuando el ano sea inpar.COMMENT
SELECT * FROM usuarios WHERE (YEAR(fecha) % 2 != 0);


-- sacar todos los registros de la tabla usuaeio cuando el nombre de usuario tenga mas de 5 letras y se hayan registrados antes del 2020 y el nombre este en mayusculas  

SELECT UPPER(nombre) AS 'NOMBRE', apellidos FROM usuarios WHERE LENGTH(nombre) < 5 AND YEAR(fecha) < 2020;

SELECT * FROM usuarios;

-- ORDER BY.

SELECT * FROM usuarios ORDER BY fecha DESC;

SELECT * FROM usuarios;

-- actualizar datos de las tablas.

UPDATE usuarios SET fecha = CURDATE() WHERE id = 5;

-- borrar registros.
DELETE FROM usuarios WHERE email = 'elsapito@gmail.com';
-- sabroso

-- AGRUPAMIENTO, (CONSULTAS).
INSERT INTO categorias VALUES(NULL, 'accion');
INSERT INTO categorias VALUES(NULL, 'accion');
INSERT INTO categorias VALUES(NULL, 'deportes');

SELECT * FROM categorias;
SELECT * FROM usuarios;

-- insert para las entradas
INSERT INTO entradas VALUES(null, 2, 1, 'Novedades delGTA V', 'review del videojuego', CURRENT_DATE());

INSERT INTO entradas VALUES(null, 5, 3, 'LOL', ' probando el videojuego', CURRENT_DATE());

INSERT INTO entradas VALUES(null, 5, 3, 'PES', 'El PES como videojuego de deportes', CURRENT_DATE());

INSERT INTO entradas VALUES(null, 2, 3, 'Formula 1', 'Lo que opino del formula 2', CURRENT_DATE());

INSERT INTO entradas VALUES(null, 7, 2, 'politica', 'lo que opino de la politica', CURRENT_DATE());

INSERT INTO entradas VALUES(null, 2, 1, 'resumen GTA Vice City', 'review del videojuego', CURRENT_DATE());

INSERT INTO entradas VALUES(null, 7, 1, 'Novedades delGTA V', 'review del videojuego', CURRENT_DATE());
SELECT * FROM usuarios;

SELECT * FROM entradas;

-- consultas de agrupamiento.

SELECT COUNT(titulo) as 'numero de entras', categoria_id FROM entradas GROUP BY categoria_id;

-- consultas de agrupamiento con condiciones

SELECT COUNT(titulo) as 'numero de entras', categoria_id FROM entradas GROUP BY categoria_id HAVING COUNT(titulo) >= 2;

-- sacar la media.
SELECT * FROM entradas;
SELECT AVG(id) AS 'media de las entradas' FROM entradas; 
SELECT MAX(id) AS 'maximo id', titulo FROM entradas; 
SELECT MIN(id) AS 'minimo id', titulo FROM entradas; 
SELECT SUM(id) AS 'suma de id', titulo FROM entradas; 

-- sub consultas
INSERT INTO usuarios VALUES(null, 'pepe', 'vever', 'pepe@gmail.com', '12345', CURDATE());

SELECT * FROM usuarios WHERE id IN (SELECT usuario_id FROM entradas);

SELECT usuario_id FROM entradas;

SELECT * FROM usuarios WHERE id NOT IN (SELECT usuario_id FROM entradas);

SELECT nombre, apellidos FROM usuarios WHERE id IN (SELECT usuario_id FROM entradas WHERE titulo LIKE '%GTA%'); 

SELECT * FROM entradas WHERE titulo LIKE '%GTA%';

-- sacar las entradas con el nombre de la categoria.
SELECT categoria_id, titulo FROM entradas WHERE categoria_id IN (SELECT id FROM categorias WHERE nombre = 'deportes');

SELECT * FROM categorias;

-- mostrar las categorias con mas de 3 entradas.
SELECT * FROM categorias WHERE id IN (SELECT categoria_id FROM entradas GROUP BY categoria_id HAVING COUNT(categoria_id)>=3);

-- SELECT COUNT(categoria_id), categoria_id FROM entradas GROUP BY categoria_id;

SELECT categoria_id, COUNT(categoria_id) FROM entradas GROUP BY categoria_id HAVING COUNT(categoria_id) >= 3;

-- mostrar los usuarios que crearos una estrada un martes.
SELECT * FROM usuarios WHERE id IN (SELECT usuario_id FROM entradas WHERE DAYOFWEEK(fecha) = 6);

SELECT usuario_id FROM entradas WHERE DAYOFWEEK(fecha) = 6;

-- mostrar el nombre de el usuario con mas entradas.
SELECT CONCAT(nombre, ' ', apellidos) AS 'el usuario con mas entradas' FROM usuarios WHERE id = (SELECT COUNT(id) FROM entradas GROUP BY usuario_id ORDER BY COUNT(id) DESC LIMIT 1);

SELECT CONCAT(nombre,' ',apellidos) AS 'Usuario con más entradas' FROM usuarios
WHERE id = (SELECT MAX(usuario_id) FROM entradas );

-- mostrar las categorias sin entradas.

SELECT * FROM categorias WHERE id NOT IN (SELECT categoria_id FROM entradas);

INSERT INTO categorias VALUES(NULL, 'plataformas');

-- consultas multitablas.
SELECT * FROM entradas;

-- mostrar las entradas con el nombre del autor y el nombre de la categoria.

SELECT e.id, e.titulo, u.nombre AS 'autor', c.nombre AS 'categoria' FROM entradas e, usuarios u, categorias c WHERE e.usuario_id = u.id AND e.categoria_id = c.id;


-- inner join
SELECT e.id, e.titulo, u.nombre AS 'autor', c.nombre AS 'categoria' FROM entradas e INNER JOIN usuarios u ON e.usuario_id = u.id
INNER JOIN categorias c ON e.categoria_id = c.id;
-- fin inner join

-- left join
SELECT c.nombre, COUNT(c.id) FROM categorias c
LEFT JOIN entradas e ON e.categoria_id = c.id GROUP BY e.categoria_id;
-- fin left join

-- rigth join 
SELECT c.nombre, COUNT(c.id) FROM entradas e
RIGHT JOIN categorias c ON e.categoria_id = c.id GROUP BY e.categoria_id;

SELECT * FROM categorias;

SELECT e.id, e.titulo, u.nombre AS 'autor', c.nombre AS 'categoria' FROM entradas e, usuarios u, categorias c WHERE e.usuario_id = u.id;

-- mostrar el nombre de las categorias y mostrar cuantas entradas tiene.
SELECT c.nombre, COUNT(c.id) FROM categorias c, entradas e WHERE e.categoria_id = c.id GROUP BY e.categoria_id;

-- mostrar los email de los usuarios y mostrar cuantas entradas tiene.

SELECT email, COUNT(titulo) FROM usuarios u, entradas e WHERE e.usuario_id = u.id GROUP BY e.usuario_id;


-- vistas.
CREATE VIEW entradas_con_nombres AS
SELECT e.id, e.titulo, u.nombre AS 'autor', c.nombre AS 'categoria' FROM entradas e, usuarios u, categorias c WHERE e.usuario_id = u.id;

SHOW CREATE VIEW entradas_con_nombres;

SHOW TABLES;
DROP VIEW entradas_con_nombres_dos;

SELECT * FROM entradas_con_nombres WHERE autor = 'jose';
