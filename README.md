# Instrucciones para correr la aplicación

## Pasos 

1. **ejecutar en terminal los comandos**
    ```bash
    composer install
    npm install
    ```

2. **migrar nuevas tablas y seeders para datos de prueba**
    ```bash
    php artisan migration:refresh --seed
    ```
3. **crea y configura archivo .env**

4. **copia contenido del archivo .env.example y genera key**
    ```bash
    php artisan key:generate
    ```

5. **inicar servidor artisan y node**
    ```bash
    php artisan serve
    npm run dev
    ```
