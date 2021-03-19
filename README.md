# Laravel 8.2 REST API TODO
This API is created using Laravel 8.2.

#### Following are the Models
* TodoItem
* TodoList

#### Usage
Clone the project via git clone or download the zip file.

##### .env
create a .env file in the root directory of your project. Set up database credentials of your choice.  

##### Composer Install
cd into the project directory via terminal and run the following  command to install composer packages.
###### `composer install`
##### Generate Key
then run the following command to generate fresh key.
###### `php artisan key:generate`
##### Run Migration
then run the following command to create migrations in the database.
###### `php artisan migrate:fresh`
##### Passport Install
serve the program
###### `php artisan serve`


### API EndPoints
* POST Create TodoList
* Route: `/api/todoList`
* Headers: application/json
* Body:
  ```
  {
    'name': 'Things to do today'
  }
* Response
  ```
  {
    "data": {
        "status": 200,
        "todoList": {
            "name": "Things to do today",
            "updated_at": "2021-03-18T19:43:02.000000Z",
            "created_at": "2021-03-18T19:43:02.000000Z",
            "id": 1
        }
    }
  }

*****
* DELETE TodoList
* Route: `/api/todoList/{todoListID}`
* Headers: application/json
* Response
  ```
  {
      "data": {
          "status": 200,
          "message": "Todolist deleted."
      }
  }

*****
* POST Update TodoList
* Route: `/api/todoList/{todoListID}`
* Headers: application/json
* Body:
  ```
  {
    'name': 'Things to do on weekends', "_method" : 'patch'
  }
* Response
  ```
    {
        "data": {
            "status": 200,
            "message": "Todolist updated.",
            "todoList": {
                "id": 1,
                "name": "Things to do on weekends",
                "created_at": "2021-03-18T20:13:37.000000Z",
                "updated_at": "2021-03-18T20:14:07.000000Z"
            }
        }
    }

*****

* POST Create TodoItem
* Route: `/api/todoItems`
* Headers: application/json
* Body:
  ```
  {
    'description': 'Buy more milk',
    "due_date" : '2021-03-17',
    "todo_list_id" : 1
  }
* Response
  ```
    {
      "data": {
          "status": 200,
          "todoItem": {
              "todo_list_id": "1",
              "description": "Buy more milk",
              "due_date": "2021-03-17",
              "updated_at": "2021-03-18T20:18:26.000000Z",
              "created_at": "2021-03-18T20:18:26.000000Z",
              "id": 1
          }
      }
    }

 *****
* POST Update TodoItem
* Route: `/api/todoItems/{todoItemID}`
* Headers: application/json
* Body:
  ```
  {
    '_method':'patch',
    'description': 'Buy more milk and egg',
    "due_date" : 2020-03-17,
    "is_completed" : 1
  }
* Response
  ```
  {
      "data": {
          "status": 200,
          "message": "Todo item updated.",
          "todoItem": {
              "id": 1,
              "todo_list_id": "1",
              "description": "Buy more milk and eggs",
              "due_date": "2020-03-17",
              "is_completed": "1",
              "created_at": "2021-03-18T20:18:26.000000Z",
              "updated_at": "2021-03-18T20:21:33.000000Z"
          }
      }
  }

*****
* Delete TodoItem
* Route: `/api/todoItems/{todoItemID}`
* Headers: application/json
* Response
   ```
    {
      "data": {
        "status": 200,
        "message": "Todo item deleted."
      }
    }

*****

* GET List TodoItems
* Route: `/api/todoItems`
* Params(optional):
  ```
  {
    overdue: 1,  // Filters TodoItems which as incomplete and past due date.
    completion_status: 0,  // Filters TodoItems which are incomplete(0) or complete(1)
    todo_list_id: 3 // Filters TodoItems based on todo_list_id.
  }
* Headers: application/json
* Response
  ```
  {
      "data": {
          "status": 200,
          "todoItems": [
              {
                  "id": 5,
                  "todo_list_id": "3",
                  "description": "Buy more milk",
                  "due_date": "2021-03-01",
                  "is_completed": "0",
                  "created_at": "2021-03-18T20:26:07.000000Z",
                  "updated_at": "2021-03-18T20:26:07.000000Z"
              },
              {
                  "id": 6,
                  "todo_list_id": "3",
                  "description": "Buy more milk",
                  "due_date": "2021-03-01",
                  "is_completed": "0",
                  "created_at": "2021-03-18T20:39:39.000000Z",
                  "updated_at": "2021-03-18T20:39:39.000000Z"
              },
              {
                  "id": 7,
                  "todo_list_id": "3",
                  "description": "Buy more milk and tea",
                  "due_date": "2021-03-01",
                  "is_completed": "0",
                  "created_at": "2021-03-18T20:39:47.000000Z",
                  "updated_at": "2021-03-18T20:39:47.000000Z"
              }
          ]
      }
  }
