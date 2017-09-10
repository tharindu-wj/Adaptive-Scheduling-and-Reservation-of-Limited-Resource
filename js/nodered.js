//var pageCouter = 1;
//var animalContainer = document.getElementById("animal-info");
//var btn = document.getElementById("btn");

alert("");

	var ourRequest = new XMLHttpRequest();
	ourRequest.open('GET', 'https://api.thingspeak.com/channels/256497/fields/1.json?results=2');
	ourRequest.onload = function() {
	var ourData = JSON.parse(ourRequest.responseText);
	console.log(ourData);
	var temp = ourData.feeds[1].field1;
	
	document.getElementById("occupency1").innerHTML = temp;
	
	var x = document.getElementById("Room1");
        
        if(temp>5) {
                x.style.backgroundColor = "#d9534f";
                document.getElementById("availability1").innerHTML = "Occuipied";
				
        }
		
	}
	
		ourRequest.onerror = function() {
			alert("Check your connection");
			}





ourRequest.send();

var x = document.getElementById("Room1");
        //var y=2;
        if(temp>0) {
                x.style.backgroundColor = "#d9534f";
                document.getElementById("availability1").innerHTML = "Occuipied";
				alert("aa")
        }
		

        var a = document.getElementById("L3");
        var b=2;
        if(b>0) {
            a.style.backgroundColor = "#d9534f";
        } 

/*
pageCouter++;
if(pageCouter > 3){
	btn.classList.add("hide-me");
}




function renderHTML(data) {
	var htmlString = "";

	for(i=0; i<data.length; i++){
		htmlString += "<p>" + data[i].name + " is a " + data[i].species + "that likes ";

		for(j=0; j<data[i].feeds.length; j++){
			if(j==0){
				htmlString += data[i].feeds[j];
			}
			else{
				htmlString += " and " + data[i].feeds[j];
			}
		}
		
		htmlString += " and dislikes "
		
		for(k=0; k<data[i].foods.dislikes.length; k++){
			if(k==0){
				htmlString += data[i].foods.dislikes[k];
			}
			else{
				htmlString += " and " + data[i].foods.dislikes[k];
			}
		} 
		htmlString += ".</p>" 
	}

	animalContainer.insertAdjacentHTML('beforeend', htmlString);
}
*/