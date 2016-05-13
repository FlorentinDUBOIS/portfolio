// ----------------------------------------------------------------------------
// filter
app.filter( 'pseudo', [function() {
    return function( input ) {
        if( input ) {
            return input.replace( /@([\w\d_\-]+)/gi, '<a href="https://twitter.com/$1" target="_blank" >@$1</a>' );
        }

        return '';
    };
}]);