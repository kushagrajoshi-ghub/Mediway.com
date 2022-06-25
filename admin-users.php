<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jss/jquery-1.8.2.min.js"></script>
    <script src="jss/bootstrap.bundle.min.js"></script>
    <title>dash-provider.php</title>
    <script src="jss/angular.min.js"></script>
    <script type="text/javascript">
		var mymodule=angular.module("mykuchbhi",[]);
	mymodule.controller("mycontroller",function($http,$scope){
//        $scope.trid;
		$scope.jsonArray=[];
		$scope.dofetchall=function()
		{ 
//            $scope.txtuid;

			var url="json-admin-user.php";
			$http.get(url).then(fxOk,fxNotok);
			
			function fxOk(response)
			{
//				alert(JSON.stringify(response.data));
				$scope.json=response.data;
				
			}
			function fxNotok(error)
			{
				alert(error.data);
			}
			
		}
//-----------------------------------------------------------//
         $scope.doblock = function(email) {
                if (confirm("Are You Sure?") == false)
                    return;
                else {
                    var url = "block-user-control.php?email=" + email;
                    $http.get(url).then(fxOk, fxNotok);

                    function fxOk(response) {
                        $scope.dofetchall();
                    }

                    function fxNotok(error) {
                        alert(error.data);
                    }
                }
            }
            $scope.doresume  = function(email) {
                if (confirm("Are You Sure?") == false)
                    return;
                else {
                    var url = "resume-user-control.php?email=" + email;
                    $http.get(url).then(fxOk, fxNotok);

                    function fxOk(response) {
                        $scope.dofetchall();
                    }

                    function fxNotok(error) {
                        alert(error.data);
                    }
                }
            }
    });
    </script>
    </head>
    
<body  ng-app="mykuchbhi" ng-controller="mycontroller" ng-init="dofetchall();">
   <div class="row bg-warning" style="width:100.9%;">
        <h2>
            <center>
                <font color="white">Profile Viewer</font>
            </center>
        </h2>
    </div>
    <table class="table table-striped table-hover" >
     <tr class="bg-dark text-light">
         <th>S no.</th>
         <th>Userid</th>
         <th>Password</th>
         <th>Mobile</th>
         <th>Category</th>
         <th>Date of Signup</th>
         <th>Block</th>
         <th>Resume</th>
<!--
         <th>Back</th>
         <th >Edit</th>
         <th >Delete</th>
-->
     </tr>
     <tr ng-repeat="obj in json">
         <td><b>{{$index+1}}</b></td>
         <td><b>{{obj.email}}</b></td>
         <td><b>{{obj.pwd}}</b></td>
         <td><b>{{obj.mobile}}</b></td>
         <td><b>{{obj.category}}</b></td>
         <td><b>{{obj.dos}}</b></td>
<!--
         <td><b></b></td>
         <td><b></b></td>
-->
         <th align="center">
                <img ng-if="obj.status==1" src="pictures/block.jfif" alt="" width="50" height="50" style="border-radius:50%; cursor:pointer;" ng-click="doblock(obj.email);">
            </th>

            <th align="center">
                <img ng-if="obj.status==0" src="pictures/resume1.jfif" alt="" width="50" height="50" class="mt-0" style="border-radius:25%; cursor:pointer;" ng-click="doresume(obj.email);" >
            </th>
    </table>
</body>   