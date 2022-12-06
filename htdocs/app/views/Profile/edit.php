<!DOCTYPE html>
<html>
  <head>
       <!-- Imports -->
      <?php $this->view('header'); ?>

      <!-- Css -->
        <link rel="stylesheet" type="text/css" href="/css/Profile/view.css" />
      
      <!-- Javascript Files -->
      <script type="text/javascript" src="/js/popUp.js"></script>

      <title>Profile</title>
  </head>
  
  <body>
      <!-- Nav -->
      <?php $this->view('nav', $data); ?>

      <!-- Main Body -->
      <div class='lightBackground'>
        
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
                <input type="text" name='firstname' class="form-control" style='max-width: 60%;  margin-bottom: 5%; ' value='<?= $data['profile']->first_name ?>'/>
                  
                <label>Last Name</label>
                <input type="text" name='lastname' class="form-control" style='max-width:60%;  margin-bottom: 5%;'  value='<?= $data['profile']->last_name ?>'/>

                <label>Home Address</label>
                <input type="text" id="password" name='address' class="form-control" style='max-width: 60%;'  value='<?= $data['profile']->address ?>'/>
              </div>

              <div class='float-child'>
                <p style="margin-bottom: 10px;">Change Account:</p>
                <label>Username</label>
                <input type="text"  class="form-control" style='max-width: 60%; margin-bottom: 4%;' value='<?= $data['profile']->username ?>' name='username'/>

                <label>New Password</label>
                <input type="password"  class="form-control" style='max-width: 60%; margin-bottom: 5%;' id="password" name='password'/>

                <label>Confirm New Password</label>
                <input type="password" id="password" class="form-control" style='max-width: 60%;' name='password_confirm'/>
              </div>
            </div>
            
            <button type="submit" name='action' class='btn btn-success'  style='margin-left: 43%;' value='Login'>Save Changes</button>
        </form> 
      </div>
  </body>
</html>   