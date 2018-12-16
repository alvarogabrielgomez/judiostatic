mysqldump -u root -p cursoplatzi > esquemadatos.sql -- Esquema mas datos
mysqldump -u root -p  -d cursoplatzi  > esquema.sql -- sin datos

-- WINDOWS

mysqldump -u root -p cursoplatzi > "D:\esquemadatos.sql" -- Esquema mas datos
mysqldump -u root -p  -d cursoplatzi  > "D:\esquema.sql" -- sin datos
