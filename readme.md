# Laravel Upload Images To Amazon S3

## How do I set this up?

### Clone the repo to your local machine

```html
git clone git@github.com:chidang/laravel-aws-s3.git
cd path-to-project/laravel-aws-s3
composer install
```

### Copy file .env.example to .env

```html
cp .env.example .env
```

### Create database and update your .env file

#### Database configuration
```html
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=laravel-aws-s3
DB_USERNAME=root
DB_PASSWORD=
```
#### AWS S3 configuration

```html
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
AWS_URL=
FILESYSTEM_DRIVER=s3
```

### Running Migrations

```html
php artisan migrate
```

That’s all. Application is ready now.

```html
php artisan serve
```

Happy Coding :-)

### Screenshot upload image function

![Upload](https://github.com/chidang/laravel-aws-s3/blob/master/public/media/upload.png "Upload")

### Screenshot list inages

![Images](https://github.com/chidang/laravel-aws-s3/blob/master/public/media/images.png "Images")
