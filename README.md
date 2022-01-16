

### Project install
1. `git checkout develop`
2. Run `docker-compose up -d --build`
3. Run `docker-compose exec app composer install`
4. Run `docker-compose exec app php artisan key:generate`
5. http://127.0.0.1:8085/

### Project version 
version 
- laravel 8.79.0
- php 8.1.1
- mysql 8.0
 


### 資料庫測驗
題目ㄧ
- 檔案: tmp.sql
- 房間資料表 加上 price  訂單資料表 加上 property_id user_id 
- SQL 
`` SELECT o.property_id ,p.name ,p.id ,COUNT(o.property_id) as total FROM orders o  join properties p WHERE o.property_id  = p.id 
  AND o.created_at >='2021-02-01' AND o.created_at <'2021-03-01' 
  GROUP BY o.property_id ORDER BY total DESC , o.property_id  DESC LIMIT 10 ``

 題目二
- created_at 增加索引
 

###  API 實作測驗 => Swagger API ( API 設計文件)
- http://127.0.0.1:8085/api/documentation
