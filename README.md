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
- [x] Display the Database Table to the corresponding page
  - [x] Discuss and decide on what kind of layout we want
Once that display has been completely done by all the members in our team, we can start working on the must-have features of this assignment.

## Plan of Attack!!
Now that the database connection has been made, we will form our plan of attack!
We will start out by creating a **production branch**
In this branch, we will add a branch for every thing on the To-Do list.
The tasks will be also split evenly **among us**.
Besart will be responsible for the Teachers, Greet for the Students, and Jelle for the Groups.

An example of this method of working is, if I want to add a new delete button to the Teacher table, I will create a branch called deleteButtonTeacher, finish this in this branch, and merge that branch into production.
Since this is the way the pro's do it, this will also be the way we will teach it ourselves.

Next, we will need to add the following: 
- [x] A delete button in the Student page
- [x] An add button in the Teacher Page
- [x] Get a connection on the Group Page
- [x] An Edit button in the Group page


## Must-have features
You have to provide the following pages for Students, Teacher & Class.

- [x] A general overview of all records of that entity in a table
  - [x] Each row should have a button to edit or delete the entity
  - [x] This page should have a "create new" button
- [ ] A detailed overview of the selected entity
  - [ ] This should include a button to delete this entity
  - [ ] Edge case: A teacher cannot be removed if he is still assigned to a class
  - [ ] Edge case: If you remove a class, make sure to remove the link between the students and the class.
- [x] A page to edit an existing entity
- [x] A page to create a new entity

One way to make the button work, is by giving them a specific value to what they need to do and need to be.

````
<form action="/action_page.php" method="get">
  Choose your favorite subject:
  <button name="delete" type="submit" value="getTeacherName()">HTML</button>
  <button name="subject" type="submit" value="fav_CSS">CSS</button>

-> Add queries in different functions
-> In the Render, add if functions to call on different functions
	-> if ($_GET = "delete") {
		 call the function to delete the entire row by the value that was given by the user}
->Now we need to figure out how to update information in a table, what do we need to add for the user to let them change a single value in the table
````

### Fields:
On the general overview table you can yourself decide what would be useful information to show.

On the detailed overview you have to provide the following information:

#### Student
- [x] Name
- [x] Email
- [ ] Class (with clickable link)
- [ ] Assigned teacher (clickable link - relation via class)

#### Teacher
- [x] Name
- [x] Email
- [ ] List of all students currently assigned to him (clickable link)

#### Class
- [x] Name class (Giertz, Lamarr, ...)
- [x] Location (Antwerp, Gent, Genk, Brussels, Liege)
- [ ] Assigned teacher (clickable link)
  - [x] Assigned Teacher shows
  - [ ] Clickable link
- [ ] List of assigned students (clickable link)

## Creating the Connection to the Database
Just like the previous assignment, this exercise was a toughie.
But thanks to this exercise, I have gotten a better understanding of how connecting to the database works.

Install Composer (check if installed by writing 'composer -v' in command line)
In command prompt, go to folder of this exercise, and run 'composer install'
In datagrip, run MySql as script -> Creates Database for you
Check if database connection works by opening localhost and going to 'Teachers'.

## problems we encountered
1. Getting data from the database depends on the program you use.
MariaDB needs a different syntax than Mysql.

  string:
  
  *ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;*
  
  should be replaced with:
  
  *ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;*
  
# This is a story all about how
## Our CRUD and MVC were flipped-turned upside down
### And I'd like to take a minute
#### Just sit right there
##### I'll tell you how we became the royalty of a town called BeCode

![alt-text](resources/images/fresh-prince.gif)

### How we got started
We started out by splitting up different tasks:
* Besart made the Database
* Jelle made the index and boilerplate MVC
* Greet was responsible for the Composer and researching how to set up a connection

Once these steps were done, we collectively worked on getting a connection from the database to the view.
We also assigned Besart to be the designated README enthusiast, while also setting up our gitignores so no unecessary files were added to the repository.

