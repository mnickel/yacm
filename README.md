yacm
====

Worlds Greatest Contact Manager!

A Contact manager in PHP that is an example of several techology components and programming ideas:

- jQuery
- DataTables -- (http://www.datatables.net/)
- PHP -- 5.3.10-1ubuntu3.11
- bootstrap -- (http://getbootstrap.com)

Besides the technology, the project is an illustration of a single-page application.  You will note that there shouldn't be any page/brower refreshing.  All interactions with the PHP backend are done via AJAX calls.

There is no real database behind the scenes -- everything is kept inside of a PHP session

Code is located as follows:

- lib -- dataTables and bootstrap library location
- js -- javascript code for the project to orchestrate UI interaction and behaviors
- css -- custom CSS
- api -- all PHP code to perform all CRUD operations
- includes -- PHP Class definitions for the project - Contact and ContactList


You should be able to install this on any PHP environment.  This was developed using a vagrant development environment -- (http://www.vagrantup.com/)

