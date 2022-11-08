
<!DOCTYPE html>

<html lang="en">

<head>
	
	<?php use content\component\componentViews as componentViews;
		
		  $css = new componentViews();
		  $css->head(); ?>

	<style type="text/css">
		<?php require_once 'assets/css/errorView.css'; ?>
	</style>

</head>

<body>

	<div  class="container d-none d-sm-none d-md-block" style="margin-top: 2%; margin-left: 2%; margin-right: 2%">
		
		<div class="col-3">
			
			<img src="assets/img/logo.png" height="125" >

		</div>
		
		<div class="col-sm-9" style="margin-top: 2%">

			<div class="row align-items-center">
				
				<div class="col">
				
					<img src="assets/img/letras.png" height="100" > 

				</div>
				
				<div class="col" style="margin-top: 6%">
					<div class="spinner-grow text-danger" role="status" >
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			
			</div>
		</div>

		<div class="col-sm-9" style="margin-top: 1%">

			<img src="assets/img/text.png" height="50" >

		</div>

	</div>

	<div  class="container d-block d-sm-block d-md-none" style="margin-top: 8%; margin-left: 4%;">
		
		<div class="col-sm-9" style="margin-right: 10%">

			<center><img src="assets/img/logo.png" height="125"></center>
			
		</div>
		
		<div class="col-sm-9" style="margin-top: 5%">

			<div class="row align-items-center">
				
				<div class="col">
				
					<img src="assets/img/letrasc.png" height="100" > 

				</div>
			
			</div>
		</div>

		<div class="col-sm-9" style="margin-top: 1%; margin-right: 10%">

			<center><img src="assets/img/textc.png" height="50" ></center>

		</div>

	</div>

</body>
</html>
