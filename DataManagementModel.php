<?php
	class DataManagement{


		public function addUser($username, $password, $email){

			require_once("Connect.php");

			$status = "";

			$query = "insert into user (userName, userPassword, userEmail, role) values ('".$username."','".$password."', '".$email."','member')";

			if(mysqli_query($Conn, $query)){
				$status = "success";
			}else{
				$status = "failed";

			}
			
			return json_encode($status);

		}


		public function loginUser($username, $password){

			require_once("Connect.php");

			$status = "";

			$query = "SELECT * FROM user WHERE userName='".$username."' AND userPassword='".$password."' AND role = 'member'";
			$result = mysqli_query($Conn,$query)or die(mysqli_error());
			$num_row = mysqli_num_rows($result);
  			$row = mysqli_fetch_array($result);

			if( $num_row >=1 ){
					
				$status = "member";
		    	$_SESSION['logged_in'] = $row['userID'];

  			}else {
  					
  				$query = "SELECT * FROM user WHERE userName='".$username."' AND userPassword='".$password."' AND role = 'admin'";
  				$result = mysqli_query($Conn,$query)or die(mysqli_error());
  				$num_row = mysqli_num_rows($result);
  				$row = mysqli_fetch_array($result);
				if(mysqli_query($Conn, $query)){

					if( $num_row >=1 ){
					
						$status = "admin";
		    			$_SESSION['logged_in'] = $row['userID'];

  					}else {
  					}

				}else{

					$status = "failed";
				
				}
  			}
			
			return json_encode($status);

		}
	}
?>