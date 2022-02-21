

### Project install
1. Run `docker-compose up -d --build`
2. Run `docker-compose exec app composer install`
3. Run `cp .env.example .env`
4. Run `docker-compose exec app php artisan key:generate`
5. Run `docker-compose exec app php artisan migrate`

### Project version 
version 
- laravel 8
- php 8
- mysql  


### API
Host: 127.0.0.1:8085

Run `docker-compose exec app php artisan route:list`

127.0.0.1:8085/api/posts
127.0.0.1:8085/api/comments
