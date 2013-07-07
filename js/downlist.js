var ie = (typeof window.ActiveXObject != 'undefined');

var idList=new Array()

function jumpto(url){

	if(ie){
			window.location.href(url);
		}else{
			window.location=url;
	}	
}

$(function(){
	$('.nameList td').addClass('tablecontent');
	$(".nameList").each(function(index){  
		this.style.backgroundColor = (index % 2 != 1 ?  "#F3F3F3":"#DEE9F7"); 
	   $(this).bind({  
            mouseover:function(){  
            	this.style.backgroundColor = "#EEF8FF";  
             },
			 mouseout:function(){  
           		 this.style.backgroundColor = (index % 2 != 1 ? "#F3F3F3":"#DEE9F7")
			 },
			 click:function(){
				 var nid=$(this).attr("id");
				 nid=nid.substring(5,nid.length)
				 download(nid)
			 }
			 
	   })
	});
	var main = $(window.parent.document).find("#content");
	var thisheight = $(document).height();
	main.height(thisheight+30);
	
});

function download(nid){
	//window.open (idList[this.id])
	document.getElementById("downloadURL").src="maindoc/"+idList[nid]
}
