# Instrucciones para correr la aplicación

## Pasos 

    - Aceptar los `Pull Request`

1. **ejecutar en terminal los comandos**
    ```bash
    composer install
    npm install
    ```

2. **migrar nuevas tablas**
    ```bash
    php artisan migration:refresh
    ```

3. **inicar servidor artisan y node**
    ```bash
    php artisan serve
    npm run dev
    ```