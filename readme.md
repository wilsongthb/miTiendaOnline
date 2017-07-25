# Instalacion:

- Instalar git
- Instalar xampp
- Agregar PHP al PATH del sistema
- Instalar composer
- Clonar el proyecto de github con 
```
git clone https://github.com/wilsongthb/miTiendaOnline.git
cd miTiendaOnline
```
- Instalar dependencias php con
 ```
 composer install
 ```
 - Crear una base de datos llamada ```mitiendaonline```
 - Modificar las credenciales de acceso en el archivo ```.env```
 - Migrar la base de datos con los comandos, en la carpeta del proyecto
 ```
php artisan migrate
php artisan db:seed
```
- Iniciar la ejecucion
```
php serve
```
- Abrir el navegador en ```http://localhost:8000```