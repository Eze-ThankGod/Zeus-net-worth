function myFunction(){
  var asst= parseInt(document.getElementById("asst").value);

  var cash= parseInt(document.getElementById("cash").value);

  var liab= parseInt(document.getElementById("liab").value);


  var networth= asst-liab;

  document.getElementById("demo").innerHTML=networth;

  }
  function myOtherFunction(x){ x.style.background="yellow";

  }
