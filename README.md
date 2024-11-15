# Proyecto: Reto_Autos

## Índice
1. Descripción
2. Requisitos del sistema
3. Crear el Proyecto en Laravel
4. Configuración de Entorno
5. Migraciones de Base de Datos
6. Iniciar el Servidor de Desarrollo
7. Funcionalidades
8. Validaciones
9. Estructura de la Base de Datos
10. Subir el Proyecto a GitHub
11. Descargar el Proyecto desde GitHub

1. **Descripción**

`Reto_Vehiculos` es una aplicación web desarrollada con el framework Laravel, diseñada para gestionar un sistema 
de registro de vehículos. La aplicación incluye funcionalidades para crear, leer, actualizar y eliminar registros de vehículos (CRUD).

2. **Requisitos del sistema**

- PHP >= 8.0
- Composer
- Laravel 10
- Servidor de base de datos (MySQL, SQLite, PostgreSQL, etc.)
- Xammp
- Git

3. **Crear el  Proyecto  en Laravel**:
` bash`
   composer create-project --prefer-dist laravel/laravel reto_vehiculos cd reto_vehiculos
   cd reto_vehiculos

4. **Configuración de Entorno**

## Crea una copia del archivo .env.example y renómbralo a .env:

`bash`
   cp .env.exmple .env

## Configura la base de datos en el archivo .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reto_autos
DB_USERNAME=root
DB_PASSWORD

5. **Migraciones de Base de Datos**
## Ejecuta las migraciones para crear las tablas necesarias**:
`bash`
   php artisan migrate

6. **Iniciar el Servidor de Desarrollo**
## inicia el servidor de desarrollo:
`bash`
   php artisan serve
   Abre tu navegador y vista para ver la aplicación en funcionamiento.
   INFO  Server running on [http://127.0.0.1:8000].   

7. **Funcionalidades**

- Crear Vehículo: Permite registrar un nuevo vehículo a través de un formulario.
- Leer Vehículos: Muestra una lista de vehículos registrados con todos sus detalles.
- Editar Vehículo: Habilita la edición de la información de un vehículo registrado.
- Eliminar Vehículo: Permite la eliminación de un vehículo de la base de datos.

8. **Validaciones**
* El campo placa debe ser único para cada vehículo.
* La fecha de compra debe ser una fecha válida.
* Todos los campos son obligatorios.

9. **Estructura de la Base de Datos**

* id: Identificador único del vehículo.

* marca: Fabricante del vehículo.

* placa: Identificación única del vehículo.

* color: Color del vehículo.

* modelo: Año del modelo del vehículo.

* fecha_compra: Fecha en la que fue adquirido el vehículo.

* accidente: Indica si el vehículo ha tenido un accidente (booleano).

* created_at y updated_at: Timestamps para seguimiento de la creación y actualización de registros.

10. **Subir el Proyecto a GitHub**
## Inicializa un repositorio Git:
`bash`
  git init

## Añade todos los archivos y realiza un commit inicial:
`bas`
  git commit -m "Initial comit"

## Añade el repositorio remoto y sube los cambios:
`bash` 
   git remote add origin https://github.com/tu_usuario/reto_vehiculos.git 
   git push -u origin master

11. **Descargar el Proyecto desde GitHub**
## Clona el repositorio desde GitHub:
`bash`
   git clone https://github.com/tu_usuario/reto_vehiculos.git 
   cd reto_vehiculos









 
 
