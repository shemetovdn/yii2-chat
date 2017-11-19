var chatModule = angular.module('Chat', ['ngRoute']);

chatModule .controller('ChatController', function($scope,$http) {
    var Entity = this;


    Entity.init = function(){
        $http({
            method: 'POST',
            url: '/admin/gallery/default/get-comments',
            data: '&_csrf='+ yii.getCsrfToken(),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {

            if (response.data != 0) {
                $scope.products_list = response.data;
            }

        });
    }
    Entity.addComment = function(val){
        var id = val;
        $http({
            method: 'POST',
            url: '/chat/add-comment',
            data: '&_csrf='+ yii.getCsrfToken(),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            if ($scope.products_list) {
                if (response.data != 0) {
                    $scope.products_list[$scope.products_list.length] = response.data;
                }
            }else {
                $scope.products_list = new Array(response.data);
            }

        });

    }

});