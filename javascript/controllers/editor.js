/**
 * Created by ayushimittal on 11/07/17.
 */
app.controller("embedCtrl", ["$scope" , function ($scope) {
    $scope.currentSize = "599x487";

    var size = $scope.currentSize.split("x");

    $scope.embed= '<iframe '+' src = " ' + $scope.editorurl+'" width = "' + size[0]+ '"  height = "' +size[1]+ '"  frameBorder = 0  allowfullscreen ' +
        '</iframe>'+ '<br>' +'<a href = "'+$scope.editorurl +' " title = "Build Infographic Resume"  target="_blank" >'+'Infographic Resume Editor</a>' ;

    $scope.editorurl= "http://www.getboarded.com/editor/ ";

    $scope.currentTemplate='t1';
    var temp = [{name:"template-1",url:"https://www.slideshare.net/AtifAwan/how-linkedin-built-a-community-of-a-billion"},{}];
    console.log("$scope.currentTemplate= temp");
    $scope.change = function () {
        console.log("change");
        var size = $scope.currentSize.split("x");

        $scope.embed= '<iframe '+' src = " ' + $scope.editorurl+'" width = "' + size[0] + '"  height = "' +size[1]+ '"  frameBorder = 0  allowfullscreen ' +
            '</iframe>'+ '<br>' +'<a href = "'+$scope.editorurl +' " title = "Build Infographic Resume"  target="_blank" >'+'Infographic Resume Editor</a>' ;
    }
}]);


