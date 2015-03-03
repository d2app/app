Requirements
===========
* PHP>=5.3.2
* git (for Windows: http://git-scm.com/downloads, for Centos yum install git, for Ubuntu: sudo apt-get install git)
* hg (for Windows: http://mercurial.selenic.com/downloads, for Centos yum install mercurial, for Ubuntu: sudo apt-get install mercurial)
* MySql/MariaDB with option "lower_case_table_names=1"

Installation instruction
==========
* clone git repository https://github.com/d2app/app.git (git clone https://github.com/d2app/app.git)
* install composer (https://getcomposer.org/download/)- for Windows use https://getcomposer.org/Composer-Setup.exe
* prepare empty MySql database and create database user and password for this database
* run "composer install" inside app directory from command line/terminal
* configure www directory as web root directory or if you are using xampp and installed app is located in C:\xampp\htdocs\d2app, open http://localhost/d2app/www
* default administrator login: d2app_admin, password: carnikava
 