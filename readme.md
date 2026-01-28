# PHP Docker App

A PHP application using Docker containers for development and deployment, featuring MariaDB and Apache.

## Project Overview

This project is a dockerized PHP application that includes:
- **PHP 8.2** running on Apache
- **MariaDB** database
- **Docker Compose** orchestration
- Development tools: PHPUnit, Psalm, PHP-JWT

## Architecture

### Services

#### PHP Service
- **Image**: PHP 8.2 with Apache
- **Port**: 8000 (localhost:8000)
- **Virtual Host**: php.localhost
- **Extensions**: PDO MySQL, MySQLi, GD, iconv
- **Volume**: `./src:/var/www/html`

#### Database Service (MariaDB)
- **Port**: 3309 (mapped to 3306)
- **Database**: userdb
- **Root Password**: test (configure for production)
- **Volume**: SQL initialization scripts in `Docker/mariadb/SQL/`

## Prerequisites

- Docker
- Docker Compose

## Installation & Setup

1. **Clone or navigate to the project directory**
   ```bash
   cd phpdockerapp
   ```

2. **Start the containers**
   ```bash
   docker compose up -d --build
   ```

3. **Access the application**
   - Web: http://localhost:8000
   - Database: localhost:3309 (host), 3306 (internal)

4. **Stop the containers**
   ```bash
   docker compose down
   ```

## Project Structure

```
phpdockerapp/
├── docker-compose.yml       # Docker Compose configuration
├── readme.md               # This file
├── Docker/
│   ├── mariadb/
│   │   ├── Dockerfile
│   │   └── SQL/            # Database initialization scripts
│   └── php/
│       ├── Dockerfile
│       ├── hosts
│       ├── php.ini
│       └── php.localhost.conf
└── src/
    ├── composer.json       # PHP dependencies
    ├── index.php          # Application entry point
    ├── fruit.php          # Fruit management module
    ├── users.php          # User management module
    ├── vendor/            # Composer dependencies
    └── classes/           # PSR-4 autoloaded classes
```

## Dependencies

### Production Dependencies
- `firebase/php-jwt` (^7.0.2) - JWT authentication

### Development Dependencies
- `phpunit/phpunit` (^12.5.8) - Unit testing
- `phpunit/php-code-coverage` (^12.5.2) - Code coverage analysis
- `vimeo/psalm` (^6.14.3) - Static analysis
- `psalm/plugin-phpunit` (^0.19.5) - Psalm PHPUnit plugin

## Configuration

### Database Credentials
Edit the environment variables in `docker-compose.yml`:
- `MYSQL_ROOT_PASSWORD` - Change from default "test"
- `MYSQL_DATABASE` - Database name (default: userdb)

### Virtual Host
Configure virtual host settings in `Docker/php/php.localhost.conf`

### PHP Configuration
Modify `Docker/php/php.ini` for custom PHP settings

## Development

### Running Tests
```bash
docker compose exec php vendor/bin/phpunit
```

### Code Analysis
```bash
docker compose exec php vendor/bin/psalm
```

### Database Management
SQL scripts in `Docker/mariadb/SQL/` are automatically executed on container startup.

## Database

The database is automatically initialized when the MariaDB container starts. Place initialization scripts in:
- `Docker/mariadb/SQL/CREATES/` - Schema creation scripts
- `Docker/mariadb/SQL/DATALOAD/` - Data population scripts

## Ports

| Service | Port | Protocol |
|---------|------|----------|
| PHP/Apache | 8000 | HTTP |
| MariaDB | 3309 | TCP |

## Notes

- The application uses PSR-4 autoloading configured in composer.json
- Apache modules enabled: rewrite module
- Default root password should be changed in production

## Author

JoSSte
