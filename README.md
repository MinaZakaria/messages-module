# messages-module

This is a basic messages module, that allows the user to send messages to other users, see a list of messages and search for the messages.

You can filter the messages list by search which search in messages contents and the sender/receiver names.

## Local Build
- Clone the project using
    ```sh
    git clone git@github.com:MinaZakaria/messages-module.git
    ```
- Navigate to the app directory using
    ```sh
    cd messages-module
    ```
- Add `.env` file By copying `.env.example` using
    ```sh
    cp .env.example .env
    ```
- Make sure DB Connection set correctly
- Run migrations using
    ```sh
    php artisan migrate
    ```
- Download Dependencies using
    ```sh
    composer install
    ```

- Run the local server
    ```sh
    php artisan serve
    ```
- use postman collection & environment variables in `./postman` directory to test the app.