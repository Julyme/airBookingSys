
      function validate_form(thisform)
      {
         if(document.getElementById("acount").value ==""){
			 alert("账户名不能为空");
			 return false;
		 }
		 var password = document.getElementById("password").value;
		 var password1 = document.getElementById("password1").value;
		 if(password ==""){
			 alert("密码不能为空");
			 return false;
		 }
		 if(password1 ==""){
			 alert("密码不能为空");
			 return false;
		 }
		 if(password != password1){
			 alert("两次密码不相同");
			 return false;
		 }
		 if(document.getElementById("name").value ==""){
			 alert("姓名不能为空");
			 return false;
		 }
		 if(document.getElementById("address").value ==""){
			 alert("地址不能为空");
			 return false;
		 }
		 var telnumber = document.getElementById("phone").value;
		 if(telnumber ==""){
			 alert("电话不能为空");
			 return false;
		 }
		 var patrn=/^[0-9]{1,20}$/;   
         if (!patrn.exec(telnumber)) {  
          
            alert("电话号码只能由数字构成");  
            return false;   
         } 
		 if(document.getElementById("email").value ==""){
			 alert("邮箱不能为空");
			 return false;
		 }
		 if(document.getElementById("idcard").value ==""){
			 alert("证件号不能为空");
			 return false;
		 }
		 if(document.getElementById("idcard").value.length != 18){
			 alert("身份证号不合法");
			 return false;
		 }
		 
		 return ture;
      }    
