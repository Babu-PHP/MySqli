<?php 
session_start();
include "includes/dbconfig.php";
//print_r($_SESSION['f_userid']);
if($_SESSION['f_userid']){
    header("Location: myaccount.php");exit;
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
  <h2>Login form</h2>
  <form name="myForm" novalidate ng-submit="myFunc()">
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" name="username" ng-model="username" required>
      <span style="color:red" ng-show="myForm.username.$dirty && myForm.username.$invalid">
      <span ng-show="myForm.username.$error.required">Username is required.</span>
      </span>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" ng-model="password" required>
      <span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
      <span ng-show="myForm.password.$error.required">Password is required.</span>
      </span>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    
      
      <input type="submit"
      ng-disabled="myForm.username.$dirty && myForm.username.$invalid ||  
      myForm.password.$dirty && myForm.password.$invalid" ng-click="formsubmit(myForm.$valid)">
    <!-- <button type="submit" class="btn btn-default">Submit</button> -->

  </form>
  <p>
    <pre ng-model="result">
                {{result}}
            </pre>

  </p>
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