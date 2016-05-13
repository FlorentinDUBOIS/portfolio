// ----------------------------------------------------------------------------
// angular controller
app.controller( 'links', ['$scope', '$http', function( $scope, $http ) {
    $scope.items = [];

    $http.get( 'links' ).then( function( res ) {
        $scope.items = res.data;
    });
}]);