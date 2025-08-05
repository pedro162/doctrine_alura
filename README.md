````markdown
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

- PHP >= 8.1
- Composer
- SQLite (or configure another DB)
- Docker and Docker Compose (optional)

### 🧰 Installation

Clone the repository:

```bash
git clone https://github.com/pedro162/doctrine_alura.git
cd doctrine_alura
```
````

Install dependencies:

```bash
composer install
```

### ⚙️ Configuration

Create a SQLite database file (or configure your own in `EntityManagerCreator.php`):

```bash
touch db.sqlite
```

If you're using another database (e.g., MySQL), update the connection settings accordingly.

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
php vendor/bin/doctrine orm:schema-tool:create
```

Run queries or persist data in `src/script.php`.

## 📄 License

This project is licensed for educational purposes only.

```

---

Se quiser, posso ajustar conforme o **banco de dados real**, se você estiver usando **MySQL**, **PostgreSQL**, ou se quiser um exemplo de script no `src/`. Deseja isso também?

```

```

```
