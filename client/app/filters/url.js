// ----------------------------------------------------------------------------
// filter
app.filter( 'url', [function() {
    return function( input ) {
        if( input ) {
            return input.replace( /(https?:\/\/[\/\w\d\-_\.\?=\+\%]+)/gi, '<a href="$1" >$1</a>' );
        }

        return '';
    };
}]);