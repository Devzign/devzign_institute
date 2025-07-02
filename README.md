# devzign_institute

This repository demonstrates a very small PHP backend built in a modular way for educational purposes.

## Project structure

```
public/          # Document root used by the PHP development server
    index.php    # Entry file that registers routes
src/
    Router.php   # Minimal HTTP router
    controllers/
        HelloController.php  # Sample controller
```

## Prerequisites
- PHP 8 or later installed on your system.

## Running the application

1. Navigate to this directory in your terminal.
2. Start the built-in PHP development server:
   ```bash
   php -S localhost:8000 -t public
   ```
3. Open your browser and visit [http://localhost:8000](http://localhost:8000).
   You should see `Hello from the PHP backend!` displayed.

## Extending the code
- Add new routes in `public/index.php` using `$router->get('/path', [ClassName::class, 'method']);`.
- Create additional controllers inside `src/controllers` to organize your logic.

This setup keeps the code modular and easy to expand for larger projects.
