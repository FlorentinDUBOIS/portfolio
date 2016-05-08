// ----------------------------------------------------------------------------
// filter
app.filter( 'pseudo', [function() {
    return function( input ) {
        var words = input.split( ' ' );

        for( var i in words ) {
            if( /^@[\w\d_\-]+/i.test( words[i] )) {
                words[i] = words[i].replace( /^@([\w\d_\-]+)/i, '<a href="https://twitter.com/$1" target="_blank" >@$1</a>' );
            }
        }

        return words.join( ' ' );
    };
}]);