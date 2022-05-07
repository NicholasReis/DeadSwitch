function getCountDown(){
	let counters = document.getElementsByClassName("count-down-timer");
	console.log(counters.length);
	let index = 0;
	while(index < counters.length){
		let sendDate = counters[index].querySelector("#message-send-date").value;
		console.log(sendDate);
		let countDownEnd = new Date(sendDate);
		
		countDownEnd.setHours(22,0,0,0);

		let rightNow = new Date();

		let diffMilliseconds = countDownEnd.getTime()/1000-rightNow.getTime()/1000;
		let diffHour = Math.floor(diffMilliseconds/3600);
		diffMilliseconds = diffMilliseconds-diffHour*3600;
		
		counters[index].innerHTML = rightNow;
		index++;
	}
}


function getTime(){ 
	let toDate=new Date();
	let tomorrow=new Date();
	tomorrow.setHours(24,0,0,0);
	var diffMS=tomorrow.getTime()/1000-toDate.getTime()/1000;
	var diffHr=Math.floor(diffMS/3600);
	diffMS=diffMS-diffHr*3600;
	var diffMi=Math.floor(diffMS/60);
	diffMS=diffMS-diffMi*60;
	var diffS=Math.floor(diffMS);
	var result=((diffHr<10)?"0"+diffHr:diffHr);
	result+=":"+((diffMi<10)?"0"+diffMi:diffMi);
	result+=":"+((diffS<10)?"0"+diffS:diffS);
	document.getElementById("count-down-timer").innerHTML = result;
	
}

function closeStartMessage(){
	document.getElementById("start-message").remove();
	document.getElementById("menu").style.display = "block";
}


//Sign Up Scripts
function validateAccount(signupUsername, signupEmail, signupPassword, signupPasswordConfirmation){
	//Check for unique username
	//Add credentials to database and send to landing page
	validatePasswordsMatch(signupPassword, signupPasswordConfirmation);
	if(usernameAvailable && passwordMeetsRequirements && passwordsMatch){
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				let response = this.responseText;
			}
		};
		xmlhttp.open("POST", "/deadswitch/php/session_scripts/validatesignup.php?", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("username="+signupUsername+"&email="+signupEmail+"&password="+signupPassword);
	
		alert("Account Created");
	}
}

function validateUniqueEmail(signupEmail){
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = this.responseText;
                if(response == 1){
                    usernameAvailable = false;
                    document.getElementById("email-invalid").style.display = "block";
                    
                }else{
                    usernameAvailable = true;
                    document.getElementById("email-invalid").style.display = "none";;
                }
            }
        };
        xmlhttp.open("POST", "/deadswitch/php/session_scripts/validateuniqueemail.php?", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("email="+signupEmail);
    }
    
    function validateUsernameRequirements(signupUsername){
    }


function validatePasswordRequirements(signupPassword){
	let illegal = /[{};':"\\|,.<>\/?~]/;
	let format = /[!@#$^&*]/;

	if(signupPassword.length > 7){
		if(/\d/.test(signupPassword) && format.test(signupPassword) && !illegal.test(signupPassword)){
			passwordMeetsRequirements = true;
			document.getElementById("password-error").style.display = "none";;
		}else{
			passwordMeetsRequirements = false;
			document.getElementById("password-error").style.display = "block";
		}
	}else{
		passwordMeetsRequirements = false;
	}
}


function validatePasswordsMatch(signupPassword, signupPasswordConfirmation){
	if(signupPassword === signupPasswordConfirmation){
		passwordsMatch = true;
		document.getElementById("password-match-error").style.display = "none";
	}else{
		passwordsMatch = false;
		if(signupPassword.length <= signupPasswordConfirmation.length){		
			document.getElementById("password-match-error").style.display = "block";
		}else{
			document.getElementById("password-match-error").style.display = "none";
		}
	}
}







//Login Scripts
function checkCredentials(loginEmail, loginPassword){
	//create forgot your password button    
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			let response = this.responseText;
			if(response == 0){
				document.getElementById("login-password").value = "";
				alert("Your username or password was incorrect.");
			}else if(response == 1){
				window.location = "/deadswitch/landingpage/";
			}
		}
	};
	xmlhttp.open("POST", "/deadswitch/php/session_scripts/validatelogin.php?", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("email="+loginEmail+"&password="+loginPassword);
}

    
function constructMessageView(){
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
                	if(this.responseText){
				let table = document.getElementById("message-table");
				let messageArray = JSON.parse(this.responseText);
				
				for(let index = 0; index < messageArray.length; index++){
					table.innerHTML += addRow(table, messageArray[index][0], messageArray[index][3], messageArray[index][1], messageArray[index][2]);
				}	
				
                	}else{
                		alert("An error has occured.");
                	}
            	}
        };
        xmlhttp.open("POST", "/deadswitch/php/database_scripts/retrievemessages.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
}

function addRow(table, id, send_date, receiver, message){
	let row = `<div class="message-view">`+
	//<form action="editmessage" method="POST">
	//	<input type="hidden" id="`+id+`" name="`+id+`"/>
	//	<input class="edit-button" type="submit" value="Edit"/>
	//</form>
	`<div class="count-down-timer">
		<input type="hidden" id="message-id" value="`+id+`" />
		<input type="hidden" id="message-send-date" value="`+send_date+`" />
	</div>
	<button class="delete-button" onclick="deleteMessage('`+id+`')">Delete</button>
	<h2>Send Date</h2>`+send_date+`<br>
	<h2>Receiver</h2>`+receiver+`<br>
	<h2>Message</h2>`+message+`<br>
	</div>`;
	//queueTimer(id, send_date);
	return row;
}


function editMessage(id){
	window.location="/deadswitch/landingpage/viewmessages/editmessage/index.php?"+id;
}

function saveMessage(email, subject, message, sendDate){
	let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText);
			if(this.responseText == 1){
				alert("Message saved");
			}else{
				alert("Message NOT saved. Remove any ' or "+'"'+" and try again.");
			}
		}
	}
        xmlhttp.open("POST", "/deadswitch/php/database_scripts/insertmessage.php?", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("receiver="+email+"&subject="+subject+"&message="+message+"&sendDate="+sendDate);
}

function deleteMessage(id){
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
			window.location="/deadswitch/landingpage/viewmessages/index.php";
		}
        };
        xmlhttp.open("POST", "/deadswitch/php/database_scripts/deletemessage.php?", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);
}

function logout(){
	window.location="/deadswitch/php/session_scripts/logout.php";
}
