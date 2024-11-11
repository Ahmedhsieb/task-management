# Task Management

A Laravel-based project for managing tasks. Users can list tasks, mark tasks as completed, revert tasks to undone, and remove tasks permanently.


## Table of Contents

1. [Installation](#installation)
2. [Approach and Thought Process](#approach-and-thought-process)
3. [Projects Routes](#projects-routes)
3. [Database Schema](#database-schema)
4. [Features](#features)


---

### Installation

To set up the project locally, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/task-management.git
   cd task-management
   ```

2. **Install Dependencies**:
   Make sure to have Composer installed, then run:
   ```bash
   composer install
   ```

3. **Set up your database credentials in the `.env` file**:
   ```plaintext
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=to-do-list
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```
   
5. **Run Migrations**:
   Create the database tables:
   ```bash
   php artisan migrate
   ```
   
6. **Serve the Application**:
   Start the development server:
   ```bash
   php artisan serve
   ```

   The application will be available at `http://127.0.0.1:8000`.

---

### Projects Routes
1.  GET|HEAD        task ............................................................................ task.index › TaskController@index 
2.  POST            task ............................................................................ task.store › TaskController@store 
3.  DELETE          task/{task} ................................................................. task.destroy › TaskController@destroy  
4.  DELETE          task/{task}/forceDelete ............................................. task.forceDelete › TaskController@forceDelete 
5.  PATCH           task/{task}/restore ......................................................... task.restore › TaskController@restore 


### Approach and Thought Process
1. Task Management Design: Designed to help users organize tasks with a simple interface, focusing on task creation, completion, and status updates.

2. Database Normalization: Designed with a tasks table that stores each task's details. Task statuses are updated dynamically when marked as done, undone, or deleted.

3. User Experience:
   * Clear navigation for adding, listing, and managing tasks.
   * A toggle feature to mark tasks as completed or undone.

4. Soft Delete Handling:
   * Tasks can be marked as "completed" or moved to a "trash" area before being permanently deleted, allowing users to manage them effectively.


### Database Schema
The following is the schema of the database:

Tables:
* Tasks:
    * id: Primary key
    * Task: Description of the task.
    * status: Status of the task (e.g., completed, pending).
    * created_at: Timestamp of task creation.
    * updated_at: Timestamp of the last update.

### Features
* Task Listing: View all tasks in a single list.
* Mark as Completed: Ability to mark a task as done, moving it to the "Completed Tasks" list.
* Undo Completion: Move tasks back to the main list if they are not fully done.
* Remove Tasks: Option to permanently delete tasks if they are no longer needed.
* Intuitive User Interface: Simple and easy-to-use interface for managing tasks.