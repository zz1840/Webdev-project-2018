# FoodMate App - Design and Development of Web and Mobile Applications Fall 2018 Project 

FoodMate - an application to help students find peers to enjoy meals with

All project files reside under the www folder present in the root directory.

Directory Structure understanding:

css/scss - CSS files [general]
js - Javascript files [general]
vendor - bootstrap and jquery files for index.html

Files we worked on:

- index.html: Homepage of the app with information about the app - potential users, benefits and rewards. Links to Login_index.html and SignUp_index.html. 

- Login_index.html: Form that uses login.php to authenticate the email-password values with the ones in our login_details table.

- SignUp_index.html: Form that uses insert.php to validate whether the email exists and if not inserts all information into the login_details table and redirects user to Login_index.html.

- Personal_Information.html: Form that uses action_page.php to create a session and store user information in the user_profile_details table and call that information on Homepage.html

- Homepage.html: This is the User profile page. Username is shown on webpage using the the session created earlier. It redirects to update information in Personal_Information.html or set food preferences in Search.html

- Search.html: Form that uses findfriend.php to insert all data into user_food_details table and redirect user to FindFriend_index.html

- FindFriend_index.html: Displays a set of users/students with whom the user could have lunch based on the exact match of timings. User can click the text option to send a message via the messages application on their phone.

Things that don't work in this scope of work:

1. Personal_Information.html is not able to retrieve user information from database due to mysqlnd driver being not present.

2. findfriend.php isn't able to retrieve user matches as expected. For now, FindFriend_index.html shows a static list of 3 friends they can connect to.


