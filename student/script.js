function validatLogin(){
	
	var Address = document.myForm.address;
	var Pass= document.myForm.password;
	if(Address == ""){
		return(document.write("Email Address Needed"));
	}

	else if(Pass == ""){
		return (document.write("Please fill in the Password"));
	}
}