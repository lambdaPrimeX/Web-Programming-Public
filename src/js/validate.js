function validateSearch(form)
{
	field = form.userSearch.value;
	if (field == "") {
		fail = "Returning All results for database\n";
		alert(fail);
		return true;
	}
	else if (field.length < 1) {
		fail = "A search must be atleast 2 characters long.\n";
		alert(fail);
		return false;
	}
	else if (/[^a-zA-Z0-9 : -]/.test(field)) {
		fail = "Only a-z, A-Z, 0-9, _, -, . allowed in search.\n"; 
		alert(fail);
		return false;
	}
	else
		return true;
}

// Movie validation functions
function validateMovie(form)
{
// Movie Title validation
	field = form.addMovie_title.value;
	if (field == " " || field == "") {
		field = "No Movie Title was entered.\n";
		alert(field);
		return false;
	}
	else if (field.length < 2) {
		field = "Movie Titles must be atleast 2 characters long.\n";
		alert(field);
		return false;
	}
	else if (/[^a-zA-Z0-9 : -]/.test(field)) {
		field = "Only a-z, A-Z, 0-9, and - allowed in Movie Titles.\n";
		alert(field);
		return false;
	}

// Genre validation
	field2 = form.addMovie_genre.value;
	if (field2 == " " || field2 == "") {
		field2 = "No Movie Genre was entered.\n";
		alert(field2);
		return false;
	}
	else if (field2.length < 2) {
		field2 = "Movie Titles must be atleast 2 characters long.\n";
		alert(field2);
		return false;
	}
	else if (/[^a-zA-Z-]/.test(field2)) {
		field2 = "Only a-z, A-Z and - allowed in Movie Genre.\n";
		alert(field2);
		return false;
	}

// Movie Price validation
	field3 = form.addMovie_price.value;
	if (field3 == " " || field3 == "") {
		field3 = "No Movie Genre was entered.\n";
		alert(field3);
		return false;
	}
	else if (field3.length < 2) {
		field3 = "Movie Titles must be atleast 2 characters long.\n";
		alert(field3);
		return false;
	}
	else if (/[^0-9.]/.test(field3)) {
		field3 = "Only a whole or decimal number allowed in Movie Price.\n";
		alert(field3);
		return false;
	}

//validation for year (even though dropdown, for protection)
	field4 = form.addMovie_year.value;
	if (field4 == "" || field4 == " ") {
		field4 = "ATTENTION: Year must be selected from dropdown menu"
		alert(field4);
		return false;

	}
	else if (/[^0-9]/.test(field4)) {
		field4 = "YEAR: Don't try and break this website.\n";
		// possible to log user info here and ban from website.
		alert(field4);
		return false;
	}

	//validation for Actor name (even though dropdown, for protection)
	field5 = form.addMovie_actor.value;
	if (field5 == "" || field5 == " ") {
		field5 = "ATTENTION: Actor must be selected from dropdown menu";
		alert(field5);
		return false;
	}
	else if (/[^a-zA-Z ]/.test(field5)) {
		field5 = "Don't try and break this website.\n";
		// possible to log user info here and ban from website.
		alert(field5);
		return false;
	}
	
	return true;
}

//cant get spaces to work this moment in time
function validateActor(form)
{	
	field = form.add_actor.value;
	if (field == "") {
		fail = "No Actor Name was entered.\n";
		alert(fail);
		return false;
	}
	else if (field.length < 2) {
		fail = "Actor names must be atleast 2 characters long.\n";
		alert(fail);
		return false;
	}
	else if (/[^a-zA-Z ]/.test(field)) {
		fail = "Only a-z, A-Z allowed in actor names.\n"; 
		alert(fail);
		return false;
	}
	else
		return true;
}

function validateGenre(form)
{
	field = form.addMovie_genre.value;
	if (field == " " || field == "") {
		field = "No Movie Genre was entered.\n";
		alert(field);
		return false;
	}
	else if (field.length < 2) {
		field = "Movie Titles must be atleast 2 characters long.\n";
		alert(field);
		return false;
	}
	else if (/[^a-zA-Z-]/.test(field)) {
		field = "Only a-z, A-Z allowed in Movie Titles.\n";
		alert(field);
		return false;
	}
	else
		return true;
}