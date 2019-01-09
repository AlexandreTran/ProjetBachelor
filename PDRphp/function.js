function programme(idstructure){
    	var xmlhttp = new XMLHttpRequest();
    	xmlhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			 document.getElementById("programmes").innerHTML = this.responseText;
    		}
    	}
    
    	xmlhttp.open("GET", "func.php?id="+ idstructure.value, false);
    	xmlhttp.send();
    	document.getElementById("sub2").disabled = false;
}


function add(idcours){
	  var xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
		        alert(this.responseText);
	    }
	  }

		xmlhttp.open("GET", "func.php?cours="+ idcours, false);
		xmlhttp.send();
}