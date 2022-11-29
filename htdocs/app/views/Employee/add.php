<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />

      <!-- Jquery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <!--Boot Strap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

      <!-- Font Awesome -->
      <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

      <!-- Style Sheets -->
      <link rel="stylesheet" type="text/css" href="/css/nav.css" />
      <link rel="stylesheet" type="text/css" href="/css/Employee/add.css" />

      <!-- Alertify -->
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

      <!-- Javascript Files -->
      <script type="text/javascript" src="/js/popUp.js"></script>
      <script type="text/javascript" src="/js/employee.js"></script>

      <title>Employee</title>

  </head>
  
  <body>

      <!-- Nav -->
      <?php $this->view('nav'); ?>

      <!-- Main Body -->
      <div class='lightBackground'>
        
        <!-- Title of page -->
        <div class='title'>
          <h1>Add Employee</h1> 
        </div>

        <hr>

        <!-- Form that allows admin to create employee -->
        <form action='' method='post'>
              <label>Username</label>
                <input type="text" id="username" name='username'/>
              
              <br><label>Password</label>
                <input type="password" id="password" name='password'/>
                        
              <br><button type="submit" name='action' class='btn btn-success  ' value='Login'>Create Employee</button>
        </form>

        <!-- Back Button -->
        <a id="backBtn" class='btn btn-danger' href='/Employee/index'>Cancel</a>
  
  </body>
</html>
      
      <!-- Pop up -->
      <?php
        if(isset($_GET['error'])){
          echo"<script>popUpError('$_GET[error]');</script>";
        }
      ?>
