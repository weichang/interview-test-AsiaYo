

### Project install
1. `git checkout develop`
2. Run `docker-compose up -d --build`
3. Run `docker-compose exec app composer install`
4. Run `docker-compose exec app php artisan key:generate`
5. http://127.0.0.1:8085/

### Swagger API ( API 設計文件)
- http://127.0.0.1:8085/api/documentation

### Project version 
version 
- laravel 8
- php 8
- mysql  
