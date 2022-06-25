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
		var mymodule=angular.module("mykuchbhi",[]);
	mymodule.controller("mycontroller",function($http,$scope){
        $scope.trid;
		$scope.jsonArray=[];
		$scope.dofetchall=function()
		{ 
           

			var url="admin-med-json.php";
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
		//-------------------
//		$scope.doedit=function(medname,qty,rid)
//		{   
//            $scope.medmed=medname;
//            $scope.quantity=qty;
//            $scope.trid=rid;   
//		}
        $scope.dodelete=function(rid)
		{
			
            if(confirm("Are you sure?")==false) return;
            
            var url="medpost-delete-process.php?rid="+rid;
            $http.get(url).then(fnOk,fnNotok);
			
			function fnOk(responsemed)
			{
				alert(responsemed.data);
				//$scope.med=responsemed.data;
                $scope.dofetchall();
				
			}
			function fnNotok(error)
			{
				alert(error.data);
			}
			
		}
//---------------------------------------------------------------//
        $scope.doupdate=function()
        {
//            alert($scope.trid);
            //var upqty=angular.element("#qty").val();
//            alert(upqty);
            var upqty=$scope.quantity;
             var url="medpost-edit-process.php?rid="+$scope.trid+"&qty="+upqty;
             $http.get(url).then(fnOk,fnNotok);
			
			function fnOk(response)
			{
//				alert(response.data);
				//$scope.med=responsemed.data;
//               $.get(url, function(response) {
////                    alert(response);
//                $("#msg").html(response);
//                });
               $scope.dofetchall();
				
			}
			function fnNotok(error)
			{
				alert(error.data);
			}
         
        }
		});
	
	</script>
</head>
<body style="background-color: #EAF2F8;" ng-app="mykuchbhi" ng-controller="mycontroller" ng-init="dofetchall();">
     <div class="row bg-info" style="width:100.9%;">
        <h2>
            <center>
                <font color="white">Medicine Available</font>
            </center>
        </h2>
    </div>
   
   <table class="table table-striped table-hover " >
     <tr class="bg-dark text-white">
         <th>S no.</th>
         <th>Medname</th>
         <th>Company</th>
         <th>Expiry</th>
         <th>Type</th>
         <th>Quantity</th>
         <th>Dosage</th>
         <th>Front</th>
         <th>Back</th>
<!--         <th>Edit</th>-->
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
<!--
            <th >
             <img src="pictures/edit1.png" class="mt-1" width="40" height="40" style="border-radius:%;" ng-click="doedit(obj.rid);">
       <button type="button"  data-bs-toggle="modal" data-bs-target="#mededit" class=" btn  btn-link" ng-click="doedit(obj.medname,obj.qty,obj.rid);">Edit</button>
         </th>
-->
         <th>
             <img src="pictures/bin.png" width="35" height="40" class="mt-1" style="border-radius:80%;" ng-click="dodelete(obj.rid);">
        
         </th>
        
     </tr>
</table>
    </body>