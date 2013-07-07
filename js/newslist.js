var ie = (typeof window.ActiveXObject != 'undefined');


function jumpto(url){
	
	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}
$(function(){

	$(".newsList").each(function(index){  
   
	   $(this).bind({  
            mouseover:function(){  
            	this.style.backgroundColor = "#EEF8FF";  
             },
			 mouseout:function(){  
           		 this.style.backgroundColor = "white";
				 
			 },
			 click:function(){
				 var nid=$(this).attr("id");
				 
				 nid=nid.substring(8,nid.length)
				 $.cookie("newsID",nid);
				jumpto("shownews.php")
			 }
			 
	   })
	});
	
});
