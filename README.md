Requirements
===========
* PHP>=5.3.2
* git (for Windows: http://git-scm.com/downloads, for Centos yum install git, for Ubuntu: sudo apt-get install git)
* hg (for Windows: http://mercurial.selenic.com/downloads, for Centos yum install mercurial, for Ubuntu: sudo apt-get install mercurial)
* MySql/MariaDB with option "lower_case_table_names=1"
* ACE Admin version ace-v1.2--bs-v2.3.x or use free https://github.com/bopoda/ace

Installation instruction
==========
* clone git repository https://github.com/d2app/app.git (git clone https://github.com/d2app/app.git)
* install composer (https://getcomposer.org/download/)- for Windows use https://getcomposer.org/Composer-Setup.exe
* prepare empty MySql database and create database user and password for this database
* run "composer install" inside app directory from command line/terminal
* configure www directory as web root directory or if you are using xampp and installed app is located in C:\xampp\htdocs\d2app, open http://localhost/d2app/www
* if you have ACE ADMIN, copy it version ace-v1.2--bs-v2.3.x to /vendor/ace_admin/v_2_3 and in php file /vendor/uldisn/d2app/config/main.php unconment 561 and comment out 562 row
* default administrator login: d2app_admin, password: carnikava
 
