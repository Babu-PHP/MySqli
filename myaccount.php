<?php 
session_start();
include "includes/dbconfig.php";

if(!$_SESSION['f_userid']){
    header("Location: index.php");exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

  <style>
  .footer {
     position: fixed;
     left: 0;
     bottom: 0;
     width: 100%;
     background-color: red;
     color: white;
     text-align: center;
  }


input.ng-invalid, input.ng-dirty{
    background-color: pink;
}
input.ng-valid {
    background-color: lightgreen;
}

</style>
</head>
<body>
<?php
  include "includes/nav.php";
?>

<div class="container" ng-app="myApp" ng-controller="formCtrl">
  <h2>My Account</h2>
  
  <div class="row">
    <div class="col-sm-4">
      <ul class="list-group">
        <li class="list-group-item"><a href="view_users.php">Users</a></li>
        <li class="list-group-item"><a href="logout.php">My Profile</a></li>
        <li class="list-group-item"><a href="logout.php">Change Password</a></li>
        <li class="list-group-item"><a href="logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="col-sm-8">
      <h2>Welcome to your dashboard</h2>
    </div>
  </div>

</div>
<?php
  include "includes/footer.php";
?>


<script>
var app = angular.module('myApp', []);

app.controller("formCtrl", ['$scope', '$http', '$window', function($scope, $http, $window) {
        $scope.url = 'get_ajax_controller.php';
 
        $scope.formsubmit = function(isValid) {
 
 
            if (isValid) {
              
 
                $http.post($scope.url, {"control_type": 'user_login', "username": $scope.username, "password": $scope.password}).
                        then(function(data, status) {
                            console.log(data);

                            if(data.data == "1")
                            $window.location.href = 'login.php?succ=Data inserted successfully!!';
                            else
                            $window.location.href = 'login.php?err=Data insertion failed!!';

                        })
            }else{
                
                  alert('Form is not valid');
            }
 
 
        }
 
 
 
 
    }]);
</script>

</body>
</html>