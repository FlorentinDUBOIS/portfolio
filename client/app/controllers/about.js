// ----------------------------------------------------------------------------
// app controller
app.controller( 'about', ['$scope', '$http', function( $scope, $http ) {
    $scope.tweets = [];

    $http.get( '/twitter' ).then( function( res ) {
        if( res.status == 200 ) {
            $scope.tweets = res.data;
        }
    });
}]);