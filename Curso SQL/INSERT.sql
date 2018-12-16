-- INSERT INTO tabla(COLUMNAS) VALUES (VALOR);

INSERT INTO authors (author_id, name, nationality)
VALUES ('','Juan Ruflo', 'MEX');

INSERT INTO authors (name, nationality) -- solo selecciono 2
VALUES ('Gabriel Garcia Marquez', 'COL');

INSERT INTO authors -- no estoy poniendo donde, asi que automaticamente 
-- elige todas
VALUES('', 'Juan Gabriel Vasquez', 'COL' );

INSERT INTO authors (name, nationality) -- Asi puedo insertar varios valores de una vez
VALUES('Julio Cortazar','ARG'), 
('Isabel Allende','CHI'),
('Octavio Paz','MEX'),
('Juan Carlos Onetti','URG');

INSERT INTO `clients` (client_id, name, email, birthdate, gender, active, created_at) VALUES (1,'Maria Dolores Gomez','Maria Dolores.95983222J@random.names','1971-06-06','F',1,'2018-04-09 16:51:30'),
(2,'Adrian Fernandez','Adrian.55818851J@random.names','1970-04-09','M',1,'2018-04-09 16:51:30'),
(3,'Maria Luisa Marin','Maria Luisa.83726282A@random.names','1957-07-30','F',1,'2018-04-09 16:51:30'),
(4,'Pedro Sanchez','Pedro.78522059J@random.names','1992-01-31','M',1,'2018-04-09 16:51:30');

INSERT INTO clients (client_id, name, email, birthdate, gender) VALUES ('','Alvaro Gabriel Gomez','alvarogabrielgomez@gmail.com','1997-04-24','M');

-- Si quiero actualizar algun dato puedo hacer lo siguiente
UPDATE `clients` SET `name` = 'Ckjones1', `birthdate` = '2018-12-18 00:00:00' WHERE `clients`.`client_id` = 6;

UPDATE `clients` SET `name` = 'ELGUEVO'  WHERE `clients`.`client_id` = 6
-- pendiente de las mamaguevass comillas, estan estas `` y estas ''


-- si quiero cambiar un dato de un insert completo que puede tener
-- duplicados has esto. en el ejemplo solo cambie el nombre
INSERT INTO `clients` (client_id, name, email, birthdate, gender) VALUES ('','Alvaro Gabriel','alvarogabrielgomez@gmail.com','1997-04-24','M')
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);
-- esto serviria para evitar conflictos en grandes cantidades.
-- nunca permitir el sobreescrito de un ID 

--insertar datos usando querys anidados
-- ya que tenemos una base de datos con los libros, otra con los autores,
-- y otra con los clientes necesitamos usar este metodo

INSERT INTO books(title, author_id, `year`) -- comenzamos el insert
VALUES('Vuelta al Laberinto de la Soledad', -- valores son Nombre Libro, ID Autor, Year
    (SELECT author_id FROM authors -- Aca seleccionamos de la otra tabla authors el ID
    WHERE `name` = 'Octavio Paz' -- Seleccionamos buscando por el nombre del autor
    LIMIT 1 -- limitamos la cantidad de datos a 1
    ), 1960 -- terminamos la sentencia del insert poniendo el Year
)
);

INSERT INTO`transactions`(client_id, book_id, `type`, finished) VALUES
(34, 12, 'sell', 1), 
(87, 54, 'lend', 0), 
(14, 3, 'sell', 1), 
(54, 1, 'sell', 1), 
(81, 12, 'lend', 1), 
(81, 12, 'sell', 1), 
(29, 87, 'sell', 1);

INSERT INTO books VALUE ('', (SELECT author_id FROM authors WHERE `name` = 'Alvaro Gabriel Gomez' LIMIT 1), 'Oblivion 2', 2018, 'ES', '', 12.40, '', '1', 'Otro libro de puta madre')