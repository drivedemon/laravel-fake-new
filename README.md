# LARAVEL FAKE NEWS

## Start Development

Setup project for the first time
```
git clone https://github.com/drivedemon/laravel-fake-new.git
```
Create `.env` file
```
cp .env.example .env
```
Access `env` file then change `API and Database` key
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel-simple
DB_USERNAME=admin
DB_PASSWORD=1234
```
Install Dependencies
```
composer install
```
Generate key
```
php artisan key:generate
```
Build docker
```
docker-compose build
```
Start all containers
```
docker-compose up -d
```
Execute to container
```
docker ps (for get container_name list)
docker exec -it <container_name> bash
```
Migrate Data
```
php artisan migrate
```
Congratulations! Start backend server (You should see the backend up and running on  `localhost:8000`)
