#!/bin/bash

# Asegurarse de que el repositorio está actualizado
git fetch
git pull

# Variables
DB_USER="u606769855_transportation"
DB_PASSWORD="Wifislaxutf-8"
DB_NAME="u606769855_transportation"
DUMP_DIR="sql_dumps/"

# Obtener el nombre del archivo de volcado más reciente
DUMP_FILE=$(ls -t $DUMP_DIR/*.sql | head -n 1)

# Importar el volcado a la base de datos local
mysql -u $DB_USER -p$DB_PASSWORD $DB_NAME < $DUMP_FILE
