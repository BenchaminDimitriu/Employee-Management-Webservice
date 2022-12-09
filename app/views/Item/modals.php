<!-- Modal for Add -->
  <div id="modalAdd" class='modal'>
    <div class="content" style="background-color: black; color: white;">
      <h1> Add an Item</h1>
        <form method="post" id="addFrm">
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
                <p class="cancel btn btn-danger">CANCEL</p>
            </div>  
          </form>
    </div>
  </div>

<!-- Modal for Add -->
  <div id="modalEdit" class='modal'>
    <div class="content" style="background-color: black; color: white;">
      <h1> Edit an Item</h1>
        <form method="post" id="editFrm">
            <div class="modal-body" style="background-color: silver; color: black;">
              <div class="response"></div>

              <div class="form-group" style="margin-bottom: 5%;">
                <label>Name</label>
                <input type="text" class="form-control" id='itemName' name="name">
              </div>

              <div class="form-group" style="margin-bottom: 5%;">
                <label>Purchase Price</label>
                <input type="number" min="0" step="0.01" class="form-control" id="purchaseP" name="purchaseP"/>
              </div>

              <div class="form-group" style="margin-bottom: 5%;">
                <label>Selling price</label>
                <input type="number" min="0" step="0.01" class="form-control" id="sellingP" name="sellingP"/>
              </div>
              
              <div class="form-group" style="margin-bottom: 5%;">
                <label>Quantity sold:</label>
                  <input type="number" class="form-control" min="1" name="qtyS"/>
              </div>
              
              <div class="form-group" style="margin-bottom: 5%;">
                <label>Quantity purchased:</label>
                <input type="number" class="form-control" min="1" name="qtyP">
              </div>
              
              <div class="form-group" style="margin-bottom: 5%;">
                  <label>Discount (if applicable)</label>
                  <input type="number" min="0" class="form-control" name="discount">
              </div>

              <div style="margin-bottom: 5%;">
                <label>Category:
                  <select class='form-select' name='category' id='category'>
                    <option>None</option>
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
                <p class="cancel btn btn-danger">CANCEL</p>
            </div>  
          </form>
    </div>
  </div>

