<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script language="javascript">
var item=new Array();

function adj(dir){
	var currSelectValue = document.all.mainform.board.selectedIndex; 
	if(currSelectValue==document.all.mainform.board.length-1){
		return false
	}
	var itemList=new Array();
	var itemValue=new Array();
	
	
	//if(currSelectValue>0){
		for(i=0;i<document.all.mainform.board.length;i++){
			itemList[i]=document.all.mainform.board.options[i].text
			itemValue[i]=document.all.mainform.board.options[i].value
			
		}
		if ( !(currSelectValue==0 && dir==-1) ){
			itemList[currSelectValue+dir]=document.all.mainform.board.options[currSelectValue].text
			itemValue[currSelectValue+dir]=document.all.mainform.board.options[currSelectValue].value
			itemList[currSelectValue]=document.all.mainform.board.options[currSelectValue+dir].text
			itemValue[currSelectValue]=document.all.mainform.board.options[currSelectValue+dir].value	
		}

		for (i = document.all.mainform.board.length-1; i >=0; i--) {             
        	document.all.mainform.board.options.remove(i);      
        }
		for (i=0; i < itemList.length; i++) {   
			var varItem = new Option(itemList[i], itemValue[i]);  
			document.all.mainform.board.options.add(varItem);
        }	

		document.all.mainform.board.options[currSelectValue+dir].selected = true;   
		
		     
		save();
		document.all.mainform.savedata.disabled="";

	//}
	//alert(currSelectValue)

}
function save(){
	var str=""
	for (i=0; i<document.all.mainform.board.length; i++) {
		str=str+document.all.mainform.board.options[i].value+"|"
	}
	document.all.mainform.idlist.value=str

}
function check(){
	if(document.all.mainform.idlist.value==""){
		alert("请改变顺序后保存");
		return false
	}
}
function deleteit(){
	var currSelectValue = document.all.mainform.board.selectedIndex; 
	if (currSelectValue>=0){
		self.location="deleterec.php?id="+document.all.mainform.board.options[currSelectValue].value
	}
	
}
function jumpout(){
	//var currSelectValue = document.all.mainform.board.selectedIndex; 
	//alert(currSelectValue);
	top.mainFrame.location="addandmodi.php?id="+document.all.mainform.board.options[currSelectValue].value
}
$(function(){
	$('#board').bind({
			click:function(event){
				alert($(this).val());
				alert($(this).attr("selectedIndex"))
			}
		});	
	
	
});
</script>
<body>


<form action="savelist.php" name="mainform" id="mainform" method="post" onsubmit="return check()" >
<input type="text" name="idlist" id="idlist" />
<table border="0" align=center cellpadding="0" cellspacing="0" >
  <tr align=center>
    <td  ><select name="board" size="10" id="board" style="width:300px" >

 

<?php include("res/dbconnect.php");?>
<?php

	
	$strsql="SELECT * FROM member order by orderlist,id";
    $result=mysql_db_query($mysql_database, $strsql, $conn);
    // 获取查询结果

	while ($row=mysql_fetch_array($result)){
        $id=$row[id];
		echo "<option value=" . $id . ">".$row[pname] . "</option>";
	}

?>
   
    </select></td><td width=100>
    
          	<div  onclick="deleteit()" style="color:red">delete</div><br />
          	<br>
             <div  onclick="adj(-1)">up</div><br />
            
             <div onclick="adj(1)">down</div><br />
             
            <input type="submit" name="savedata" id="savedata" value="save" onclick="save()"  style="width:50px" disabled="disabled" /></td>
           </tr>
         </table>
      </td>
  </tr>
  
</table>

</form>
</body>
</html>
