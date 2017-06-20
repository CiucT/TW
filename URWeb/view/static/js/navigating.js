//document.getElementById("navigate").onclick=ShowSteps();

    //alert(php_navigating[0].instructions);
    for(i=0;i<php_navigating.length;i++){
    	var tr=document.createElement("tr");
    	var th=document.createElement("th");
    	th.innerHTML=php_navigating[i].instructions;
    	th.style.fontSize="12px";
    	tr.appendChild(th);
    	document.getElementById("navig").appendChild(tr);
        //console.log(php_navigating[i].instructions);
    }
