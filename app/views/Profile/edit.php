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
      <link rel="stylesheet" type="text/css" href="/css/Profile/view.css" />

      <!-- Alertify -->
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

      <!-- Javascript Files -->
      <script type="text/javascript" src="/js/popUp.js"></script>

      <title>Profile</title>

  </head>
  
  <body>
      <!-- Nav -->
      <?php $this->view('nav'); ?>

      <!-- Main Body -->
      <div class='lightBackground'>
        
        <!-- Title of Page -->
        <div class='title'>
          <h1>Edit Profile</h1> 
        </div>

        <hr>

        <!-- Form to allow user to edit profile-->
        <form action='' method='post' style='margin-left: 3%;'>
            <div id="main" class='float-container'>
              <div class='float-child'>
                <p>Change Profile:</p>

                <label>First Name</label>
                <input type="text" name='firstname' class="form-control" style='max-width: 60%;  margin-bottom: 5%; ' value='<?= $data->first_name ?>'/>
                  
                <label>Last Name</label>
                <input type="text" name='lastname' class="form-control" style='max-width:60%;  margin-bottom: 5%;'  value='<?= $data->last_name ?>'/>

                <label>Home Address</label>
                <input type="text" id="password" name='address' class="form-control" style='max-width: 60%;'  value='<?= $data->address ?>'/>
              </div>

              <div class='float-child'>
                <p>Change Password:</p>
                <label>New Password</label>
                <input type="password"  class="form-control" style='max-width: 60%; margin-bottom: 5%;' id="password" name='password'/>

                <label>Confirm New Password</label>
                <input type="password" id="password" class="form-control" style='max-width: 60%;' name='password_confirm'/>
              </div>
            </div>
            
            <button type="submit" name='action' class='btn btn-success'  style='margin-left: 43%;' value='Login'>Save Changes</button>
        </form> 
  
  </body>
</html>
      
      <!-- PopUps -->
      <?php
        if(isset($_GET['message'])){
          echo"<script>popUpSuccess('$_GET[message]');</script>";
        }
      ?>

      <?php
        if(isset($_GET['error'])){
          echo"<script>popUpError('$_GET[error]');</script>";
        }
      ?> 
        