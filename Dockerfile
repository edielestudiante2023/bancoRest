# Usa la imagen oficial de MySQL como base
FROM mysql:latest

# Establece la contraseña de root de MySQL (cámbiala por la que desees)
ENV MYSQL_ROOT_PASSWORD='banco2024'

# Copia un script SQL personalizado para inicializar la base de datos (opcional)
COPY ./scripts/initialization.sql /docker-entrypoint-initdb.d/

# Expone el puerto por defecto de MySQL
EXPOSE 3306

# Establece el comando predeterminado para ejecutar MySQL
CMD ["mysqld"]

# OS (SISTEMA OPERATIVO) --> (IMG DESCONPRIME --> DISCO DURO --> 
