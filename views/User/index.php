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
		<title>Log in Page</title>

		<style>

			body{
					background-color:#FDF5E6;
				}
				
    		h1{
    			font-size: 30px;
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 30%;
    			width: 100%;
    		}

    		.form-group1{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    top: 40%;
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
			    top: 55%;
    			width: 100%;
    		}

    		#password{
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
			    margin-top: 480px;
			    margin-left: 40%;
    			width: 300px;
    		}

    		p{
    			font-family: "Times New Roman", Times, serif;
			    position: absolute;
			    text-align: center;
			    margin-top: 510px;
			    margin-left: 40%;
    			width: 300px;
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

		<div>
			<h1>Welcome to Blah Blah</h1>
		</div>

		<form action='' method='post'>
			<div class="form-group1">
    			<label for="username">Username</label>
    			<input type="text" class="form-control" id="username" name='username' placeholder="Enter username">
  			</div><br>

  			<div class="form-group2">
    			<label for="password">Password</label>
    			<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
  			</div><br>
  			<br>
  			<button type="submit" name='action' value='Login' class="btn btn-primary">Login</button>
  			<br>
		</form>

		<p>Don't have an Account? <a href ="/User/register">Sign Up</a></p>
	</body>

</html>