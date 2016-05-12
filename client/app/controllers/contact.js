// ----------------------------------------------------------------------------
// app controller
app.controller( 'contact', ['$scope', '$http', '$mdToast', '$translate', function( $scope, $http, $mdToast, $translate ) {
    $scope.tweets = [];

    $http.get( 'twitter/tweets' ).then( function( res ) {
        if( res.status == 200 ) {
            $scope.tweets = res.data;
        }
    });

    $http.get( 'twitter/user' ).then( function( res ) {
        if( res.status == 200 ) {
            $scope.user = res.data;
        }
    });

    $scope.submit =  function() {
        $http.post( 'contact/send', $scope.mail ).then( function( res ) {
            if( res.status == 200 ) {
                $translate( 'contact.success' ).then( function( trad ) {
                    $mdToast.show(
                        $mdToast.simple()
                            .textContent( trad )
                            .position( $scope.getToastPosition())
                            .hideDelay( 3000 )
                    );
                });
            }  else {
                $translate( 'contact.error.sent' ).then( function( trad ) {
                    $mdToast.show(
                        $mdToast.simple()
                            .textContent( trad )
                            .position( $scope.getToastPosition())
                            .hideDelay( 3000 )
                    );
                });
            }
        });

        return false;
    };
}]);