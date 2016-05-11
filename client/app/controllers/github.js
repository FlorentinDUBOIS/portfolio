// ----------------------------------------------------------------------------
// app controllers
app.controller( 'github', ['$scope', '$http', '$mdDialog', '$window', '$translate', function( $scope, $http, $mdDialog, $window, $translate ) {
    $http.get( 'github/repositories' ).then( function( res ) {
        if( res.status == 200 ) {
            $scope.repositories = res.data;
        }
    });

    $http.get( 'github/user' ).then( function( res ) {
        if( res.status == 200 ) {
            $scope.user = res.data;
        }
    });

    $scope.open = function( link ) {
        $window.open( link );
    };

    $scope.readme = function( event, repo ) {
        $http.get( 'github/repositories/' + repo + '/readme' ).then( function( res ) {
            if( res.status == 200 ) {
                $translate( 'modal.dismiss' ).then( function( dismiss ) {
                    $mdDialog.show(
                        $mdDialog.alert()
                            .parent( angular.element( document.querySelector( 'body' )))
                            .clickOutsideToClose( true )
                            .title( 'README.md - “' + repo + '”' )
                            .htmlContent( markdown.toHTML( $window.atob( res.data.content )))
                            .ok( dismiss )
                            .targetEvent( event )
                    );
                });
            }
        });
    };
}]);