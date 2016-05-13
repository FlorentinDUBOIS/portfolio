// ----------------------------------------------------------------------------
// app controllers
app.controller( 'github', ['$scope', '$http', '$mdDialog', '$mdToast', '$window', '$translate', function( $scope, $http, $mdDialog, $mdToast, $window, $translate ) {
    $http.get( 'github/repositories' ).then( function( res ) {
        $scope.repositories = res.data;
    });

    $http.get( 'github/user' ).then( function( res ) {
        $scope.user = res.data;
    });

    $scope.open = function( link ) {
        $window.open( link );
    };

    $scope.readme = function( event, repo ) {
        $http.get( 'github/repositories/' + repo + '/readme' ).then( function( res ) {
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
        }, function() {
            $translate( 'github.error.readme' ).then( function( trad ) {
                $mdToast.show(
                    $mdToast.simple()
                        .textContent( trad )
                        .hideDelay( 3000 )
                );
            });
        });
    };
}]);