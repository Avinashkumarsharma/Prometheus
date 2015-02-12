$(document).ready(function(){
	url="events.json";
	$("#list li ").click(function(){
		ev = $(this).data("name");
        //console.log(ev);
		$.getJSON(url).done(function(data){
            $(".spinner").hide();
			name = data[ev]["name"];
            console.log(data[ev]);
			path = data[ev]["path"];
			desc = data[ev]["desc"];
            console.log(desc);
			$("#modal").find("h1").html(name);
			$("#modal").find("img").attr("src",path);
			$("#modal").find("p").html(desc);
			$("#modal").modal();
                        if(ev=='event3')
				$('.reg').find('a').attr("href","http://hawkeye.iecsemanipal.com/");
			
			return false;
		});
	});
});