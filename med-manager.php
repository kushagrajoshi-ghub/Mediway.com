<?php
session_start();
if(isset($_SESSION["active_user"])==false) {
    header("location:index.php");
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jss/jquery-1.8.2.min.js"></script>
    <script src="jss/bootstrap.bundle.min.js"></script>
    <script src="jss/angular.min.js"></script>
    <link rel="shortcut icon" href="pictures/icon2.jfif">
    <title>Mediway.com</title>
    <script type="text/javascript">
        var mymodule = angular.module("mykuchbhi", []);
        mymodule.controller("mycontroller", function($http, $scope) {
            $scope.trid;
            $scope.jsonArray = [];
            $scope.dofetchall = function() {
                $scope.txtuid;

                var url = "json-angular.php?uid=" + $scope.txtuid;
                $http.get(url).then(fxOk, fxNotok);

                function fxOk(response) {
                    //				alert(JSON.stringify(response.data));
                    $scope.json = response.data;

                }

                function fxNotok(error) {
                    alert(error.data);
                }

            }
            //-------------------
            $scope.doedit = function(medname, qty, rid) {
                $scope.medmed = medname;
                $scope.quantity = qty;
                $scope.trid = rid;
            }
            $scope.dodelete = function(rid) {

                if (confirm("Are you sure?") == false) return;

                var url = "medpost-delete-process.php?rid=" + rid;
                $http.get(url).then(fnOk, fnNotok);

                function fnOk(responsemed) {
                    //alert(responsemed.data);
                    //$scope.med=responsemed.data;
                    $scope.dofetchall();

                }

                function fnNotok(error) {
                    alert(error.data);
                }

            }
            //---------------------------------------------------------------//
            $scope.doupdate = function() {
                //            alert($scope.trid);
                //var upqty=angular.element("#qty").val();
                //            alert(upqty);
                var upqty = $scope.quantity;
                var url = "medpost-edit-process.php?rid=" + $scope.trid + "&qty=" + upqty;
                $http.get(url).then(fnOk, fnNotok);

                function fnOk(response) {
                    //				alert(response.data);
                    //$scope.med=responsemed.data;
                    $.get(url, function(response) {
                        //                    alert(response);
                        $("#msg").html(response);
                    });
                    $scope.dofetchall();

                }

                function fnNotok(error) {
                    alert(error.data);
                }

            }
        });

    </script>
</head>

<body style="background-color: #EAF2F8;" ng-app="mykuchbhi" ng-controller="mycontroller">

    <div class=" bg-primary">

        <h2>
            <center>
                <font color="white">Medicine Manager</font>
            </center>
        </h2>

    </div>
    <div class="container">
        <div class="mt-2">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for=""><b>Enter your email:</b></label>
                    <input type="text" class="form-control" readonly id="txtuid" ng-model="txtuid" name="txtuid" ng-init="txtuid='<?php echo $_SESSION['active_user']?>'"> 
                </div>
                <div class="col-md-1 form-group">
                    <label for="">&nbsp;</label>
                    <input type="button" class="form-control btn btn-outline-primary" id="fetch" value="Search" ng-click="dofetchall();">
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover mt-3 ">
            <tr class="bg-dark text-light">
                <th>S no.</th>
                <th>Medname</th>
                <th>Company</th>
                <th>Expiry</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Dosage</th>
                <th>Front</th>
                <th>Back</th>
                <th>Edit qty</th>
                <th>Delete</th>
            </tr>
            <tr ng-repeat="obj in json">
                <td><b>{{$index+1}}</b></td>
                <td><b>{{obj.medname}}</b></td>
                <td><b>{{obj.company}}</b></td>
                <td><b>{{obj.date}}</b></td>
                <td><b>{{obj.unit}}</b></td>
                <td><b>{{obj.qty}}</b></td>
                <td><b>{{obj.dosage}}</b></td>
                <th>
                    <img src="myuploads/{{obj.fpic}}" alt="" width="40" height="50">
                </th>

                <th>
                    <img src="myuploads/{{obj.bpic}}" alt="" width="40" height="50">
                </th>
                <th>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#mededit" class=" btn  btn-link" ng-click="doedit(obj.medname,obj.qty,obj.rid);">Edit</button>
                </th>
                <th>
                    <img src="pictures/bin.png" width="35" height="40" class="mt-1" style="border-radius:80%;" ng-click="dodelete(obj.rid);">

                </th>

            </tr>
        </table>

        <!------------------------------------------------------------------>
        <!------------------------------------------------------------------>
        <!------------------------------------------------------------------>
        <div class="modal fade" id="mededit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-light text-dark">
                        <h5 class="modal-title" id="examp">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name of medicine:</label>
                                <input type="text" readonly class="form-control" id="medmed" name="medmed" ng-model="medmed">
                                <!--							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Quantity:</label>
                                <input type="text" min="1" class="form-control" id="qty" name="qty" ng-model="quantity">

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <input type="button" class="btn btn-primary" id="login" name="login" value="Update" ng-click="doupdate();">
                            </div>
                            <center>
                                <span id="msg" class="mb-3 mt-1"></span>
                            </center>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>
