// ----------------------------------------------------------------------------
// angular controller
app.controller( 'presentation', ['$scope', '$window', function( $scope, $window ) {
    $scope.icons = [
        { path: 'assets/github.svg',    link: 'https://github.com/FlorentinDUBOIS' },
        { path: 'assets/google+.svg',   link: 'https://plus.google.com/100395044725382027486' },
        { path: 'assets/linkedin.svg',  link: 'https://www.linkedin.com/in/florentin-dubois-73b045114' },
        { path: 'assets/tweet.svg',     link: 'https://twitter.com/FlorentinDUBOIS' },
        { path: 'assets/travis-ci.svg', link: 'https://travis-ci.org/FlorentinDUBOIS' },
        { path: 'assets/docker.svg',    link: 'https://hub.docker.com/u/florentindubois' }
    ];

    $scope.open = function( link ) {
        $window.open( link );
    };
}]);