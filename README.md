# blog
The intention of this project was to highlight Oriented Object Programming concepts and S.O.L.I.D principles (by Uncle Bob).
Here we have many design patterns as:

- Singleton;
- Front Controller;
- Model, View and Controller - MVC;
- Factory Method;
- Fluent Interface;
- Dependency Injection;
- Strategy;
- Chain Of Responsibilities;
- Delegation;

On this project you also could realise how to deal with:
- Sql Injection;
- XSS attack;
- Cross Site Request Forgery (CSRF) Attack

# 
Views:
[HOME](https://github.com/victorfleite/blog-php-oop/blob/master/assets/imgs/print.png) |
[LOGIN](https://github.com/victorfleite/blog-php-oop/blob/master/assets/imgs/login.png) | 
[CREATE POST](https://github.com/victorfleite/blog-php-oop/blob/master/assets/imgs/create.png)

### Installation

```sh
$ git clone https://github.com/victorfleite/blog-php-oop.git
```

Database script: [https://github.com/victorfleite/blog-php-oop/tree/master/config/script/blog.sql](https://github.com/victorfleite/blog-php-oop/tree/master/config/script/blog.sql)

Restore the database using

mysql -p -u[user] blog < blog.sql


### Run
http://localhost/blog/


### Test

Acceptance Tests, Functional Tests and Unit Tests

```sh
$ ./vendor/bin/codecept run --steps
```

### Author
Victor Leite - <victor.leite@gmail.com> 

### License
blog is available under the MIT license. See the LICENSE file for more info.
