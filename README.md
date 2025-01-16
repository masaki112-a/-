勤怠管理アプリ

![スクリーンショット 2025-01-16 204203](https://github.com/user-attachments/assets/03d3948c-7d8c-4d17-b281-e1ea5f71042a)

[機能一覧]
ログイン機能
勤怠機能
ユーザー一覧

使用技術(実行環境)

PHP8.3.0

Laravel8.83.27

MySQL8.0.26


[テーブル設計]

![スクリーンショット 2025-01-16 204321](https://github.com/user-attachments/assets/cd6c5872-9f6e-4bc8-8a98-906e2f329c55)

[ER図]

![ER drawio](https://github.com/user-attachments/assets/07d2ec11-3183-4bf0-a078-947736880fff)

URL
開発環境：http://localhost/
phpMyAdmin:：http://localhost:8080/



[環境構築]

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
「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成

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

