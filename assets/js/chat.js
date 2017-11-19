var chatModule = angular.module('Chat', ['ngRoute']);

chatModule .controller('ChatController', function($scope,$http) {
    var Entity = this;


    Entity.init = function(){
        $("form input, form textarea").change(function(){
            $(this).removeClass('error');
        })
        $http({
            method: 'POST',
            url: '/chat/get-comments',
            data: '&_csrf='+ yii.getCsrfToken(),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {

            if (response.data != 0) {
                $scope.comment_list = response.data;
            }

        });
    }
    Entity.addComment = function(){
        var username = $("form .username").val();
        var message = $("form .message").val();
        $http({
            method: 'POST',
            url: '/chat/add-comment',
            data: '&_csrf='+ yii.getCsrfToken()+'&username='+username+'&message='+message,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            if ($scope.products_list) {
                if (response.data != 0) {
                    $scope.products_list[$scope.products_list.length] = response.data;
                }
            }else {
                $scope.comment_list = new Array(response.data);
            }
            console.log(response.data);
            if(response.data.indexOf(0) != -1){
                $("form .username").addClass('error');
            }
            else if(response.data.indexOf(1) != -1){
                $("form .message").addClass('error');
            }
            else{
                $scope.comment_list = response.data;
            }

        });

    }

});