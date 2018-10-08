<!DOCTYPE html>
<html >
<head>
	<title>AngularJS Multiple File Upload with PHP/MySQLi</title>
	<meta charset="utf-8">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
</head>
<body ng-app="app" ng-controller="uploader" ng-init="fetch()">
<div class="container">
	<h1 class="page-header text-center">AngularJS Multiple File Upload with PHP/MySQLi</h1>
	<div class="row">
		<div class="col-md-3">
			<h3 class="text-center">Upload File/s</h3>
			<hr>
			<label>File:</label>
			<input type="file" file-input="files" ng-model="files" multiple>
			<hr>
			<button class="btn btn-primary" ng-click="upload()"><span class="glyphicon glyphicon-download-alt"></span> Upload</button>
			<button ng-click="angular.copy(files)" type="reset">Remove files</button>

			<div ng-show="error" class="alert alert-danger text-center" style="margin-top:30px;">
				<button type="button" class="close" ng-click="clearMessage()"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-remove"></span> {{ errorMessage }}
			</div>
			<div ng-show="success" class="alert alert-success text-center" style="margin-top:30px;">
				<button type="button" class="close" ng-click="clearMessage()"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-check"></span> {{ successMessage }}
			</div>
		</div>
		<div class="col-md-9">
			<div class="col-md-4" ng-repeat="image in images">
				<img ng-src="<?php echo __DIR__; ?>/upload/{{ image.filename }}" width="100%" height="250px" class="thumbnail">
			</div>
		</div>
	</div>
</div>
<script src="angular.js"></script>
</body>
</html>