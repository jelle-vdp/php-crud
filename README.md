# Aww CRUD, here we go again
This is a team assignment which will teach us how to connect to a database, write a simple Create, Read, Update and Delete application *and* how to use a provided MVC structure to work into.

Learning all that stuff, combined with working in group and improving our git behaviour, will make this assignment a *spicy one*.

In order to start out with the assignment, we will clear the following TO-DO list:
- [x] Create a basic Database
  - [x] Table for Students
  - [x] Table for Classes (groups)
  - [x] Table for Coaches
- [x] Create a router that selects different pages
- [x] Create a .gitignore that ignores the .env, .gitignore, and if needed, the .idea/
- [x] Add a .env.sample file to the repository
- [x] **Show our database on the view**
  - [x] Create a connection with the database
  - [x] Create a new Database in index
  - [x] Create a property 'Database' in the controller
    - [x] Just a generic Database, not specific information per controller.
  - [x] Be able to do a 'getAllCoaches' in the view, or wherever you'd like as long as it works.
    - [x] Learn a bit more about PDO and how to utilize it.

Once we're done with that TODO list, we can once again have a group meeting to further decide on small future goals and how to achieve them.
The very first big goal we have, is to be able to show our database on the view.
Once that's done and we're 1000% sure everything's connected, we can go ahead and get CRUD done.

## Putting the C-U-D in CRUD
We were finally able to have visitors to the site READ our database, the R in CRUD is now done.
This means that our database has been successfully connected to our MVC.
Now that we're able to connect to the database, we can start thinking of more concrete, visual goals we would like to achieve.
- [ ] Display the Database Table to the corresponding page
  - [ ] Discuss and decide on what kind of layout we want
Once that display has been completely done by all the members in our team, we can start working on the must-have features of this assignment.
## Must-have features
You have to provide the following pages for Students, Teacher & Class.

-[ ] A general overview of all records of that entity in a table
  -[ ] Each row should have a button to edit or delete the entity
  -[ ] This page should have a "create new" button
-[ ] A detailed overview of the selected entity
  -[ ] This should include a button to delete this entity
  -[ ] Edge case: A teacher cannot be removed if he is still assigned to a class
  -[ ] Edge case: If you remove a class, make sure to remove the link between the students and the class.
-[ ] A page to edit an existing entity
-[ ] A page to create a new entity

One way to make the button work, is by giving them a specific value to what they need to do and need to be.

### Fields:
On the general overview table you can yourself decide what would be useful information to show.

On the detailed overview you have to provide the following information:

#### Student
-[ ] Name
-[ ] Email
-[ ] Class (with clickable link)
-[ ] Assigned teacher (clickable link - relation via class)

#### Teacher
-[ ] Name
-[ ] Email
-[ ] List of all students currently assigned to him (clickable link)

#### Class
-[ ] Name class (Giertz, Lamarr, ...)
-[ ] Location (Antwerp, Gent, Genk, Brussels, Liege)
-[ ] Assigned teacher (clickable link)
-[ ] List of assigned students (clickable link)

## Creating the Connection to the Database
Just like the previous assignment, this exercise was a toughie.
BUt thanks to this exercise, I have gotten a better understanding of how connecting to the database works.

Install Composer (check if installed by writing 'composer -v' in command line)
In command prompt, go to folder of this exercise, and run 'composer install'
In datagrip, run MySql as script -> Creates Database for you
Check if database connection works by opening localhost and going to 'Teachers'.