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
    } else{
      echo '
            <a  href ="">
            </a>
          ';
    }
  ?>

  <a  href ="/Item/index">
   <img class="logo" src="/images/logo.png" alt="Logo" />
  </a>

  <a  href ="/Profile/edit">
    <i class="fa fa-user"></i>
    <span>Profile</span>
  </a>

    <div class="notifB" >
        <a  class='notif' href ="">
          <i class="fa fa-bell"></i>
          <span>Notification</span>
        </a>   
         <span class='stuff'>
                <?php
                  foreach($data['lowStock'] as $item){
                    echo"<p>$item->item_name has $item->qty left</p>
                         <hr>
                    ";

                  }
                ?>
        </span>
    </div>

      <a  href ="/User/logout">
      <span><i class="fa fa-power-off"></i></span>
      <span>Logout</span>
      </a>
</div>
</div>