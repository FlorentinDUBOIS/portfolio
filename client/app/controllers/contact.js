// ----------------------------------------------------------------------------
// app controller
app.controller( 'contact', ['$scope', '$http', '$mdToast', '$translate', function( $scope, $http, $mdToast, $translate ) {
    $scope.tweets = [];

    $http.get( 'twitter/tweets' ).then( function( res ) {
        $scope.tweets = res.data;
    });

    $http.get( 'twitter/user' ).then( function( res ) {
        $scope.user = res.data;
    });

    $scope.submit =  function() {
        $http.post( 'contact/send', $scope.mail ).then( function( res ) {
            $translate( 'contact.success' ).then( function( trad ) {
                $mdToast.show(
                    $mdToast.simple()
                        .textContent( trad )
                        .hideDelay( 3000 )
                );
            });
        }, function() {
            $translate( 'contact.error.sent' ).then( function( trad ) {
                $mdToast.show(
                    $mdToast.simple()
                        .textContent( trad )
                        .hideDelay( 3000 )
                );
            });
        });

        return false;
    };
}]);