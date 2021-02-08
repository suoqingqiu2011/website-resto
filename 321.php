
<div id="page_container">  
    <!--密码输入框-->  
    <div class="input_block">  
	
        <label>显示密码</label><input type="checkbox" value="1" id="demo_img" onclick="hideShowPsw()" />  
		<input type="password" id="demo_input" placeholder="Password"/>   
    </div>  
  
    <button onclick="">Login</button>  
</div>  

<script type="text/javascript">  
    var demoInput = document.getElementById("demo_input");  
     
    function hideShowPsw(){  
        if (demoInput.type == "password") {  
            demoInput.type = "text";  
            //demo_img.src = "invisible.png";  
        }else {  
            demoInput.type = "password";  
            //demo_img.src = "visible.png";  
        }  
    }  
</script>  