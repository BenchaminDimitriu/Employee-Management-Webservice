<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>


      <!-- Jquery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <!--Boot Strap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

      <!-- Font Awesome -->
      <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

      <!-- Style Sheets -->
      <link rel="stylesheet" type="text/css" href="/css/nav.css" />
      <link rel="stylesheet" type="text/css" href="/css/Item/view.css" />

      <!-- Alertify -->
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

      <!-- Javascript Files -->
      <script type="text/javascript" src="/js/popUp.js"></script>
      <script type="text/javascript" src="/js/item.js"></script>

      <!-- Set the name of category -->
            <script type="text/javascript">
          $(document).ready(
            function(){
              const url = window.location.href;
              const myArray = url.split("/");
              const lastVal = myArray.pop();
              const select = document.getElementById('category');
              
                if(lastVal == "None" || lastVal ==""){
                } else{
                  select.value = lastVal;
                }
              }
            );
        </script>
      <!-- Get the name of the filtered category -->  
            <script type="text/javascript">
              function changeURL(category_name){ 
                location.href = "/Item/filterCategory/"+ category_name.value;  
              }
            </script>

</head>


<body>
      <!-- Nav -->
      <?php $this->view('nav'); ?>



<!-- Main Body -->
      <div class='lightBackground'>
          
          <div id='filters'>
            <label> Filter by Category:
              <select class='form-select' name='category' id='category' onchange='changeURL(this)'>
                <option selected>None</option>
                <?php
                  foreach ($data['categorys'] as $category){
                    echo "  
                        <option id='category' value='$category->category_id'>$category->name</option>";

                }
                ?>
              </select>
            </label><br>
          </div>

          <!-- Title of Page -->
          <div class='title' >
            <h1>Items</h1> 
          </div> 

          <!-- Add Employee -->
          <button id="mbtn" class="btn btn-success">Add Item</button>
    
          <hr class='line'>

          <!-- Table to display the employees -->
          <table>
            <thead>
              <tr><th id='name'>NAME</th><th>QUANTITY</th><th>PURCHASE PRICE</th><th>SELLING PRICE</th><th>CATEGORY</th><th></th></tr>
            </thead>
            
            <tbody>
              <?php
                $totalP = 0;
                $totalS = 0;
                foreach($data['item'] as $item)
                { echo" 
                      <tr><td>$item->item_name</td><td id='test'>$item->qty</td><td>$$item->Pprice</td><td>$$item->Sprice</td><td>$item->name</td><td>
                      <button onclick='confirm($item->item_id)' class='btn btn-danger' id='deleteBut'>Delete</button></td></tr>
                    ";
                    $totalP += $item->Pprice;
                    $totalS += $item->Sprice;
                }
              ?>
            </tbody>
          </table>

          <hr class='line2'>
          <div class= total>
            <p style='display: inline-block; margin-left: 10%;'>Total Cost</p>
            <p style='display: inline-block; margin-left: 23%;'>$ <?= $totalP ?></p>
            <p style='display: inline-block; margin-left: 13%;'>$ <?= $totalS ?></p>
          </div>
      </div>
</body>

<!-- The modal -->
  <div id='modalDialog' class='modal' style="width:40%; margin-top: 7%; margin-left:30%;">
    <div class='modal-content animate-top'>
        <div class='modal-header' style="color: white; background-color: black;">
          <h5 class="modal-title">Create Item</h5>
          <button type="button" class='btn' id="close" data-dismiss="modal" aria-label="Close">
            <span style='color: white;'>x</span>
          </button>
        </div>
        <form method="post" id="replyFrm">
          <div class="modal-body" style='background-color: silver;'>
            <div class="response"></div>

            <div class="form-group" style='margin-bottom: 5%;'>
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group" style='margin-bottom: 5%;'>
              <label for="name">Quantity</label>
              <input type="number" class="form-control" id="name" name="name">
            </div>

            <div class="form-group" style='margin-bottom: 5%;'>
              <label for="name">Purchase Price</label>
              <input type="number" class="form-control" id="name" name="name">
            </div>

            <div class="form-group" style='margin-bottom: 5%;'>
              <label for="name">Selling price</label>
              <input type="number" class="form-control" id="name" name="name">
            </div>

            <div class="form-group" style='margin-bottom: 5%;'>
              <label for="name">Category</label>
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

    $('body').bind('click', function(e){
      if($(e.target).hasClass("modal")){
        modal.hide();
      }
    });

  </script>
</html>