<?php
//require "config/constants.php";

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ecommerce</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			table tr td {padding:10px;}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Ecommerce</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Commandes details</h1>
						<hr/>
						<?php
							include_once("Connexion_db.php");
							$user_id = $_SESSION["uid"];
							$orders_list = "SELECT o.IDCOMMANDE,o.IDUSER,li.SKU,li.QUANTITE,p.NAME,p.PRICE,p.IMAGE FROM commande o,lignecommande li ,produit p WHERE o.IDUSER='$user_id' AND O.IDCOMMANDE = li.IDCOMMANDE AND li.SKU=p.SKU";
							$query = mysqli_query($conn,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?>
										<div class="row">
											<div class="col-md-6">
												<img style="float:right;" src="product_images/<?php echo $row['IMAGE']; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6">
												<table>
													<tr><td>Product Name</td><td><b><?php echo $row["NAME"]; ?></b> </td></tr>
													<tr><td>Product Price</td><td><b><?php echo  CURRENCY." ".$row["PRICE"]; ?></b></td></tr>
													<tr><td>Quantity</td><td><b><?php echo $row["QUANTITE"]; ?></b></td></tr>
												</table>
											</div>
										</div>
									<?php
								}
							}
						?>
						
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
















































