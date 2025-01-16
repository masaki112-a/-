勤怠管理アプリ
環境構築
Dockerビルド

git clone git@github.com:masaki112-a/-.git
DockerDesktopアプリを立ち上げる
docker-compose up -d --build


mysql:
    platform: linux/x86_64
    image: mysql:8.0.26
    environment:
Laravel環境構築

docker-compose exec php bash

composer install

.envに以下の環境変数を追加

DB_CONNECTION=mysql

DB_HOST=mysql

DB_PORT=3306

DB_DATABASE=laravel_db

DB_USERNAME=laravel_user

DB_PASSWORD=laravel_pass

アプリケーションキーの作成
php artisan key:generate
マイグレーションの実行
php artisan migrate
シーディングの実行
php artisan db:seed
使用技術(実行環境)
PHP8.3.0
Laravel8.83.27
MySQL8.0.26
ER図
![ER drawio](https://github.com/user-attachments/assets/07d2ec11-3183-4bf0-a078-947736880fff)

URL
開発環境：http://localhost/
phpMyAdmin:：http://localhost:8080/
