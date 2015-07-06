Framework
===========

This framework is a little project, base on a main scripting language, [PHP](http://php.net), I append support for some different scripting language that is compile on [JavaScript](http://javascript.com) or on [CSS](http://en.wikipedia.org/wiki/Cascading_Style_Sheets).

Languages support by the framework :

    Cascading style sheet preprocessor :

    - SCSS
    - SASS
    - LESS

    JavaScript preprocessor :

    - LiveScript
    - CoffeeScript

Route - Controller
-------

This framework is base on route object that use route to access on a specific controller. That create the view using some models objects and functions.

Create a route is easy :

    Route::on( 'url', function( array $args = null ) {
        # do stuff here
    });

url can be pcre expression, but slash are automaticly backslash.


View
-------

To show a view the php file must be in views directory. Call a view it is easy :

    echo View::make( filename, arguments, layout );


Models
-------

Classes and functions are on models directory. Html layout and templates are in models directory too, can be call by the object view.

Tasks
-------

The framework can also make task for you, the task can be launch by the command exec

    ./task.ls exec -- arg1=data arg2=data ... argn=data

Or multiple task launch in "the same time" (not really)

    ./task.ls do task1 task2 task3

On other side php, task declaration :

    Task::on( 'task', function( array $args = null ) {
        # do stuff here
    }, ['depen 1', 'depen 2', ..., 'depen n']); # this create a task

depens are task too.
