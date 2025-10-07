# AdvoScale Homework

This repository contains a basic laravel application to manage ToDos. But not all features are implemented yet. Your task is to implement the missing features. But don't worry, we have prepared a list of tasks for you.

If you are already familiar with Laravel, then this should be a piece of cake for you. But even if you are not, you should be able to complete the tasks with the help of the [Laravel documentation](https://laravel.com/docs/8.x).

## Tasks

### Task 0: Setup Project

Before you can start, you need to setup the project. To start developing a laravel application on your maschine, you need to have [**PHP 8.1**](https://www.php.net/manual/en/install.php), [**Composer**](https://getcomposer.org/) and [**npm**](https://nodejs.org/en) installed. If you don't have them installed, you can find the installation instructions [here](https://laravel.com/docs/10.x/installation#your-first-laravel-project). (If you are using macOS, most of the tools can be installed using [Homebrew](https://brew.sh/).

By the way, if you are struggling setting up the project, i'm happy to help you. This homework is not about setting up a project, but about implementing features.

1. Create a new repository using this repository as a template. You can make your repository private, if you want to. But if you do, please add me as a collaborator. My GitHub username is `IdrisN`.
2. Clone your new repository to your local machine and change into the project directory.
3. Install the dependencies

    ```bash
    composer install && npm install
    ```

4. Copy the `.env.example` file and call it `.env`
5. Create a new application key

    ```bash
    php artisan key:generate
    ```

6. Create a SQLite database file using.

    ```bash
    touch database/database.sqlite
    ```

    (If you are using Windows, you can use `type nul > database/database.sqlite` instead or simply create an empty file called `database.sqlite` in the `database` directory.)

7. Run the migrations

    ```bash
    php artisan migrate --seed
    ```

8. Start the asset compiler and keep it running

    ```bash
    npm run dev
    ```

9. Start the development server and keep it running

    ```bash
    php artisan serve
    ```

10. Done! You can now access the application in your browser at `http://localhost:8000`.

### Task 1: Fix the Typo

Opening the application in your browser, you will see a simple ToDo app. You can already add new tasks and delete them. But there is a typo in the application. Your first task is to fix the typo.

### Task 2: Style the List of Tasks

The list of tasks is not styled yet. Your second task is to style the list of tasks. You can be as creative, as you want. But make sure to differenciate between completed and uncompleted tasks.

You can style the list in the blade template of the task list component `resources/views/tasks/task-list.blade.php` file. You can find the Tailwind CSS documentation [here](https://tailwindcss.com/docs).

### Task 3: Add an empty state

If there are no tasks, the list is empty. But there is no message telling the user, that there are no tasks. Think of the message you usually see when you have an empty inbox.

Your third task is to add an empty state to the list of tasks. Have a look at the available [Blade Directives](https://laravel.com/docs/10.x/blade#blade-directives) to conditionally render the empty state.

### Task 4: Implement the Complete Button

The complete button is not working yet. Your second task is to implement the complete button. When the complete button is clicked, the task should be marked as completed. You can find the complete button in the `resources/views/components/task-list.blade.php` component. The button is already connected to the `complete` route. You can find the route in the `routes/web.php` file. You have to implement the complete function in the task controller `app/Http/Controllers/TaskController.php` file. You can find the complete function in the `TaskController` class. The complete function should update the task in the database and redirect the user back to the task list. As mentioned above, database columns are represented by model instances. You can find the model in the `app/Models/Task.php` file. Have a look at how to update a model in the [Laravel documentation](https://laravel.com/docs/10.x/eloquent).

### Task 5: Seperate completed and uncompleted tasks

The list of tasks contains both completed and uncompleted tasks now. But it would be nice to seperate them. Your fourth task is to seperate completed and uncompleted tasks.

Have a look on who to pass data do blade components and how to query/filter [eloquent models](https://laravel.com/docs/10.x/eloquent).

### One More Task: Implement a Task Priority

_This task is optional and created for people who are already familiar with Laravel or who want to show off their skills._

The list of tasks should be sorted by priority. The priority of a task can be either `low`, `medium` or `high`. You are free to decide how to implement this feature and how to display the priority in the list of tasks.

But here is a rough guide on how to implement this feature:

-   Add a priority column to the tasks table
-   Add a priority field to the task form
-   Design and implement a priority selector
-   Save the selected priority to the database
-   Sort the tasks by priority

---

## Submission

When you are done, please send me a link to your repository. Please make sure, that I have access to your repository. My GitHub username is `IdrisN`.

If you have any questions, feel free to contact me. I'm happy to help you.

Good luck and have fun!
