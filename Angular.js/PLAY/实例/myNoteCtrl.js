/**
 * Created by lanou on 16/8/20.
 */
app.controller("myNoteCtrl",function($scope){
    $scope.message = "";
    $scope.left = function () {
        return 100 -$scope.mesage.length;
    };
    $scope.clear = function () {
        $scope.message = "";
    };
    $scope.save = function () {
        alert("AA");
    }
});