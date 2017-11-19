<?php
$this->title = "Chat";
?>
<div class="wrapper"  ng-app="Chat">

    <?php if (isset($comments)){ ?>

    <div class="row"
         ng-controller="ChatController as chat"   ng-init="chat.init()">
        <h3 class="col-md-12 red">Chat</h3>
        <div  class="col-md-6">
            <form>
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
            <ul>
                <li ng-repeat="item in comment_list track by $index">
                    <label>{{item.usernsme}}</label>
                    <p>{{item.comment}}</p>
                </li>
            </ul>
        </div>

        <?php } ?>
    </div>


</div>

