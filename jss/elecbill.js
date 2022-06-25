function dobill()
{
   
   var unit=document.queryselector("#units");
    var A=document.getElementById("addac");
    var B=document.getElementById("addfan");
    var C=document.getElementById("addcool");
    var a=document.getElementById("ac");
    var f=document.getElementById("fan");
    var c=document.getElementById("cool");
    var total=document.querySelector("#totbill");
    var u=document.getelementbyid("unitbill");
    var x=doccument.querySelector("#acbill");
    var y=doccument.querySelector("#fnbill");
    var z=doccument.querySelector("#coolbill");
    if(A.checked==true)
        x.value=100*a.value;
    if(B.checked==true)
        y.value=100*f.value;
    if(C.checked==true)
        z.value=100*c.value;
    u.value=5*unit.value;
    
    total.value=x.value+y.value+z.value+u.value;   document.getElementById("totbill").value=total; 
        
}