## 環境構築

```
# リポジトリのクローン ディレクトリの移動
$ git clone ~~
$ cd teamtask

# envのコピー
$ cp .env.example .env

# docker 環境構築
$ docker compose up -d

# コンテナに入る （以降の作業はコンテナ内で実施）
$ docker compose exec app bash

# composerのインストール
$ composer install

# Laravelのenvのコピー
$ cp .env.example .env

# npm
$ npm install & npm run dev

# keyの作成
$ php artisan key:generate

# JWTシークレットの作成
$ php artisan jwt:secret

```

http://localhost:80/ にアクセス
