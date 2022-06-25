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
    <link rel="shortcut icon" href="pictures/icon2.jfif">
    <title>Mediway.com</title>
    <style>
    .d {
            display: flex;
            /*            border: 2px black solid;*/
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
            /*    border-radius: 12px 12px 12px 12px;*/
        }
    </style>
   <script type="text/javascript">
		var mymodule=angular.module("mykuchbhi",[]);
	    mymodule.controller("mycontroller",function($http,$scope){
        $scope.uid;
            
		$scope.jsonArray=[];
		$scope.dofetchmedicine=function()
		{ 
           

			var url="fetch-medicine.php";
			$http.get(url).then(fxOk,fxNotok);
			 
			function fxOk(response)
			{
				//alert(JSON.stringify(response.data));
				$scope.json=response.data;
                
				
			}
			function fxNotok(error)
			{
				alert(error.data);
			}
			
		}
        
        $scope.dofetchcity=function()
		{
            var medmed=angular.element("#medicine").val();
            
           var url="fetch-the-city.php?med="+medmed;
			$http.get(url).then(fxOk,fxNotok);
			 
			function fxOk(response)
			{
				//alert(JSON.stringify(response.data));
				$scope.jsoncity=response.data;
                
				
			}
			function fxNotok(error)
			{
				alert(error.data);
			} 
        }
//---------------------------------------------------------//
         $scope.dodisplay=function()
		{
            var medmed=angular.element("#medicine").val();
            var citty=angular.element("#city").val();
             
           var url="find-display-card.php?med="+medmed+"&citty="+citty;
			$http.get(url).then(fxOk,fxNotok);
			 
			function fxOk(response)
			{
				//alert(JSON.stringify(response.data));
				$scope.fetch=response.data;
                
				
			}
			function fxNotok(error)
			{
				alert(error.data);
			} 
        }
//-------------------------------------------------------//
          $scope.showmodal=function(uid,medname)
		{
           $scope.uid=uid;
             
           var url="find-show-modal.php?uid="+ uid + "&medname=" + medname;
			$http.get(url).then(fxOk,fxNotok);
			 
			function fxOk(response)
			{
				//alert(JSON.stringify(response.data));
				$scope.med=response.data;
                
				
			}
			function fxNotok(error)
			{
				alert(error.data);
			} 
        }
//--------------------------------------//
         $scope.showcontact=function()
		{
           
             
           var url="find-show-contact.php?uid="+$scope.uid;
			$http.get(url).then(fxOk,fxNotok);
			 
			function fxOk(response)
			{
				//alert(JSON.stringify(response.data));
				$scope.contact=response.data;
                
				
			}
			function fxNotok(error)
			{
				alert(error.data);
			} 
        }  
    });
    </script>
    </head>
    <body  ng-app="mykuchbhi" ng-controller="mycontroller" ng-init="dofetchmedicine();" style="background-color: #EAF2F8;">
      
       <div class=" bg-primary col-md-13" >
        <h2>
            <center>
                <font color="white">Find Medicines</font>
            </center>
        </h2>
    </div>
    <div class="container">
    <div class="row mt-4">
        <div class="col-md-4 form-group">
            <label for="" class="form-label">Name of Medicine:</label>
            <input type="list" list="meds" id="medicine" class="form-control" placeholder="Enter the name of medicine" ng-blur="dofetchcity();">
            <datalist id="meds">
            
            <option value="{{obj.medname}}" ng-repeat="obj in json"></option>
            </datalist>
        </div>
        <div class="col-md-4 form-group">
            <label for="" class="form-label">Select City:</label>
            <select name="city" id="city" class="form-control" >
                <option value="" selected>Select</option>
                <option value="{{obj.city}}" ng-repeat="obj in jsoncity">{{obj.city}}</option>
            </select>
        </div>
        
        <div class="col-md-2 form-group">
            <label for="" class="form-label">&nbsp;</label>
            <input type="button" value="Find Provider" class="form-control btn btn-outline-primary" ng-click="dodisplay();">
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-4" ng-repeat="obj in fetch">
            <div class="card d" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><center><img src="myuploads/{{obj.fpic}}" height="120" width="150"></center></li>
            <li class="list-group-item">Medicine name: {{obj.medname}} ({{obj.dosage}}mg)</li>
            <li class="list-group-item">Company : {{obj.company}}</li>
            <li class="list-group-item">Quantity: {{obj.qty}}</li>
            <li class="list-group-item">Expiry: {{obj.date}}</li>
            <li class="list-group-item">
                <center><button type="button"  class="btn btn-outline-primary btn-light" data-bs-toggle="modal" data-bs-target="#mededit" ng-click="showmodal(obj.uid,obj.medname,obj.qty,obj.date,obj.);">Contact</button></center>
            </li>
        </ul>
        </div>
        </div>
    </div>
<!------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------>
     <div class="modal fade" id="mededit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light text-dark">
                    <h5 class="modal-title" id="examp">All details &amp; Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" ng-repeat="obj in med">
                       <div class="row">
                        <div class="mb-3 col-md-9">
                            <label for="exampleInputEmail1" class="form-label">Name of Medicine:</label>
                            <input type="text" readonly class="form-control" id="medmed" name="medmed" value="{{obj.medname}}">
                            <!--							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                        </div>
                         <div class="mb-3 col-md-3">
                            <label for="exampleInputPassword1" class="form-label">Company:</label>
                            <input type="text" min="1" class="form-control" readonly id="" name=""  value="{{obj.company}}">

                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Type:</label>
                            <input type="text" min="1" class="form-control" readonly id="qty" name="qty"  value="{{obj.unit}}">

                        </div>
                         <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Dosage:</label>
                            <input type="text" min="1" class="form-control" readonly id="qty" name="qty"  value="{{obj.dosage}}">

                        </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-md-6"><center><img src="myuploads/{{obj.fpic}}"  height="90" width="150" ></center></div>
                              <div class="col-md-6"><center><img src="myuploads/{{obj.bpic}}"  height="90" width="150" style="border: 0.5px black solid;"></center></div>
                          </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="button" class="btn btn-outline-success" id="login" name="login" value="Contact info" ng-click="showcontact();">
                        </div>
                        
                           <div class="col-md-10" ng-repeat="obj in contact">
                            <ul class="list-group list-group-flush">
                               <li class="list-group-item">Name: {{obj.name}}</li>
                               <li class="list-group-item">Address: {{obj.address}},
                               {{obj.city}} {{obj.state}}</li>
                               <li class="list-group-item">Mobile no: {{obj.contact}}</li>
                            </ul>
                            </div>
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
    
   </div> 
    </body>