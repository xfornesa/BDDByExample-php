# BDD by example - php version

Kata of applying behaviour driven development and domain driven design in php.
The feature to implement was "save_recipe"

```Cucumber
Feature: Save recipes into cookbooks

  Scenario: Add recipe to cookbook
    Given exists a user named "John" who owns a cookbook named "Desserts"
      And exists a recipe of title "Crema catalana"
     When the recipe "Crema catalana" is added to the "John"'s cookbook named "Desserts"
     Then the "John"'s cookbook named "Desserts" should contain the recipe of title "Crema catalana"
```


## Installation

Download composer from https://getcomposer.org

    $ curl -sS https://getcomposer.org/installer | php
    
Then, install composer dependencies:

    $ php composer.phar install


## Tests

To run the tests simply execute the following commands:

Behat:

    $ php bin/behat -c behat.yml.dist
    
Unit tests:

    $ php bin/phpunit -c phpunit.xml.dist
