// ----------------------------------------------------------------------------
// filter
app.filter( 'url', [function() {
    return function( input ) {
        var words = input.split( ' ' );

        for( var i in words ) {
            if( /^(https?:\/\/[\/\w\d\-_\.\?=\+]+)/i.test( words[i] )) {
                words[i] = words[i].replace( /^(https?:\/\/[\/\w\d\-_\.\?=\+\%]+)/i, '<a href="$1" >$1</a>' );
            }
        }

        return words.join( ' ' );
    };
}]);