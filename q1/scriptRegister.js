function validate(form)
{
	fail = validateFirstName(form.first_name)
	fail += validateLastName(form.last_name)
	fail += validateMemberID(form.member_id)
	fail += validateEmail(form.email)
	fail += validatePhone(form.phone)
	fail += validateFitnessGoals(form.fitness_goals)
	fail += validateWorkoutSchedule(form.workout_schedule)
	fail += validateFitnessLevel(form.fitness_level)
	fail += validatePassword(form.password)
	if (fail == "") return true
	else { alert(fail); return false }
}
function validateFirstName(field)
{
	if(field.value == ""){
		field.style.backgroundColor = 'lightCoral';
		return "No First name was entered.\n";
	}  
	else{
		return "";
	}
}
function validatePassword(field)
{
	if (field.value == "") { 
		field.style.backgroundColor = 'lightCoral';
		return "No Password was entered.\n";
		}
	else if (field.value.length < 6){
			field.style.backgroundColor = 'lightCoral'; 
			return "Passwords must be at least 6 characters.\n";}
	else if (!/[a-z]/.test(field.value) || ! /[A-Z]/.test(field.value) ||
		!/[0-9]/.test(field.value)){ 
		field.style.backgroundColor = 'lightCoral'; return "Passwords require one each of a-z, A-Z and 0-9.\n";}
	return "";
}

function validateLastName(field)
{
	if (field.value == ""){
		field.style.backgroundColor = 'lightCoral';	
		return "No Last name was entered.\n";
	}
	else
		return "";
}
function validateMemberID(field)
{
	if(field.value == ""){
		field.style.backgroundColor = 'lightCoral';
		return "No Member ID was entered.\n";
	}  
	else{
		return "";	
	}
}
function validateEmail(field)
{
	if(field.value == ""){
		field.style.backgroundColor = 'lightCoral';
		return "No Email was entered.\n";
	}  
	else{		
		if (!((field.value.indexOf(".") > 0) &&
			(field.value.indexOf("@") > 0)) ||
			/[^a-zA-Z0-9.@_-]/.test(field.value)){
				field.style.backgroundColor = 'lightCoral';
				return "The Email address is invalid.\n";
		}
		else{		
			return ""; 
		}
	}
}

function validatePhone(field)
{
	if(field.value == ""){
		field.style.backgroundColor = 'lightCoral';
		return "No Phone number was entered.\n";
	}  
	else{
		return "";
	}
}

function validateFitnessGoals(field)
{
	if(field.value == ""){
		field.style.backgroundColor = 'lightCoral';
		return "No Fitness goals were entered.\n";
	}  
	else{
		return "";
	}
}

function validateWorkoutSchedule(field)
{
	if(field.value == ""){
		field.style.backgroundColor = 'lightCoral';
		return "No Workout schedule was entered.\n";
	}  
	else{
		return "";
	}
}

function validateFitnessLevel(field)
{
	if(field.value == ""){
		field.style.backgroundColor = 'lightCoral';
		return "No Fitness level was entered.\n";
	}  
	else{
		return "";
	}
}

function clearElement(field){
	field.style.backgroundColor = 'white';
}

