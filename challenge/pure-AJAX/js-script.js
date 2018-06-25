document.getElementById('ajaxButton').onclick = function () {
	let firstName = document.getElementById('firstName').value;
	let lastName = document.getElementById('lastName').value;
	makeRequest('testDb.php', firstName, lastName);
}

let httpRequest = false;
function makeRequest (url, firstName, lastName) {
	httpRequest = new XMLHttpRequest();

	if(!httpRequest) {
		alert('Giving up :( Cannot create an XMLHTTP instance');
		return false;
	}
	httpRequest.onreadystatechange = alertContents;
	httpRequest.open('POST', url, true);
	httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //!!! Required?
	httpRequest.send('firstName=' + firstName);

	function alertContents() {
		let readyState = httpRequest.readyState;
		let status = httpRequest.status;
		if (readyState == XMLHttpRequest.DONE) {
			if (status == 200) {
				alert('Input saved to DB!');
			} else {
				alert ('Problem saving to DB!');
			}
		}
	}
}