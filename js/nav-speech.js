(function() {
	// Get some required handles
	var startRecBtn = document.getElementById('startRecBtn');
	//console.log(startRecBtn);
	flag=true;
	// Define a new speech recognition instance
	var rec = null;
	var u=null;
	try {
		rec = new webkitSpeechRecognition();
		u = new SpeechSynthesisUtterance();
	} 
	catch(e) {
    	$(".cmd").text("You need latest Chrome for This To work");

    	flag=false;
    	startRecBtn.setAttribute('disabled', 'true');
    	//stopRecBtn.setAttribute('disabled', 'true');
    }
    if (rec) {
		rec.continuous = true;
		rec.interimResults = false;
		rec.lang = 'en';

		// Define a threshold above which we are confident(!) that the recognition results are worth looking at 
		var confidenceThreshold = 0.4;

		// Simple function that checks existence of s in str
		var userSaid = function(str, s) {
			return str.indexOf(s) > -1;
		}


		rec.onresult = function(e) {
			// Check each result starting from the last one
			for (var i = e.resultIndex; i < e.results.length; ++i) {
				// If this is a final result
	       		if (e.results[i].isFinal) {
	       			// If the result is equal to or greater than the required threshold
	       			if (parseFloat(e.results[i][0].confidence) >= parseFloat(confidenceThreshold)) {
		       			var str = e.results[i][0].transcript;
		       			console.log('Recognised: ' + str);
		       			// Find what the uesr said
		       			if(userSaid(str,'home')){
		       				window.location.href="index.html";
		       			}
		       			else if(userSaid(str, 'events') || userSaid(str, 'even') || userSaid(str, 'event')) {
		       				window.location.href="events.html";
		       			}
		       			else if(userSaid(str, 'about') || userSaid(str, 'out') || userSaid(str, 'us')) {
		       				window.location.href="about.html";
		       			}
		       			else if(userSaid(str, 'schedule')) {
		       				window.location.href="schedule.html";
		       			}
		       			else if(userSaid(str, 'contact') || userSaid(str, 'us')) {
		       				window.location.href = "contact.php";
		       			}
                                        else if(userSaid(str, 'register') || userSaid(str, 'easter')) {
		       				window.location.href = "register.html";
		       			}

		       			else if(userSaid(str,'code')) {
		       				$($("#list li")[0]).click();
		       			}
                                        else if(userSaid(str,'avinash')) {
		       				alert("You have been Rickrolled!!");
                                                 window.location.href="http://www.youtube.com/watch?v=dQw4w9WgXcQ";
		       			}
		       			else{
		       				u.text = "No Match Found"
            				speechSynthesis.speak(u);
		       			}
		 
	       			} 
	        	}
	    	}
		};

		// Start speech recognition
		var startRec = function() {
			rec.start();
		}
		// Setup listeners for the start and stop recognition buttons
		startRecBtn.addEventListener('click', startRec, false);
		//stopRecBtn.addEventListener('click', stopRec, false);
	}
})();