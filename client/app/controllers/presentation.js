// ----------------------------------------------------------------------------
// angular controller
app.controller( 'presentation', ['$scope', '$window', '$http', function( $scope, $window, $http ) {
    $scope.icons = [];
    $scope.open  = function( link ) {
        $window.open( link );
    };

    $http.get( '/presentation' ).then( function( res ) {
        if( res.status == 200 ) {
            $scope.fab = res.data;
        }
    });
}]);