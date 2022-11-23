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
      <link rel="stylesheet" type="text/css" href="/css/Employee/view.css" />

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
          
          <!-- Title of Page -->
          <div class='title' >
            <h1>Employees</h1> 
          </div> 

          <!-- Add Employee -->
          <a id='addButton' href='/Employee/add' class='btn btn-success'>Add Employee</a>
    
          <hr class='line'>

          <!-- Table to display the employees -->
          <table>
            <thead>
              <tr><th>USERNAME</th><th>FIRST NAME</th><th>LAST NAME</th><th>HOME ADDRESS</th><th></th></tr>
            </thead>
            
            <tbody>
              <?php
                foreach($data['employee'] as $item)
                { echo" 
                      <tr><td>$item->username</td><td>$item->first_name</td><td>$item->last_name</td><td>$item->address</td><td>
                      <button onclick='confirm($item->user_id)' class='btn btn-danger' id='deleteBut'>Delete</button></td></tr>
                    ";
                }
              ?>
            </tbody>
          </table>

          <hr class='line2'>
      </div>
  
  </body>

</html>

      <!-- Pop Ups -->
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
