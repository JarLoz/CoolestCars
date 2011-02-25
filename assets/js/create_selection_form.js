function submit_form(whichOne){
	var el;
	if (whichOne == 2){
		el = document.getElementById("rightcar");
	} else if (whichOne == 1){
		el = document.getElementById("leftcar");
	}
	el.submit();
}
