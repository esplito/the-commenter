# the-commenter

## About
This repo was created for a lab assignment in the course 'Information Systems B: E-services and Web Programming' at Uppsala University. The purpose of this assignment was to create a website where only registered users could post comments, with the following criteria:
- It should be possible to post comments
- Only logged in users can post comments
- Users should be able to register with an e-mail and password
- There can't be more than one user for one e-mail
- The passwords has to be hashed and salted before being stored in the database
- Users should be able to log in and out
- The username (e-mail or chosen username) should be visible when a user posts a comment
- All form data should be validated on both client- and server-side
- Instances which are saved in the database must be protected from SQL-injections
- Implement AJAX for the comment/feed page (Optional)

I did a mockup in Sketch before I began coding. I also decided to use gulp, in order for me to automate some of my coding and create/debug the site faster (I used browsersync to make previewing easier, for example). The main reason why I used gulp, was that it enabled me to structure up my CSS in different files (they got bundled together in one css file when I saved changes in any CSS file), which also makes it a lot easier to find and change specific piece of code. 

The site is responsive and built with HTML, CSS, php, SQL, JavaScript and jQuery. I implemented AJAX on the comment/feed page, so that it didn't reload when I posted a comment. The naming of the classes in the CSS was done according to BEM: http://getbem.com/naming/

## Desktop Screenshots

**Login Page**

![Login Page](https://raw.githubusercontent.com/esplito/the-commenter/master/screenshots/login_page.PNG)

**Register Page**

![Register Page](https://raw.githubusercontent.com/esplito/the-commenter/master/screenshots/register_page.PNG)

**Registration successful**

![Register Successful](https://raw.githubusercontent.com/esplito/the-commenter/master/screenshots/register_page_success.PNG)

**Comment/Feed Page**

![Comment/Feed Page](https://raw.githubusercontent.com/esplito/the-commenter/master/screenshots/feed_page.PNG)


## Mobile Screenshots

**Login Page**

![Login Page](https://raw.githubusercontent.com/esplito/the-commenter/master/screenshots/mobile_login.PNG)

**Register Page**

![Register Page](https://raw.githubusercontent.com/esplito/the-commenter/master/screenshots/mobile_register.PNG)

**Comment/Feed Page**

![Comment/Feed Page](https://raw.githubusercontent.com/esplito/the-commenter/master/screenshots/feed_page_mobile.PNG)