### To-Do #1
When everything we had to do collectively was done, we created a new to-do list.
Our goal was to show a table per subject.
Besart had to show the table of the Teachers, Greet of the Students, and Jelle for the Classes.

Our goal to work this way, was for everyone to work with the MVC, and not have a single person be responsible for the Model, one for the View and one for the Controller.
Every single on our goals and To-Do's was made with wanting to learn and improve in mind.
But just because the tasks were split up, doesn't mean we all worked separate from one another.
When someone had some troubles, we used the power of **teamwork** to help each other out.
This way, the person who had issues gets to learn how to fix them, while those helping also learn from the experience.

### GitHub
Up until this point, we were all working on the main branch.
But from here on out, we decided to create a new branch called 'production', and create separate branches for every functionality we wanted to add.
Once someone was done with their separate branch, they merged it into production.
Afterwards, they once again created a new branch for that specific function.

We wanted to work this way, because Greet (and Koen) told us this is how it's done in a professional environment.
And the best way to learn is to jump head-first into new challenges!

### To-Do #2: Electric Boogaloo
Once all tables were shown on the site, we once again made a new To-Do list.
* Besart was responsible for the 'Create New' function
* Jelle was responsible for the 'Edit Entity' function
* Greet was responsible for the 'Delete' function

### The Story of Besart: Creating a new Entity
I was responsible for adding the 'Create New' function.
After creating a ton of headaches for myself, I was finally able to create a new teacher.

The MVC structure was already done by this point, so I only had to add a field in the view for user input and the function that adds a new teacher.
I started out by writing down my query in datagrip to achieve the desired result.
Once I had the query, I wrote the function and added the query I wrote earlier, replacing some values for some variables.

This is where I struggled the most.
Why use many word when few code do trick:

````
$this->databaseLoader->getConnection()->query("INSERT INTO teacher_table VALUES ( id ,' . " . ' .$name. ' . " . ', ' . " . ' .$email. ' . " . ')");
````

````
$this->databaseLoader->getConnection()->query("INSERT INTO teacher_table VALUES ( id ,'$name', '$email')");
````

What I am most proud of, is the things I learned during this assignment.
We were able to make a database that is fully CRUD-dable (no idea if that's an actual word but Josh Darnit does that 'word' do the job).

### Story of Jelle: Edit Entities
What I did:
  - made the boilerplate maps, created the header & footer includes
  - made the controller, views & model for the groups
  - focussed specificly on the 'edit' functionality
  - included all the other functionality by looking at teammembers code

How I did it:
  - check the code 😉

What I struggled with
- running the local database, decided to download DataGrip so my teammembers could help out
- ran into some weird PDO errors but with the help of the coaches I managed to solve them

What I'm proud of:
- we made the whole crud thing work despite the time restraints

### The Story of Greet: Deleting Entities
I started with reading some info about CRUD.
* my task was creating the delete function
* The function itself was easy to find, but I struggled some time looking up what should go where. (controller, model, view) and how it was all connected.
Luckily Jelle and Besart were able to help me on my way
* in the end it worked


### What we learned
* How to effectively use Github
* Communication
* Helping each other is a valuable way to learn things yourself
* MVC is not easy at all, but we're getting there!
* Repetition is key! Because this is the second exercise we did with MVC and databases, this one went a lot more smoothly.

### What we wanted to learn
* PDO::prepare (how to safely get user input and put it in the database)
* Link with detailed table
* Linking teacher name to student
* Understanding keys in the database on a deeper level
* Subqueries
* Look through each other's code collectively, and improve our own code where necessary

### What we're proud of
* TEAM SPIRIT!!!!!
* Not done on time, but we all worked on this assignment in the weekend
* Communication and responsibility
* -> Scroll back to what we learned
* Prioritising work (for example, ignoring styling in favor of functionality)













