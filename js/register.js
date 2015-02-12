$(document).ready(function(){
	var name=reg=email=pno=false;
	$("#regform img").hide();
	$("#captcha").show();
	$("#name").focusout(function(){
		//validate name;
		var pat = /[a-zA-Z\s+]/i;
		var res = pat.test($(this).val());
		
		if(res){
			$(this).parent().find("img").attr("src","img/tick.png");
			$(this).parent().find("img").show();
			name=true
		}else{
			$(this).parent().find("img").attr("src","img/cross.png");
			$(this).parent().find("img").show();
			name=false;
		}

	});
	$("#reg").focusout(function(){
		//validate name;
		var pat = /^\d{9}$/i;
		var res = pat.test($(this).val());
		//alert()
		if(res){
			$(this).parent().find("img").attr("src","img/tick.png");
			$(this).parent().find("img").show();
			reg=true;
		}else{
			$(this).parent().find("img").attr("src","img/cross.png");
			$(this).parent().find("img").show();
			reg=false;
		}

	});
	$("#email").focusout(function(){
		//validate name;
		var pat = /^\S+@\S+\.\S+$/i
		var res = pat.test($(this).val());
		//alert()
		if(res){
			$(this).parent().find("img").attr("src","img/tick.png");
			$(this).parent().find("img").show();
			email=true;
		}else{
			$(this).parent().find("img").attr("src","img/cross.png");
			$(this).parent().find("img").show();
			email=false;
		}

	});

	$("#pno").focusout(function(){
		//validate name;
		var pat = /^\d{10}$/i
		var res = pat.test($(this).val());
		//alert()
		if(res){
			$(this).parent().find("img").attr("src","img/tick.png");
			$(this).parent().find("img").show();
			pno=true;
		}else{
			$(this).parent().find("img").attr("src","img/cross.png");
			$(this).parent().find("img").show();
			pno=false;
		}

	});
	$("form").submit(function(){
		console.log(reg);
		console.log(pno);
		console.log(name);
		console.log(email);
		if(reg && pno && name && email)
			$(this).submit();
		else{
			alert("Correct Errors");
			return false;
		}
	});

});