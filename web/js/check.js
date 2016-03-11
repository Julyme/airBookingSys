
      function validate_form(thisform)
      {
         if(document.getElementById("fromcity").value ==""){
			 alert("出发城市不能为空");
			 return false;
		 }
		 if(document.getElementById("tocity").value ==""){
			 alert("到达城市不能为空");
			 return false;
		 }
		 if(document.getElementById("fromdate").value ==""){
			 alert("出发日期不能为空");
			 return false;
		 }
		 return ture;
		 
      }    
