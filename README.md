# Laravel Todo List Backend

A robust RESTful API for a Todo List application built with [Laravel 12](https://laravel.com). This backend provides a comprehensive set of endpoints to manage tasks, allowing users to create, read, update, delete, and mark tasks as complete.

## 🚀 Features

-   **Task Management**: Full CRUD (Create, Read, Update, Delete) operations for tasks.
-   **Task Completion**: Dedicated endpoint to mark tasks as complete.
-   **RESTful API**: Follows standard REST conventions for easy integration with frontend applications.
-   **Modern Stack**: Built on the latest Laravel 12 framework and PHP 8.2+.

## 🛠️ Tech Stack

-   **Framework**: [Laravel 12](https://laravel.com)
-   **Language**: [PHP 8.2+](https://www.php.net/)
-   **Database**: Compatible with MySQL, PostgreSQL, SQLite, etc. (Configurable via `.env`)

## 🏁 Getting Started

Follow these steps to set up the project locally.

### Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js & NPM (optional, for frontend assets if needed)

### Installation

1.  **Clone the repository**

    ```bash
    git clone https://github.com/yourusername/lvl-todo-list-be.git
    cd lvl-todo-list-be
    ```

2.  **Install PHP dependencies**

    ```bash
    composer install
    ```

3.  **Environment Setup**
    Copy the example environment file and configure your database settings.

    ```bash
    cp .env.example .env
    ```

    Update the `DB_*` variables in `.env` to match your local database configuration.

4.  **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5.  **Run Migrations**
    Create the necessary database tables.

    ```bash
    php artisan migrate
    ```

6.  **Serve the Application**
    Start the local development server.
    ```bash
    php artisan serve
    ```
    The API will be accessible at `http://localhost:8000`.

## 🔌 API Endpoints

The API provides the following endpoints for task management:

| Method      | Endpoint                   | Description                      |
| :---------- | :------------------------- | :------------------------------- |
| `GET`       | `/api/tasks`               | Retrieve a list of all tasks     |
| `POST`      | `/api/tasks`               | Create a new task                |
| `GET`       | `/api/tasks/{id}`          | Retrieve a specific task by ID   |
| `PUT/PATCH` | `/api/tasks/{id}`          | Update an existing task          |
| `DELETE`    | `/api/tasks/{id}`          | Delete a task                    |
| `PATCH`     | `/api/tasks/{id}/complete` | Mark a specific task as complete |

## 🧪 Testing

Run the test suite to ensure everything is working as expected.

```bash
php artisan test
```

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
