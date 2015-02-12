var recognition = new webkitSpeechRecognition();
var u = new SpeechSynthesisUtterance();
u.text = "Taking to event page"
u.lang = 'en-US';
var res; 
//recognition.continuous = true;
recognition.onresult = function(event) {
    if(event.results.length>0){
    res = event.results[0][0].transcript;
        if(res == "event" || res == "events" || res =="even" || res == "bands" || res == "band") {
            speechSynthesis.speak(u);
            window.location.href = "event.html";
        }
        else{
            u.text = "No Match Found"
            speechSynthesis.speak(u);
        }
    }
}
function start() {
   if('webkitSpeechRecognitionEvent' in window)
      recognition.start();
}
start();
