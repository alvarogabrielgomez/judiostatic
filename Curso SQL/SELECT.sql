--Traer solo una columna especifica (en este caso la columna “name”):

SELECT name FROM clients;
--Traer varias columnas especificas (en este caso la columna “name” y “gender”):

SELECT name, email, gender FROM clients;
--Limitar el numero de resultados (en este caso maximo 10 resultados):

SELECT name, email, gender FROM clients LIMIT10;
--Condicionar los resultados a una caracteristica (en este caso todos los resultados que tengan gender con el valor “M”):

SELECT name, email, gender FROM clients WHERE gender='M';

--Utilizar funciones para obtener datos especificos (en este caso todas las Mujeres que en su nombre tengan la cadena “Lop”):

SELECT name, email, YEAR(NOW()) - YEAR(birthdate) AS edad, gender
FROM clients
WHERE gender='F'
    AND `name` LIKE'%Lop%'; -- %Lop% significa todo lo que haya antes de o despues de.

-- YEAR(NOW()) - YEAR(birthdate) AS edad (El AS es alias)
-- lo unico que hace es mostrarlo con ese nombre en la tabla
-- ademas de and esta between

SELECT b.book_id, a.name, b.title
FROM books as b
JOIN authors as a
on a.author_id = b.author_id
WHERE a.author_id between 1 and 5

-- INNER JOIN cruza las tablas e ignora los nulos 
SELECT c.name, b.title as book, a.name, t.type
FROM transactions as t -- tabla pivote
join books as b
    on t.book_id = b.book_id
join clients as c
    on t.client_id = c.client_id
join authors as a
    on b.author_id = a.author_id -- aca hacemos un join con otra tabla que no es pivote
where c.gender = 'F'
and t.type = 'sell' -- IN ('sell','lend') asi podemos elegir varias opciones
--
SELECT a.author_id, a.name, a.nationality, b.title
FROM authors as a
join books as b
    on b.author_id = a.author_id
where a.author_id between 1 and 5
ORDER BY a.author_id asc  -- ordenar por ID ascendente... dsc es descendente

-- LEFT JOIN muestra todo

SELECT a.author_id, a.name, a.nationality, b.title
FROM authors as a
LEFT join books as b
    on b.author_id = a.author_id
where a.author_id between 1 and 5
ORDER BY a.author_id asc
-- COUNT GROUP BY
SELECT a.author_id, a.name, a.nationality, COUNT(b.book_id)
FROM authors as a
LEFT join books as b
    on b.author_id = a.author_id
where a.author_id between 1 and 5
GROUP BY a.author_id
ORDER BY a.author_id asc

-- SELECT DISTINCT
SELECT DISTINCT nationality FROM authors ORDER BY nationality;
-- Seleciona las nacionalidades diferentes, no se repiten

-- Cuantos escritores hay de cada nacionalidad?
SELECT nationality, COUNT(author_id) AS c_authors
FROM authors
-- WHERE nationality IS NOT NULL -- esto haria que solo salgan los que no son null
GROUP BY nationality
ORDER BY c_authors DESC, nationality ASC -- primero ordeno por numero de nacionalidad, luego alfabeticamente
-- Mas ejemplos
SELECT nationality, AVG(price) AS prom, STDDEV(price) AS std
FROM books as b
JOIN authors as a 
ON a.author_id = b.author_id
GROUP BY nationality
-- Cual es el promedio/desviacion std del precio de libros?
SELECT nationality,
    COUNT(book_id) as libros,
    AVG(price) as promedio,
    STDDEV(price) as desviacion std
FROM books as b
JOIN authors as a
    ON a.author_id = b.author_id
GROUP BY nationality
ORDER BY libros DESC
-- Cual es el precio maximo/minimo de un libro?
SELECT nationality, MAX(price), MIN(price)
FROM books AS b
JOIN authors AS a
    ON a.author_id = b.author_id
GROUP BY nationality

-- Concatenar textos
-- Muestrame Nombre, venta, titulo, concatename autor mas nacionalidad y muestrame hace cuantos dias fue la operacion
SELECT c.name, t.type, b.title, CONCAT(a.name, " (", a.nationality, ")") AS autor,
TO_DAYS(NOW()) - TO_DAYS(t.created_at) AS ago
FROM transactions AS t
LEFT JOIN clients AS c
    ON c.client_id = t.client_id
LEFT JOIN books AS b
    ON b.book_id = t.book_id
LEFT JOIN authors AS a
    on b.author_id = a.author_id

-- DELETE

DELETE FROM authors WHERE author_id = 161
-- ES SUPER IMPORTANTE PONER EL WHERE LO MAS PUNTUAL POSIBLE

-- UPDATE AND DELETE
UPDATE clients
SET active = 0
WHERE client_id = 80
LIMIT 1

UPDATE clients
SET active = 0
WHERE client_id IN (1, 4, 6, 2, 24, 40) -- varios numeros
OR `name` LIKE '%Lopez%' -- O el nombre sa algo con Lopez

TRUNCATE clients -- BORRA TODO EL CONTENIDO DE LA TABLA DEJANDO LA ESTRUCTURA

-- SUM

SELECT sellable, SUM(price*copies) -- suma 1 por cada vez que se cumpla la condicion
FROM books
GROUP BY sellable

-- CONDICIONALES SUM

SELECT count(book_id),
    SUM(IF(YEAR < 1950, 1, 0)) as '<1950' -- IF (Condicion, devuelve tal si es true, si es false  )
FROM books


--SUPER QUERY
-- Muestrame una tabla de cantidad de libros divididos por categorias de year y cuantamelos, agrupandolo por nacionalidad
SELECT nationality as 'Nacionalidad', COUNT(book_id) as 'Book ID', 
SUM(IF(year < 1950, 1, 0)) AS"<1950" ,
SUM(IF(year >= 1950 and year < 1990, 1, 0)) AS"<1990" ,
SUM(IF(year >= 1990 and year < 2000, 1, 0)) AS"<2000",
SUM(IF(year >= 2000, 1, 0)) AS"<hoy"
FROM books AS b 
JOIN authors AS a
ON a.author_id = b.author_id
WHERE a.nationality IS NOT NULL
GROUP BY nationality