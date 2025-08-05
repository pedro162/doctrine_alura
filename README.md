# Doctrine ORM Study Project

This is a study project based on the [Alura](https://www.alura.com.br/) course for learning how to use [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html) in PHP.

## 📚 About

This project demonstrates how to use Doctrine ORM with:

- Attribute-based mapping
- Entity Manager configuration
- Data persistence and querying
- Command Line Interface (CLI) for migrations and schema management

It is intended for educational purposes only.

## 🚀 Getting Started

### Prerequisites

Make sure you have the following installed:

- PHP >= 8.3.4
- Composer
- SQLite (or configure another DB)
- Docker and Docker Compose (optional)

### 🧰 Installation

Clone the repository:

```bash
git clone https://github.com/pedro162/doctrine_alura.git
cd doctrine_alura
```

Install dependencies:

```bash
composer install
```

### ⚙️ Configuration

The project includes a helper class: `src/Helper/EntityManagerCreator.php`, which is responsible for configuring and returning an instance of Doctrine's `EntityManager`.

By default, it uses SQLite and attribute-based entity mapping.

To initialize the database file (if using SQLite), run:

```bash
touch db.sqlite
```

To use another database (like MySQL or PostgreSQL), update the connection settings in EntityManagerCreator.php:

```php
$connection = DriverManager::getConnection([
    'driver' => 'pdo_sqlite', // change this if needed
    'path' => __DIR__ . '/../../db.sqlite',
], $config);
```

### 🗃️ Doctrine CLI

Run Doctrine commands via:

```bash
php ./bin/doctrine
```

For example, to create the database schema:

```bash
php ./bin/doctrine orm:schema-tool:create
```

Or to run a custom script:

```bash
php src/script.php
```

### 🐳 Docker (optional)

You can run the project in a Docker container:

```bash
docker-compose up -d
```

## 📁 Project Structure

```
.
├── src/                # Entities and scripts
├── db.sqlite           # SQLite database file
├── bin/                # CLI
├── composer.json       # PHP dependencies
└── README.md
```

## 🧪 Example Commands

Generate a schema from entity annotations:

```bash
php ./bin/doctrine orm:schema-tool:create
```

Run queries or persist data in `src/script.php`.

## 📄 License

This project is licensed for educational purposes only.
