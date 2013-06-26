var ie = (typeof window.ActiveXObject != 'undefined');

function jumpNews(){
	jumpTOP("index.php?menuID=12&submenuID=0&id="+idList[this.id]+"&showmode=2")
}
function jumpTOP(url){
	
	if(ie){
			top.window.location.href(url);
		}else{
			top.window.location=url;
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
				jumpTOP("index.php?menuID="+$('#showMode').val()+"=0&id="+nid+"&showmode=2")
			 }
			 
	   })
	});
	
});
