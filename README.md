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

This framework is base on route object that use route to access on a specific controller. That create the view using some models objects and functions. Before controller execute, execution task can be execute.

Create a route is easy :

    ```php
    Route::on( 'url', [], function( array $args = null ) {
        # do stuff here
    });
    ```

url can be pcre expression, but slash are automaticly backslash.


View
-------

To show a view the php file must be in views directory. Call a view it is easy :

    ```php
    View::make( filename, arguments, layout );
    ```

Models
-------

Classes and functions are on models directory. Html layout and templates are in models directory too, can be call by the object view.
