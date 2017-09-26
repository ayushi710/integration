app.controller('customCtrl',function ($scope) {

    $scope.sampleBtn = 'false';
    $scope.toggleCall = function (current) {
        $scope.sampleBtn = current;
    }
});


