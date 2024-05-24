#!/bin/bash

# Inicia o servidor PHP embutido
php artisan serve --host=0.0.0.0 &

# Inicia o Horizon
php artisan horizon