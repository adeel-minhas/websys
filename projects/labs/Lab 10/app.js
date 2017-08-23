var page = angular.module('TwitterApp', []);


page.controller('PageCtrl', ['$scope', '$http', function ($scope, $http) {

    $scope.searchbar = ""; //this basically holds what we are searching for
    $scope.num = 5;//default number of tweets to search for is 5
    $scope.loaded = true;
    $scope.search = function () {
        if(!$scope.loaded) {
            return;
            //if we didn't put anything in to search, we return immediately
        }

        $scope.loaded = false;
        var url = "/tweets";

        var query = {
            search_b: $scope.searchbar,
            number: $scope.num,
        };

        $http.get(url, {params: query}).then(function (response) {
            $scope.loaded = true;
            $scope.tweet = response.data;

        });
    };

    //made a new angular function called export.

    $scope.export = function () {
      var url = "/export";
      var query = {
          search_b: $scope.searchbar,
          number: $scope.num,
          filetype: $scope.filetype //added a new parameter that will tell what filetype I am looking at.
      };
        if(!$scope.loaded){
            return;
        }
        //attempting an error check
        if($scope.filetype == "none"){
            alert("You must select a filetype");
        }

        $http.get(url, {params: query}).then(function(response) {
			  $scope.tweet = response.data;
		})
    };
    //reset function
    $scope.reset = function() {
      var url = "/reset";
      window.location.reload();
      //this will refresh the button as well when I click the reset button
      $http.get(url).then(function(response) {
        $scope.loaded = true;
      })


    };

    $scope.visualize = function(){
      var url = "/visualize";
      window.location.href = "visualize.html"

      $http.get(url).then(function(response) {
        $scope.loaded = true;
      })
    }

}]);
