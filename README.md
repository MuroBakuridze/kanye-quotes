# Kanye Quotes

This project is a Laravel application that connects to the [Kanye Rest API](https://kanye.rest/) to display random Kanye West quotes. It includes user authentication using Laravel Sanctum and provides both a web interface and an API endpoint to fetch quotes.

## Features

- Web page that shows 5 random Kanye West quotes
- Button to refresh the quotes
- User authentication using password
- API route to fetch 5 random Kanye West quotes, secured with a token
- Unit and feature tests

## Installation

### Option 1: Clone from GitHub

1. Clone the repository:
    ```bash
    git clone https://github.com/MuroBakuridze/kanye-quotes.git
    cd kanye-quotes
    ```

### Option 2: Unzip the Folder

1. Unzip the project folder and navigate into it:
    ```bash
    unzip kanye-quotes.zip
    cd kanye-quotes
    ```

### Install Dependencies

1. Install PHP dependencies using Composer:
    ```bash
    composer install
    ```

2. Install JavaScript dependencies using npm:
    ```bash
    npm install
    npm run build
    ```

### Environment Setup

1. Copy the example environment file and modify as needed:
    ```bash
    cp .env.example .env
    ```

2. Generate an application key:
    ```bash
    php artisan key:generate
    ```

### Database Setup

1. Create a database and update your `.env` file with the database connection details.

2. Run database migrations:
    ```bash
    php artisan migrate
    ```

3. Seed the database with a test user:
    ```bash
    php artisan db:seed
    ```

### Test User Details

- **Email**: `test@gmail.com`
- **Password**: `123123123`

## Running the Application

1. Start the local development server:
    ```bash
    php artisan serve
    ```
    ```bash
    npm run dev
    ```

2. Open your browser and navigate to `http://127.0.0.1:8000` or `http://127.0.0.1:8000/login`.

3. To log in, go to `http://127.0.0.1:8000/login` and use the test user credentials provided above, or register a new user.

4. After logging in, you will be redirected to the dashboard. Navigate to `/quotes` to view and refresh Kanye West quotes.

## Running Tests

To run the tests, use the following command:

    ```bash
    php artisan test --testsuite=Unit
    ```

Authentication and API Security


Benefits of Laravel Sanctum:
Easy to Implement: Sanctum is easy to set up and integrate with existing Laravel applications.
Versatile: It supports both session-based authentication for web applications and token-based authentication for APIs.
Secure: Sanctum uses Laravel’s built-in CSRF protection to secure your application.

API Token Security
The /api/quotes endpoint is secured with an API token to ensure that only authenticated users can access it. This adds an extra layer of security by preventing unauthorized access.