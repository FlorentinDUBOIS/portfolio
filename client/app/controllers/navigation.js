// ----------------------------------------------------------------------------
// angular controller
app.controller( 'navigation', ['$scope', '$http', function( $scope, $http ) {
    $scope.menu = [];

    $http.get( '/navigation' ).then( function( res ) {
        $scope.menu = res.data;
    });
}]);