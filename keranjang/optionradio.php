<html>
	<head>
		<link rel="stylesheet" href="../assets/css/jquery-ui.css" type="text/css" />
		<link rel="stylesheet" href="../assets/css/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
		<script type="text/javascript" src="../assets/js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="../assets/js/jquery-ui.js"></script> 
		<script type="text/javascript" src="../assets/js/jquery.ui.timepicker.js?v=0.3.3"></script>
		<script type="text/javascript">
            $(document).ready(function() {
                $('#jam1').timepicker({
                    showPeriodLabels: false
                });
              });
		</script>
	</head>

	<body>
		<form>
		<input type="radio" name="rad" id="rad1" value="1" class="rad"/> Kirim Sekarang --atau-- 
		<input type="radio" name="rad" id="rad2" value="2" class="rad"/>  Kirim Nanti <br>
			<!-- form yang mau ditampilkan-->
			<div id="form1" style="display:none" >
				<input name="waktu" type="hidden"/>
			</div>
			<div id="form2" style="display:none">
				Tentukan waktu pengiriman : <input type="text" name="waktu" style="width: 70px;" id="jam1" />
			</div>
		</form>
		<!-- tambahkan jquery-->
		
		<script type="text/javascript">
			$(function(){
				$(":radio.rad").click(function(){
					$("#form1, #form2").hide()
					if($(this).val() == "1"){
						$("#form1").show();
					}else{
						$("#form2").show();
					}
				});
			});
		</script>
	</body>
</html>