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

      <script type="text/javascript">
        function editName(category_id) {
          window.location.href = '/Category/edit/' + newName + '/' + category_id;
        };  
      </script>

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
          <button id='addButton' onclick="prompt()" class='btn btn-success'>Add Category</button>
    
    
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
              ?>
            </tbody>
          </table>
          
          <hr class='line2'>
      </div>
  
  </body>

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
