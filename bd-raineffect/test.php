<html>
<head>
<script>
function temp(){
   var test = document.getElementById("test").value;
   if(!isNaN(test)){
      alert("是数字");
   }else{
      alert("不是数字");
   }
}
</script>
</head>
<body>
<input type="text" id="test">

<button onclick="temp();">sub</button>

</body>
</html>