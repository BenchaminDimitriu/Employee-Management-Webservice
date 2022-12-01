<!-- Javascript Files -->
<script type="text/javascript" src="/js/notification.js"></script>

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



<style>
  [data-tooltip]{
    position: relative;
    cursor: default;

  }

  [data-tooltip]::after {
    position: absolute;
    width: 140px;
    left: calc(50% - 70px);
    bottom: -175%;
    text-align:center;
    box-sizing: border-box;

    content:attr(data-tooltip);
    color:#ffffff;
    background:black;
    padding: 8px;
    border-radius: 10px;
    font-size: 0.9em;
    font-weight: bold;

    visibility: hidden;
    opacity: 0;
    transform: translateY(0px);
    transition: opacity 0.3s,transform 0.2s;
  }
  [data-tooltip]:hover::after {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

</style>
  <span data-tooltip="Example">Notification</span>

<!--         <a href="">Notification
    <span><i class="fa fa-bell"></i></span>

    <span class="tooltiptext">Tooltip text</span>
  </a>
 -->

      <!-- <a class="tooltip">Notification</a> -->
    <!-- <span class="tooltip">Notification</span> -->

  <a  href ="/User/logout">
    <span><i class="fa fa-power-off"></i></span>
    <span>Logout</span>
  </a>
</div> 