$(document).ready(function(){
			console.log("theNoob");
			$(".front-face p").hover(function(){
				$(this).parent().parent().addClass("popit");
				var color=$(this).parent().parent().data('color').trim().split(" ");
				var ele=$(this).parent().parent().find(".face");
				//console.log(ele);
				$.each(color,function(key,value){
					$(ele[key]).css({"background":value});
				});
			});
			$(".cube").mouseleave(function(){
				$(this).removeClass("popit").find(".face").css({"background":"transparent"});

			});
            $(".nav").click(function(){
              var link = $(this).data('link').trim();
              window.location=link;
                
              });
		});