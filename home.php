<?php
session_start();

if(!isset($_SESSION['logged_in']))
{
 header("Location: login.php");
}

require_once ('Connect.php');

$session = $_SESSION['logged_in'];

$query  = "SELECT * FROM user WHERE userID = '$session'";
$result = mysqli_query($Conn, $query)or die(mysqli_error());
$row     = mysqli_fetch_array($result);

function fill_massage($Conn){


      $output = '';  
      $sql = "SELECT * from product";  
      $result = mysqli_query($Conn, $sql);  
      while($row = mysqli_fetch_array($result)){
           $output .= '<div class="box"><img src="'.$row["productImage"].'" width="160" height="100"><h3>'.$row["productName"].'</h3><p>IDR. '.$row["productPrice"].'</p></div>';  
      }  
      return $output;  
    }


?>
	<title>Home - Cooties</title>
	<link rel="stylesheet" type="text/css" href="home_style.css">
	<link rel="stylesheet" type="text/css" href="font.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.slc{
			display: block;
			margin-top: 30px;
			margin-left: 24px;
			border:1px solid #47a3da; 
			font-size:14px; 
			padding: 5px;
			width:200px; 
			color: #47a3da;
  		}
		
		.box{
			background-color: #f9f9f9;
			border-color: white;
			border-style: solid;
			border-width: 1px;
			width: 240px;
			height: 250px;
			display: inline-block;
			margin-top: 30px;
			margin-left: 24px;
			box-shadow: 2px 2px 4px 0px rgba(0,0,0,0.1);
			text-align: center;
			padding-top: 25px;			
		}

		.box:hover{
			border-color: #47a3da;	
		}
	</style>


	<body>
		<div class="container">
			<header class="clearfix">
				<span>Cooties <span class="bp-icon bp-icon-about" data-content="adalah online cookies store yang menjual berbagai macam kue, yang dibuat secara homemade dengan kualitas rasa yang menyeimbangi toko kue ternama"></span></span>
				<h1>Buy any cookies in our store !</h1>
			</header>	
			
			<!-- menu navigasi -->	
			<div class="navbar" id="navbar">
				<ul>
					<li><a href="">Home</a></li>
					<li class="product">
					 	<a href="javascript:void(0)" class="dropdown">Product<i class="fa fa-caret-down"></i></a>
						<div class="product-content">
							<a href="">Cake</a>
							<a href="">Cookies</a>
							<a href="">Bread</a>
					    </div>
					</li>
					<li class="product" style="float: right;border: none;border-left-width: 1px;border-left-color: #47a3da;border-left-style: solid;">
					 	<a href="javascript:void(0)" class="dropdown"><?php echo $row['userName']?><i class="fa fa-caret-down"></i></a>
						<div class="product-content" style="width: 158px;">
							<a href="logout.php">Logout</a>
					    </div>
					</li>
				</ul>
			</div>

			<div class="main">
				<select class="slc" name="location" id="location">  
					<option class="rw" value="">Show All Product</option>
				</select>
				<?php echo fill_massage($Conn);?>
			</div>
		</div>	
	</body>
<script type="text/javascript" src="home_script.js"></script>