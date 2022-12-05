<!DOCTYPE html>
<html>
  <head>
    <!-- Imports -->
      <?php $this->view('header'); ?>
  
    <!-- Css -->
      <link rel="stylesheet" type="text/css" href="/css/Item/view.css" />

    <!-- Js -->
      <script type="text/javascript" src="/js/item.js"></script>

    <title>Item</title>
  </head>

  <body onload="modalPop(), categoryChoose()">
    <div class='mainContainer'>
        
      <!-- Nav -->
      <?php $this->view('nav', $data); ?>
      
      <div class='lightBackground'>
      
        <!-- Filter -->
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

        <div class='titleItem' >
          <h1>Items</h1> 
        </div> 

        <!-- Add Item -->
        <button class=" mbtn btn btn-success">Add Item</button>
      
        <hr class='line'>

        <!-- Table to display the employees -->
        <div class="fixTableHead">
          <table>
            <thead>
              <tr>
                <th>NAME</th>
                <th>QUANTITY</th>
                <th>PURCHASE PRICE</th>
                <th>SELLING PRICE</th>
                <th>CATEGORY</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
        
              <?php
                $totalP = 0;
                $totalS = 0;
                foreach($data['item'] as $item)
                { echo" 
                      <tr>
                        <td>$item->item_name</td>
                        <td id='test'>$item->qty</td>
                        <td>$$item->Pprice</td>
                        <td>$$item->Sprice</td>
                        <td>$item->name</td>
                        <td><button onclick='confirm($item->item_id)' class='btn btn-danger' id='deleteBut'>Delete</button></td>
                      </tr>
                    ";
                    $totalP += $item->Pprice;
                    $totalS += $item->Sprice;
                }
              ?>
            </tbody>
          </table>
        </div>

        <!-- Totals -->
        <div class='total'>
          <span>Total</span>
          <span style='margin-left: 49%;'>$<?= $totalP ?></span>
          <span style='margin-left: 25.5%;'>$<?= $totalS ?></span>
        </div>
        
        <br>

        <div class='profit'>
        <span>Profit</span>
        <span style='color: green; margin-left: 76%;'>$<?= $totalS-$totalP ?></span>
        </div>
      </div>
    </div>
  </body>

<!-- Modal -->
  <div class="modal">
    <div class="content" style="background-color: black; color: white;">
      <h1> Add an Item</h1>
      <p>
        <form method="post" id="replyFrm">
            <div class="modal-body" style='background-color: silver; color: black;'>
              <div class="response"></div>

              <div class="form-group" style='margin-bottom: 5%;'>
                <label>Name</label>
                <input type="text" class="form-control" name="name">
              </div>

              <div class="form-group" style='margin-bottom: 5%;'>
                <label>Quantity</label>
                <input type="number" min="0" class="form-control" name="qty">
              </div>

              <div class="form-group" style='margin-bottom: 5%;'>
                <label>Purchase Price</label>
                <input type="number" min="0" step='0.01' class="form-control" name="Pprice">
              </div>

              <div class="form-group" style='margin-bottom: 5%;'>
                <label>Selling price</label>
                <input type="number" min="0" step='0.01' class="form-control" name="Sprice">
              </div>

              <div class="form-group" style='margin-bottom: 5%;'>
                <label>Category</label>
                <input type="text" class="form-control" name="category">
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