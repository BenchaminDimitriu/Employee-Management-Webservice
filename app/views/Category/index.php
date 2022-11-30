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
      <link rel="stylesheet" type="text/css" href="/css/Category/view.css" />

      <!-- Alertify -->
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

      <!-- Javascript Files -->
      <script type="text/javascript" src="/js/popUp.js"></script>
      <script type="text/javascript" src="/js/category.js"></script>

      <title>Category</title>

  </head>

  <body>
      
      <!-- Nav -->
      <?php $this->view('nav'); ?>

      <!-- Main Body -->
      <div class='lightBackground'>
          
          <!-- Title of Page -->
          <div class='title' >
            <h1>Category</h1> 
          </div>  
    
          <!-- Add Category -->
          <button id="mbtn" class="btn btn-success" style='margin-left: 18%;'>Add Category</button>
    
    
          <hr class='line'>

          <!-- Table of categories -->
          <table>
            <thead>
              <tr><th>NAME</th><th># OF ITEMS</th><th>TOTAL SELLING PRICE</th><th></th></tr>
            </thead>
      
            <tbody>
              <?php
                foreach($data['category'] as $item)
                { echo" 
                      <tr><td><input id='name' onfocusout='editName($item->category_id)' value='$item->name'></input></td><td>$item->totalS</td><td>$$item->totalP</td><td>
                      <button onclick='confirm($item->category_id)' class='btn btn-danger' id='dele teBut'>Delete</button></td></tr>
                    ";
                }

                foreach($data['emptyCat'] as $item){
                  echo" 
                      <tr><td><input id='name' onfocusout='editName($item->category_id)' value='$item->name'></input></td><td>0</td><td>$0</td><td>
                      <button onclick='confirm($item->category_id)' class='btn btn-danger' id='dele teBut'>Delete</button></td></tr>
                    ";
                }
              ?>
            </tbody>
          </table>
          
          <hr class='line2'>
      </div>
  
  </body>

  <!-- The modal -->
  <div id='modalDialog' class='modal' style="width:40%; margin-top: 7%; margin-left:30%;">
    <div class='modal-content animate-top'>
        <div class='modal-header' style="color: white; background-color: black;">
          <h5 class="modal-title">Create Category</h5>
          <button type="button" class='btn' id="close" data-dismiss="modal" aria-label="Close">
            <span style='color: white;'>x</span>
          </button>
        </div>
        <form method="post" id="replyFrm">
          <div class="modal-body" style='background-color: silver;'>
            <div class="response"></div>

            <div class="form-group" style='margin-bottom: 5%;'>
              <label for="name">Enter Name</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
          </div>

          <div class="modal-footer" style='background-color: silver;'>
              <button type="submit" name='action' id="submit" class="btn btn-success">OK</button>
              <button  class="btn btn-danger">CANCEL</button>
          </div>  
        </form>
        
    </div>
  </div>

<script>
    $(document).ready(function(){
      $('#submit').submit(function(e){
        $.ajax({
          type: "POST",
          url: "/Category/add",
          data: { name : name }
        });
      });
    });

    var modal = $('#modalDialog');
    var btn = $("#mbtn");
    var span = $("#close");

    $(document).ready(function(){
      btn.on('click', function(){
        modal.show();
      });

      span.on('click', function(){
        modal.hide();
      });
    });

  </script>

</html>
      
      <!-- PopUp Acceptances -->
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
