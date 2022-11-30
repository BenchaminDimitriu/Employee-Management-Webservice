<!-- Nav Bar -->
<div class='navbar'> 
  <a  href ="/Item/index">
    <i class="fa-solid fa-boxes-stacked"></i>
    <span>Item</span>
    </a>

  <a  href ="/Category/index">
    <span><i class="fa-solid fa-bookmark"></i></span>
    <span>Category</span>
  </a>

  <?php 
    if($_SESSION['role'] == 'admin'){
      echo '
            <a  href ="/Employee/index">
                <span><i class="fa-solid fa-users"></i></span>
                <span>Employees</span>
            </a>
          ';
    }
  ?>

  <img class="logo" src="/images/logo.png" alt="Logo" />

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