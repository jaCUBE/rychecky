# rychecky.cz

This project is my personal website **rychecky.cz**.
Also, it serves as my playground with new technology, e.g.: unit tests,
design patterns and other stuff.

I'm just toying with it. :)

# Installation
Clone repository:
```
git clone https://github.com/jaCUBE/rychecky
```

Install libraries through Composer:
```
composer install
```

Import database from backup SQL file.

Set `rychecky.local` to `127.0.0.1` in hosts file.

# Run
Run Docker container:
```
docker-compose up
```

# Basic Commands
Doctrine ORM schema update:
```
vendor/bin/doctrine orm:schema-tool:update --force
```

# Links
Website: https://rychecky.cz/

GitHub repository: https://github.com/jaCUBE/rychecky/

Trello board: https://trello.com/b/RwNCqLfR/rycheckycz