$(document).ready(function(){
	url= "sched.json";
	$("#list li ").click(function(){
		ev = $(this).data("name").toLowerCase();
		$.getJSON(url).done(function(data){
			 $(".spinner").hide();
			name = data[ev]["name"];
			path = data[ev]["path"];
			rnd1dt=data[ev]["rnd1dt"];
			rnd2dt=data[ev]["rnd2dt"];
			rnd1tt=data[ev]["rnd1tt"];
			rnd2tt=data[ev]["rnd2tt"];
			str='<p class="r1"><span>Round 1 : <span>'+rnd1dt+" "+rnd1tt+'</p><p class="r2"><span>Round 2 : <span>'+rnd2dt+" "+rnd2tt+'</p>'
			$("#modal").find("h1").html(name);
			$("#modal").find("img").attr("src",path);
			$("#time").html(str);
			if(ev=="event7" || ev=="event8"|| ev=="event9" || ev=="event10"){
				str='<p class="r1">'+rnd1dt+" "+rnd1tt+'</p><p class="r2">'+rnd2dt+" "+rnd2tt+'</p>'
				$("#time").html(str);
			}
			$("#modal").modal();
		
		});
	});
            
});