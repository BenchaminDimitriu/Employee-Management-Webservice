<!DOCTYPE html>
<html>
  <head>
    <!-- Imports -->
      <?php $this->view('header'); ?>

    <!-- Js -->
      <script type="text/javascript" src="/js/employee.js"></script>
      
    <title>Employee</title>
  </head>

  <body onload="modalPop()">

    <div class="mainContainer">
    
      <!-- Nav -->
        <?php $this->view('nav', $data); ?>

        <div class='lightBackground'>  
          
          <div class='title' >
            <h1>Employees</h1> 
          </div> 

          <!-- Add Employee -->
          <button class=" mbtn btn btn-success" style='margin-left: 18%;'>Add employee</button>
      
          <hr>

            <!-- Table of employees -->
            <div class="fixTableHead">
              <table>
                <thead>
                  <tr>
                    <th>USERNAME</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>HOME ADDRESS</th>
                    <th></th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php
                    foreach($data['employee'] as $item)
                    { echo" 
                          <tr>
                            <td>$item->username</td>
                            <td>$item->first_name</td>
                            <td>$item->last_name</td>
                            <td>$item->address</td>
                            <td><button onclick='confirm($item->user_id)' class='btn btn-danger' id='deleteBut'>Delete</button></td>
                          </tr>
                        ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
        </div>
      </div>
  </body>
<!-- Modal -->
  <div class="modal">
    <div class="content" style="background-color: black; color: white;">
      <h1> Add an Employee</h1>
      <p>
        <form method="post" id="replyFrm">
            <div class="modal-body" style='background-color: silver; color: black;'>
              <div class="response"></div>

              <div class="form-group" style='margin-bottom: 5%;'>
                <label for="username">Enter Username</label>
                <input type="text" class="form-control" id="username" name="username">
              </div>

              <div class="form-group">
                <label for="password">Enter password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
              <div class="modal-footer" style='background-color: silver;'>
                <button type="submit" name='action' id="submit" class="btn btn-success">OK</button>
                <p id='cancel' class="btn btn-danger">CANCEL</p>
            </div>  
          </form>
      </p>
    </div>
  </div>
</html>