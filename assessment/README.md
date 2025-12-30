# HRMS - Human Resource Management System

Laravel 11 HRMS application with employee, department, and skill management.

## Prerequisites

- Docker & Docker Compose

## Quick Start

# 1. Clone repository
git clone https://github.com/FlameGreat-1/hrms

cd hrms/assessment

# 2. Copy environment file
cp .env.example .env

# 3. Install and start application (One Command)
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs && ./vendor/bin/sail up -d && sleep 15 && ./vendor/bin/sail artisan key:generate && ./vendor/bin/sail artisan migrate --seed && ./vendor/bin/sail npm install && ./vendor/bin/sail npm run build

# 4. Access application
# http://localhost

# Login Credentials

Email: admin@hrms.com
Password: admin123hrms

# Stop Application

./vendor/bin/sail down

# Restart Application

./vendor/bin/sail up -d
