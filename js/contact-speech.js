(function(){
	var startRecBtn = document.getElementById('startRecBtn');
	console.log(startRecBtn);
	var rec = null;
	try {
		rec = new webkitSpeechRecognition();
		u = new SpeechSynthesisUtterance();
	} 
	catch(e) {
    	$(".cmd").text("You need latest Chrome for This To work");
    	flag=false;
    	
    }
    if (rec) {
		rec.continuous = true;
		rec.lang = 'en';
		final_transcript = '';
		rec.onresult = function(event) {
    var interim_transcript = '';
    for (var i = event.resultIndex; i < event.results.length; ++i) {
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
        console.log(final_transcript);
      } else {
        interim_transcript += event.results[i][0].transcript;
      }
    }
    final_transcript = capitalize(final_transcript);
     $("textarea").val(linebreak(final_transcript));
    //interim_span.innerHTML = linebreak(interim_transcript);
	}
	var two_line = /\n\n/g;
var one_line = /\n/g;
	function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}
var first_char = /\S/;
function capitalize(s) {
  return s.replace(first_char, function(m) { return m.toUpperCase(); });
}
var startRec = function() {
			rec.start();
		}
		// Setup listeners for the start and stop recognition buttons
		startRecBtn.addEventListener('click', startRec, false);
	}
})();