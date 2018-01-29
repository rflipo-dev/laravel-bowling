Bowling
===================

[<img src="https://adam.merrifield.ca/wp-content/uploads/2016/09/laravel-logo.png" height="40">](https://laravel.com/)   [<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Npm-logo.svg/800px-Npm-logo.svg.png" height="40">](https://www.npmjs.com/)    [<img src="https://bower.io/img/bower-logo.svg" height="40">](https://bower.io/)    [<img src="https://stefanimhoff.de/assets/images/artikel/gulp-tutorial-1-097f3c0262.png" height="40">](http://gulpjs.com/)

----------
[TOC]
<i class="icon-hdd"></i> Install
-------------

#### <i class="icon-download"></i>  Clone the project

#### <i class="icon-refresh"></i>   Install [Homestead](https://laravel.com/docs/5.3/homestead)


<i class="icon-edit"></i>Edit your Homestead.yml :

    folders:
        - map: ~/where-i-cloned/bowling
          to: /home/vagrant/Code/bowling
    sites:
        - map: admin.ovb.app
          to: /home/vagrant/Code/bowling/public
        - map: api.ovb.app
          to: /home/vagrant/Code/bowling/public
    databases:
        - ovb


> **Note:**

> - Do not forget to edit your /etc/hosts
> - vagrant up --provision => so your changes are applied

#### <i class="icon-download"></i> Load your dependencies

In your project root folder :

    $ composer install
    $ npm install

#### <i class="icon-edit"></i> Edit your environment configuration

In your project root folder, create a .env file base on .env.example file.
Fill the blanks.

#### <i class="icon-file"></i> Load your database and API doc

In your project root folder :

    $ php artisan migrate:refresh --seed
    $ composer compile

> **Note:**

> - You MUST do this from your VM
> - vagrant ssh in your Homestead to access your VM

<i class="icon-thumbs-up"></i> Let's start
-------------

Access your [administration panel](http://admin.ovb.app).
A default admin user is generated for you.

    admin@admin.com
    admin
Access your [API documentation](http://api.ovb.app/docs).

#### <i class="icon-refresh"></i> Useful commands

reset your database :

    $ php artisan migrate:refresh --seed

re-generate your API documentation :

    $ composer compile
