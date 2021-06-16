# Launch Donation

This Project I try to create an architecture based on microservices, separating the kitchen and the store into two independent services

## Included services
- PHP 
- MySQL
- Vuejs
- Apache
`

## Project Setup

### Prepare the Docker template

1. Clone this repo:

```
git clone https://github.com/LibardoZuniga/lunch_donation.git
cd lunch_donation

```
2. Initialize Docker:

```
cd docker
docker-compose build
docker-compose up -d
```
3. ## Start coding laravel microservices



Install dependencies
```bash
composer install
```
Configure the database access in the .env file
```bash
cp .env.example .env
```
Generate laravel key
```bash
php artisan key:generate
```

Give read/write access to the storage folder
```bash
chmod -R ugo+rw storage/
```

Generate the database
```bash
php artisan migrate --seed
```
