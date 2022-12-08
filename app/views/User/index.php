<html>
  <head>
    <!-- Imports -->
      <?php $this->view('header'); ?>

    <!-- Css -->
      <link rel="stylesheet" type="text/css" href="/css/Login/login.css" />
      <link rel="stylesheet" type="text/css" href="/css/Login/loginStyleGuide.css" />
    
    <title>Login</title>
  </head>

  <body>
    <div class="container-center-horizontal">
      <div class="frame-525 screen">
        <img class="image" src="/images/Login/titleImage.png" alt="Image" />
        <div class="flex-col">
          <div class="flex-row">
            <img class="logo" src="/images/Login/logo.png" alt="Logo" />
            <div class="flex-col-1">
              <h1 class="titles valign-text-middle">
                <span><span>Inventory</span> 
              </h1>
              <div class="title-container">
                <div class="subtitle valign-text-middle">
                <img class="title-line" src="/images/Login/titleLine.png" alt="Title line" />
                  <p>Healing Place</p>
                </div>
              </div>
            </div>
          </div>
          <div class="login-info">                                                                             
            <div class="employee-container">
              <form action='' method='post'>
                <div class="employee-username valign-text-middle roundedmplus1c-regular-normal-black-16px">
                  <span><p class="roundedmplus1c-regular-normal-black-16px">Username</p></span>
                </div>
                <input type="text" id="usernames" name='username'/>
              </div>
              <img class="d-line" src="/images/Login/line.png" alt="EmployeeIdLine" />
              <div class="password-container">
                <div class="password valign-text-middle roundedmplus1c-regular-normal-black-16px">
                  <span><span class="roundedmplus1c-regular-normal-black-16px">Password</span> </span>
                </div>
                <input type="password" id="password" name='password'/>
              </div>
              <img class="d-line" src="/images/Login/line.png" alt="PasswordLine" />
              
              <button type="submit" name='action' class='loginButton' value='Login'>Login</button>
            </form>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>