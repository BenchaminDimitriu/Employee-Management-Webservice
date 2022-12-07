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
      
      <div class='lightBackground1'>
      
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

        <div class='titleItem'>
          <h1>Items</h1> 
        </div> 

        <!-- Add Item -->
        <button class="addButton btn btn-success">Add Item</button>
      
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
                        <td><a href='/Item/edit/$item->item_id' class='editButton btn btn-primary' item_id='". $item->item_id . "'>Edit</a></td>
                        <td><button onclick='confirm($item->item_id)' class='btn btn-danger' id='deleteBut'>Delete</button></td>
                      </tr>
                    ";
                    $totalP += $item->Pprice * $item->qty;
                    $totalS += $item->Sprice;
                }
              ?>
            </tbody>
          </table>
        </div>

        <!-- Totals -->
        <div class='total'>
          <span>Total inventory</span>
          <span style='font-weight:bold; margin-left: 20%;'>$<?= $totalP ?></span>
        </div>
        <br>
      </div>

       <div class='lightBackground2'>
      
        <div class='titleSelling' >
          <h1>Selling Summary</h1> 
        </div> 

        <hr class='line'>

        <!-- Table to display the employees -->
        <div class="fixTableHead">
          <table>
            <thead>
              <tr>
                <th>DATE</th>
                <th>PRODUCT NAME</th>
                <th>MODIFICATION</th>
                <th>DISCOUNT</th>
                <th>SOLD PRICE</th>
                <th>PURCHASE PRICE</th>
                <th>USER</th>
              </tr>
            </thead>

            <tbody>
              
              <?php
                $totalDiscount = 0;
                $totalProfit = 0;
                foreach($data['summary'] as $item)
                { 
                  echo" 
                      <tr>
                        <td>$item->date</td>
                        <td id='test'>$item->item_name</td>";

                  if($item->discount != null){
                    echo"<td style='color:red;'>$item->amount</td>
                         <td style='color:red;'>$item->discount%</td>";

                    $amount = preg_split('/-/', $item->amount);
                    $totalDiscount += ((int) $amount[1] * $item->originalSP) - ((int) $amount[1] * $item->sellingP);
                  
                  } else if($item->discount == "0"){
                    echo"<td style='color:red;'>$item->amount</td>
                         <td></td>";
                  
                  } else {
                    echo"
                          <td style='color:green;'>$item->amount</td>
                          <td></td>";
                  }

                  if($item->sellingP != null){
                    echo"
                        <td>$$item->sellingP</td>";
                  } else{
                    echo "<td></td>";
                  }
                    echo"
                        <td>$$item->purchaseP</td>
                        <td>$item->user</td>
                      </tr>
                  ";

                  if($item->discount == "0" || $item->discount != null){
                    $amount = preg_split('/-/', $item->amount);
                    $totalProfit += ($item->sellingP - $item->purchaseP) * (int) $amount[1];
                  }
                 
                }
              ?>
            </tbody>
          </table>
        </div>

        <!-- Totals -->
        <div class='total'>
          <span>Total discount</span>
          <span style='font-weight:bold; margin-left: 47.5%;'><?= "$" . $totalDiscount?></span>
        </div>

        <div class='profit'>
        <span>Total profit</span>
        <span style='font-weight:bold; color: green; margin-left: 48%;'>$<?= $totalProfit ?></span>
        </div>
      </div>
    </div>
  </body>

<!-- Modal for Add -->
  <div class="modal">
    <div class="content" style="background-color: black; color: white;">
      <h1> Add an Item</h1>
      <p>
        <form method="post" id="replyFrm">
            <div class="modal-body" style="background-color: silver; color: black;">
              <div class="response"></div>

              <div class="form-group" style="margin-bottom: 5%;">
                <label>Name</label>
                <input type="text" class="form-control" name="name">
              </div>

              <div class="form-group" style="margin-bottom: 5%;">
                <label>Quantity</label>
                <input type="number" min="0" class="form-control" name="qty">
              </div>

              <div class="form-group" style="margin-bottom: 5%;">
                <label>Purchase Price</label>
                <input type="number" min="0" step="0.01" class="form-control" name="Pprice">
              </div>

              <div class="form-group" style="margin-bottom: 5%;">
                <label>Selling price</label>
                <input type="number" min="0" step="0.01" class="form-control" name="Sprice">
              </div>

              <div style="margin-bottom: 5%;">
                <label>Category:
                  <select class='form-select' name='category' id='category'>
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