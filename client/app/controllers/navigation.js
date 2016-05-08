// ----------------------------------------------------------------------------
// angular controller
app.controller( 'navigation', ['$scope', '$http', function( $scope, $http ) {
    $scope.menu = [];

    $http.get( '/navigation' ).then( function( res ) {
        if( res.status == 200 ) {
            $scope.menu = res.data;
        }
    });
}]);