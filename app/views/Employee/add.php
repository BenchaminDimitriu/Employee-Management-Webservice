<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
<!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <meta name="viewport" content="width=2965, maximum-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="/css/nav.css" />
    <link rel="stylesheet" type="text/css" href="/css/Employee/add.css" />

    <script type="text/javascript">
            
            function popUp(title){
                 alertify.set('notifier', 'position', 'top-center');
                 alertify.error(title);        
              };
    </script>

    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  </head>
  
  <body>

    <div class='navbar'> 
          <a  href ="/Item/indexAdmin">
              <i class="fa-solid fa-boxes-stacked"></i>
              <span>Items</span>
          </a>

          <a  href ="/Category/index">
              <span><i class="fa-solid fa-bookmark"></i></span>
              <span>Category</span>
          </a>

          <a  href ="/Employee/index">
              <span><i class="fa-solid fa-users"></i></span>
              <span>Employees</span>
          </a>

        <img class="logo" src="/images/Item/logo-1@2x.png" alt="Logo" />

          <a  href ="/Profile/edit">
              <i class="fa fa-user"></i>
              <span>Profile</span>
          </a>
          
          <a  href ="">
            <span><i class="fa fa-bell"></i></span>
            <span>Notification</span>
          </a>

          <a  href ="/User/logout">
              <span><i class="fa fa-power-off"></i></span>
              <span>Logout</span>
          </a>
        </div> 

  <div class='lightBackground'>
    <div class='title'>
      <h1>Add Employee</h1> 
    </div>
    <hr>
        <form action='' method='post'>
              <label>Username</label>
                <input type="text" id="username" name='username'/>
              
              <br><label>Password</label>
                <input type="password" id="password" name='password'/>
                        
              <br><button type="submit" name='action' class='btn btn-success  ' value='Login'>Create Employee</button>
        </form>
      <a id="backBtn" class='btn btn-danger' href='/Employee/index'>Cancel</a>
  </body>
</html>
      <?php
        if(isset($_GET['error'])){
          echo"<script>popUp('$_GET[error]');</script>";
        }
      ?>
