/**app.controller("atsCtrl", ["$scope" , function ($scope) {
    $scope.currentSize2 = "599x487";

    var size = $scope.currentSize2.split("x");

    $scope.embed2= '<iframe '+' src = " ' + $scope.url2+'" width = "' + size[0]+ '"  height = "' +size[1]+ '"  frameBorder = 0  allowfullscreen ' +
        '</iframe>'+ '<br>' +'<a href = "'+$scope.url2 +' " title = "MSU University"  target="_blank" >'+'Apply to MSU</a>' ;

    $scope.url2= "http://www.getboarded.com/university/apply/msu";

    $scope.currentTemplate2='t1';

    $scope.change = function () {
        console.log("change");
        var size = $scope.currentSize2.split("x");

        $scope.embed2= '<iframe '+' src = " ' + $scope.url2+'" width = "' + size[0] + '"  height = "' +size[1]+ '"  frameBorder = 0  allowfullscreen ' +
            '</iframe>'+ '<br>' +'<a href = "'+$scope.url2 +' " title = "MSU University"  target="_blank" >'+'Apply to MSU</a>' ;
    }
}]);
 **/
app.controller("atsCtrl", ["$scope" , function ($scope) {
    $scope.currentSize2 = "599x487";
    $scope.url1="http://www.getboarded.com/editor/embed_code?key=NG1gbpMmnd0TX&resume=inkscale";
    $scope.url2= "http://www.getboarded.com/university/apply/msu";
    var size = $scope.currentSize2.split("x");

    $scope.embed2= '<iframe '+' src = " ' + $scope.url1+'" width = "' + size[0]+ '"  height = "' +size[1]+ '"  frameBorder = 0  allowfullscreen ' +
        '</iframe>'+ '<br>' +'<a href = "'+$scope.url2 +' " title = "MSU University"  target="_blank" >'+'Apply to MSU </a>' ;



    $scope.currentTemplate2='t1';

    $scope.change = function () {
        console.log("change");
        var size = $scope.currentSize2.split("x");

        $scope.embed2= '<iframe '+' src = " ' + $scope.url1+'" width = "' + size[0] + '"  height = "' +size[1]+ '"  frameBorder = 0  allowfullscreen ' +
            '</iframe>'+ '<br>' +'<a href = "'+$scope.url2 +' " title = "MSU University"  target="_blank" >'+'Apply to MSU</a>' ;
    }
}]);