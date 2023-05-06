# instrucciones para correr la api
## Prerrequisitos
* Tener instalado XAMPP en tu equipo
* Tener instalado Git en tu equipo
## Pasos

Clona el repositorio de Git en una carpeta de tu elección. Puedes hacerlo utilizando el siguiente comando en la terminal:

* git clone https://github.com/sebastianesg/codingco.git *

Abre la carpeta del proyecto en tu editor de código.

Crea una copia del archivo .env.example y renómbralo como .env. Este archivo contiene la configuración de variables de base de datos.


Abre XAMPP y asegúrate de que los servicios de Apache y MySQL estén activos.

Abre una terminal en la carpeta del proyecto y ejecuta el siguiente comando para instalar las dependencias de Composer:

* composer install
Ejecuta el siguiente comando para generar una clave de aplicación en el archivo .env:

* php artisan key:generate

Ejecuta el siguiente comando para migrar las tablas de la base de datos:

Copy code
* php artisan migrate
Ejecuta el siguiente comando para insertar los registros de ejemplo en la tabla de productos:


* php artisan db:seed --class=ProductSeeder

Ejecuta el siguiente comando para iniciar el servidor de desarrollo:

php artisan serve


Los endpoints de la API que puedes probar:
GET /api/products: Obtiene una lista de todos los productos.
POST /api/products: Crea un nuevo producto.
GET /api/products/{id}: Obtiene los detalles de un producto específico.
PUT /api/products/{id}: Actualiza los detalles de un producto específico.
DELETE /api/products/{id}: Elimina un producto específico.
POST /api/sales: Crea una nueva venta con los detalles de los ítems vendidos.
Y eso es todo. ¡Espero que esto te ayude a poner en marcha tu aplicación Laravel en XAMPP!

JSON de prueba para crear producto
{
  "name": "Producto de ejemplo",
  "description": "Este es un producto de ejemplo",
  "price": 99.99
}

JSON de prueba para crear venta 
{
    "customer_name": "Juan Perez",
    "customer_email": "juanperez@example.com",
    "products": [
        {
            "id": 3,
            "price": 10.50
        },
        {
            "id": 2,
            "quantity": 3
        }
    ]
}