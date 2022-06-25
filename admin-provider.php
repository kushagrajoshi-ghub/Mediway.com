<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jss/jquery-1.8.2.min.js"></script>
    <script src="jss/bootstrap.bundle.min.js"></script>
    <script src="jss/angular.min.js"></script>
    <title>dash-provider.php</title>
    <script type="text/javascript">
        var mymodule = angular.module("mykuchbhi", []);
        mymodule.controller("mycontroller", function($http, $scope) {
            $scope.trid;
            $scope.jsonArray = [];
            $scope.dofetchall = function() {


                var url = "admin-fetch-profile.php";
                $http.get(url).then(fxOk, fxNotok);

                function fxOk(response) {
                    //				alert(JSON.stringify(response.data));
                    $scope.json = response.data;

                }

                function fxNotok(error) {
                    alert(error.data);
                }

            }
           
        });

    </script>
    <style>
        .r{
             background-color:#16A085;
        }
    </style>
</head>

<body style="background-color: #EAF2F8;" ng-app="mykuchbhi" ng-controller="mycontroller" ng-init="dofetchall();">
    <div class="row r" style="width:100.9%;">
        <h2>
            <center>
                <font color="white">Profiles</font>
            </center>
        </h2>
    </div>

    <table class="table table-striped table-hover ">
        <tr class="bg-dark text-white">
            <th>S no.</th>
            <th>Username</th>
            <th>Name</th>
            <th>contact</th>
            <th>address</th>
            <th>City</th>
            <th>Profile pic</th>
            <th>Idtype</th>
            <th>Idproof</th>

        </tr>
        <tr ng-repeat="obj in json">
            <td><b>{{$index+1}}</b></td>
            <td><b>{{obj.uid}}</b></td>
            <td><b>{{obj.name}}</b></td>
            <td><b>{{obj.contact}}</b></td>
            <td><b>{{obj.address}}</b></td>
            <td><b>{{obj.city}}</b></td>

            <th>
                <img src="myuploads/{{obj.picpath}}" alt="" width="50" height="60">
            </th>
            <td><b>{{obj.idtype}}</b></td>
            <th>
                <img src="myuploads/{{obj.idpath}}" alt="" width="60" height="50">
            </th>



        </tr>
    </table>
</body>
