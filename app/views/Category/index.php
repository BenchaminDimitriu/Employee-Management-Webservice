<!DOCTYPE html>
<html>
  <head>
    <!-- Imports -->
      <?php $this->view('header'); ?>

    <!-- Js -->
      <link rel="stylesheet" type="text/css" href="/css/Category/view.css" />
    
    <title>Category</title>
  </head>

  <body onload="modalPop()">

      <div class="mainContainer">
      
      <!-- Nav -->
        <?php $this->view('nav', $data); ?>
        
        <div class='lightBackground'>
          
          <div class='title' >
            <h1>Category</h1> 
          </div>  
    
          <!-- Add Category -->
          <button class=" mbtn btn btn-success" style='margin-left: 18%;'>Add Category</button>
    
          <hr class='line'>

          <!-- Table of categories -->
          <div class="fixTableHead">
            <table>
              <thead>
                <tr>
                  <th>NAME</th>
                  <th>NUMBER OF ITEMS</th>
                  <th>TOTAL QUANTITY</th>
                  <th></th>
                </tr>
              </thead>
      
              <tbody>
                <?php
                  foreach($data['categorys'] as $item)
                  {
                    echo" 
                        <tr>
                          <td><input class='catName' value='$item->name' onfocusout='sendName($item->category_id)'></input></td>
                          <td id='totalS'>$item->totalS</td>
                          <td>$item->totalP</td>
                          <td><button onclick='confirm($item->category_id)' class='btn btn-danger' id='dele teBut'>Delete</button></td>
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
      <h1> Add a Category</h1>
      <p>
        <form method="post" id="replyFrm">
            <div class="modal-body" style='background-color: silver; color: black;'>
              <div class="response"></div>

              <div class="form-group" style='margin-bottom: 5%;'>
                <label>Name</label>
                <input type="text" class="form-control" name="name">
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