<!doctype html>
<html lang="en">
	
	<head>
		<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<!-- Bootstrap CSS --> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/
		bootstrap.min.css" integrity="sha384-Vkoo8×4CGsO3+Hhxv8T/
		Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!-- Bootstrap JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>

		<title>Register a new user</title>

		<style>

			body{
					background-color:#FDF5E6;
				}

			h1{
    			font-size: 30px;
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 20%;
    			width: 100%;
    		}

    		.form-group1{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 30%;
    			width: 100%;
    		}

    		#username{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    margin-top: 10px;
			    margin-left: 36%;
    			width: 400px;
    		}

    		.form-group2{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 45%;
    			width: 100%;
    		}

    		#password{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    margin-top: 10px;
			    margin-left: 36%;
    			width: 400px;
    		}

    		.form-group3{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 60%;
    			width: 100%;
    		}

    		#passwordConf{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    margin-top: 10px;
			    margin-left: 36%;
    			width: 400px;
    		}

    		button{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    margin-top: 500px;
			    margin-left: 40%;
    			width: 300px;
    		}

    		#backBtn{
    			font-family: "Times New Roman", Times, serif;
			    margin-left: 44%;
			    position: absolute;
			    margin-top: 38%;
    			width: 200px;
    			font-size: 20px;
    			text-align: center;
    		}	

    		a:hover{
    			text-decoration: none;
    		}
		</style>
	</head>

	<body>
		<?php
			if(isset($_GET['error'])){ ?>
				<div class="alert alert-danger alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<?= $_GET['error'] ?>
				</div>
		<?php  }
			if(isset($_GET['message'])){ ?>
				<div class="alert alert-success alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					<?= $_GET['message'] ?>
				</div>
		<?php  }
		?>

		<h1>Sign up</h1>

		<form action='' method='post'>
			<div class="form-group1">
    			<label for="username">Username</label>
    			<input type="text" class="form-control" id="username" name='username' placeholder="Enter username">
  			</div><br>

  			<div class="form-group2">
    			<label for="password">Password</label>
    			<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
  			</div><br>

  			<div class="form-group3">
    			<label for="passwordConf">Password Confirmation</label>
    			<input type="password" class="form-control" id="passwordConf" name="password_confirmation" placeholder="Re-enter Password">
  			</div>

  			<div class="form-group">
    			<label for="password">Role</label>
    			<input type="text" class="form-control" id="password" name="role" placeholder="Enter Role">
  			</div><br>
  			<br>
  			<button type="submit" name='action' value='Register' class="btn btn-primary">Sign up</button>
  			<br>
		</form>
	</body>
</html>