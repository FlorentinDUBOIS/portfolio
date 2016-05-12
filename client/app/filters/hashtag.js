// ----------------------------------------------------------------------------
// filter
app.filter( 'hashtag', [function() {
    return function( input ) {
        return input.replace( /(#[\w\d_\-]+)/gi, '<a href="https://twitter.com/search?q=%23$1" target="_blank" >$1</a>' );
    };
}]);