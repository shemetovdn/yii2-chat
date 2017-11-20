<?php
$this->title = "Chat";
?>
<div class="wrapper"  ng-app="Chat">
    <div class="row"
         ng-controller="ChatController as chat"   ng-init="chat.init()">
        <h2 class="col-md-12">Chat</h2>
        <div  class="col-md-8">
            <form class="col-md-7">
                <div class="form-group">
                    <label> Username</label>
                    <input class="form-control username">
                </div>
                <div class="form-group">
                    <label> Message</label>
                    <textarea class="form-control message"></textarea>
                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-primary" ng-click="chat.addComment()">Send</button>
                </div>
                <div class="clearfix"></div>
            </form>
            <ul class="row comments col-md-6">
                <li ng-repeat="item in comment_list track by $index">
                    <label>{{item.usernsme}}:</label>
                    <p>{{item.comment}}</p>
                </li>
            </ul>
        </div>

        <div class="col-md-4">
            <h3>Users</h3>
            <ul class="row users">
                <li ng-repeat="item in users_list track by $index">
                    <span><label>Username:</label><span>{{item.usernsme}}</span>,</span>
                    <span><label>City:</label><span>{{item.city}}</span></span>
                    <hr/>
                </li>
            </ul>
        </div>
    </div>


</div>

