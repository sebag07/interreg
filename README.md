# WordPress Project Setup

This repository contains a WordPress installation with custom themes and plugins. The wp-content directory is version controlled while WordPress core files are managed through Composer.

## Prerequisites

- PHP >= 8.0
- Composer
- Git
- IF there is a previous installed wordpress in your current repository, you won't be able to clone the repo. You'll need to have an empty directory first.

## Installation

1. Clone the repository:
   ```bash
   git clone [repository-url] .
   ```

2. Install WordPress and dependencies:
   ```bash
   composer install
   ```

3. Configure WordPress:
   - Rename `wp-config-sample.php` to `wp-config.php` (if not already done by the script)
   - Update the database configuration in `wp-config.php`
   - Set up any necessary environment-specific configurations

## Project Structure

```
.
├── wp-admin/           # WordPress admin files (not in git)
├── wp-includes/        # WordPress core files (not in git)
├── wp-content/         # Themes, plugins (in git)
│   ├── themes/
│   └── plugins/
├── composer.json       # Composer configuration
├── wp-config.php      # WordPress configuration
└── README.md          # This file
```

## Version Control

The following files and directories are excluded from version control:
- WordPress core files (wp-admin, wp-includes)
- WordPress root PHP files
- vendor directory

The following are included in version control:
- wp-content directory (themes, plugins)
- composer.json
- wp-config.php (make sure to exclude sensitive information)
- .gitignore
- README.md

## Updating WordPress

To update WordPress core:
```bash
composer update johnpbloch/wordpress-core
```

## Notes

- Always backup your database before major updates
- Keep wp-config.php secure and never commit sensitive credentials
- Regularly update WordPress core, themes, and plugins 