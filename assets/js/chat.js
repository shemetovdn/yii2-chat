var chatModule = angular.module('Chat', ['ngRoute']);

chatModule .controller('ChatController', function($scope,$http) {
    var Entity = this;


    Entity.init = function(){
        $("form input, form textarea").change(function(){
            $(this).removeClass('error');
        })
        $http({
            method: 'POST',
            url: '/chat/get-data',
            data: '&_csrf='+ yii.getCsrfToken(),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
                $scope.comment_list = response.data.comments;
                $scope.users_list = response.data.users;
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

            console.log(response.data);
            if(response.data.errors){
                if(response.data.errors.indexOf(0) != -1){
                    $("form .username").addClass('error');
                }
                else if(response.data.errors.indexOf(1) != -1){
                    $("form .message").addClass('error');
                }
            }
            else{
                console.log(response.data.comments);
                $scope.comment_list = response.data.comments;
                $scope.users_list = response.data.users;

                $('ul.comments ').animate({
                    scrollTop: $("ul.comments li:last-child").offset().top
                }, 2000);
            }

        });

    }

});