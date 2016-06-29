[![Coverage Status](https://coveralls.io/repos/github/sheanie/notes-demo/badge.svg?branch=master)](https://coveralls.io/github/sheanie/notes-demo?branch=master)

# notes-demo
Demo ZF2 and Doctrine Notes application

### Tech Summary

I used Zend Framework 2 with Doctrine 2 for the ORM.  AdminLTE for the core template.  Assets managed and served with Asset Manager.  

### Functionality

* List notes
* Add Note
* Edit Note
* Delete Note

### Todo

* Unit tests (!)
* Flash Messages for action notifications
* Enable JS for moving todo lists around on front page
* Pop up the edit, delete pages in a modal
* Allow makring of todo items as complete
* Date Picker for due date
* Travis CI integration
* PHPCS audit and fixing

## Setup

* Clone Repo
* composer install
* Update local.php config with db creds
* create notes database
* Run Doctrine CLI orm:schema:create
* navigate to <host>:<port>/notes