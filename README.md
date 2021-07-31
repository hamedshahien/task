# Popular Github Repos
## How to run the application

to install packages

```composer install```

to run docker image 

```./vendor/bin/sail up```

to run tests 

```./vendor/bin/sail php artisan test```


## Default values for github

we have some default values for github e.g we are searching for repos have more than 10000 star - you can change this default value from 
 config/services.php

also user can change this values like this 

``` q=stars:>=11000 ```
## Searching
### q param
contains filter for prefered language & created date 

you should add base uri like this at the beginning of every request

 ``` localhost/api/v1/repositories? ```

most popular repositories created from this date

``` q=created:>2019-01-10 ```

so it will be 

 ``` localhost/api/v1/repositories?q=created:>2019-01-10```


A filter for the programming language

``` q=language:php ```

and you can comine them like 

``` q=language:php + created:>2019-01-10 ```

### per_page param

to get  top 10, 50, 100 repositories 

``` per_page=10 ```

``` per_page=50 ```

``` per_page=100 ```

### combine 2 params

```  per_page=10&q=language:php + created:>2019-01-10 ```

### need help 
If you have any questions , please don't hesitate to create issue !

## License

The App licensed under the [MIT license](https://opensource.org/licenses/MIT).
