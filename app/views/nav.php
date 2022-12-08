<!-- Nav Bar -->
<div class='navbar'> 
  <?php 
    if($_SESSION['role'] == 'admin'){
      echo '
      <a  href ="/Item/index">
        <i class="fa-solid fa-boxes-stacked"></i>
        <span>Item</span>
      </a>

      <a  href ="/Category/index">
        <span><i class="fa-solid fa-bookmark"></i></span>
        <span>Category</span>
      </a>
      
      <a  href ="/Employee/index">
        <span><i class="fa-solid fa-users"></i></span>
        <span>Employees</span>
      </a>

      <a  id="imageLogoAd" href ="/Item/index">
        <img class="logo" src="/images/logo.png" alt="Logo" />
      </a>

      <a  href ="/Profile/edit">
        <i class="fa fa-user"></i>
        <span>Profile</span>
      </a>

      <div class="notifB" >
        <p  class="notif" href ="">
          <i class="fa fa-bell"></i>
          <span>Notification</span>
        </p>

        <span class="stuff">';

        foreach($data['lowStock'] as $item){
          echo"<p>$item->item_name has $item->qty left</p>
               <hr>
          ";

        }
    
        echo'              
          </span>
        </div>

        <a  href ="/User/logout">
          <span><i class="fa fa-power-off"></i></span>
          <span>Logout</span>
        </a>

        <a>
          <span id="username">Welcome ' . $_SESSION["username"] . '</span>
        </a>  
      </div>';
    } else{
      
      echo '
      <a  href ="/Item/index">
        <i class="fa-solid fa-boxes-stacked"></i>
        <span>Item</span>
      </a>

      <a  href ="/Category/index">
        <span><i class="fa-solid fa-bookmark"></i></span>
        <span>Category</span>
      </a>

      <a  href ="/Profile/edit">
        <i class="fa fa-user"></i>
        <span>Profile</span>
      </a>
    
      <a  id="imageLogoEmp" href ="/Item/index">
        <img class="logo" src="/images/logo.png" alt="Logo" />
      </a>
      
      <div class="notifB" >
        <p  class="notif" href ="">
          <i class="fa fa-bell"></i>
          <span>Notification</span>
        </p>   
        
        <span class="stuff">';

        foreach($data['lowStock'] as $item){
          echo"<p>$item->item_name has $item->qty left</p>
               <hr>
          ";

        }
    
        echo'              
          </span>
        </div>

        <a  href ="/User/logout">
          <span><i class="fa fa-power-off"></i></span>
          <span>Logout</span>
        </a>

        <a>
          <span id="username">Welcome  ' . $_SESSION["username"] .'</span>
        </a>  
      </div>';
    }?>
</div>