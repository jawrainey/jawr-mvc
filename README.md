# Description

A lightweight MVC-CMS developed in PHP5 to maintain [my website](http://jawrainey.me/ "Jay Rainey").

# Installation instructions

If you wish to use this framework for whatever reason, bear in mind that although I tried my best, there could be security flaws I have not prevented. Having said that, follow these steps, and enjoy:

1.    Download source
2.    Upload blog.sql to your database
3.    Change the two configurable variables in config.php
4.    Change database settings in libraries/Database.php
5.    Add "echo $hashed;" in the login function located in libraries/Auth.php (You must enter it in the login form - default username is 'jay')
