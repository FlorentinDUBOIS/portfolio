// ----------------------------------------------------------------------------
// filter
app.filter( 'hashtag', [function() {
    return function( input ) {
        var words = input.split( ' ' );

        for( var i in words ) {
            if( /^#[\w\d_\-]+/i.test( words[i] )) {
                words[i] = words[i].replace( /^(#[\w\d_\-]+)/i, '<a href="https://twitter.com/search?q=%23$1" target="_blank" >$1</a>' );
            }
        }

        return words.join( ' ' );
    };
}]);