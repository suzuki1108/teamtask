## 環境構築

```
# リポジトリのクローン
$ git clone ~~

# envのコピー
$ cp .env.example .env

# docker 環境構築
$ docker compose up -d

# コンテナに入る 
$ docker compose exec app bash

# composerのインストール
$ composer install

# npm
$ npm install & npm run dev

# JWTシークレットの作成
$ php artisan jwt:secret

```

http://localhost:80/ にアクセス