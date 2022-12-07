<!DOCTYPE html>
<html>
  <head>
    <!-- Imports -->
      <?php $this->view('header'); ?>
  
    <!-- Css -->
      <link rel="stylesheet" type="text/css" href="/css/Item/view.css" />
<script type="text/javascript">
  $(document).ready(
          function(){
            var categoryOfProduct = "<?= $data['item']->category_id ?>";
            var category = document.getElementById('category');
            
            if(categoryOfProduct == null){
              category.value = 'None';
            } else{
              category.value = categoryOfProduct;
            } 
          }
        );
</script>
    <!-- Js -->
      <script type="text/javascript" src="/js/item.js"></script>

    <title>Item</title>
  </head>

  <body>
      
      <form action='' method="post" id="replyFrm">
            <div class="form-group" style="margin-bottom: 5%;">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value='<?= $data['item']->item_name ?>'/>
              </div>

              <div class="form-group" style="margin-bottom: 5%;">
                <label>Purchase Price</label>
                <input type="number" min="0" step="0.01" class="form-control" name="purchaseP" value='<?= $data['item']->Pprice ?>'/>
              </div>

              <div class="form-group" style="margin-bottom: 5%;">
                <label>Selling price</label>
                <input type="number" min="0" step="0.01" class="form-control" name="sellingP" value='<?= $data['item']->Sprice ?>'/>
              </div>
                <label>Quantity sold:</label>
                <input name="qtyS"/>

                <label>Quantity purchased:</label>
                <input name="qtyP">
                
                <?php echo'
                    <div class="form-group" style="margin-bottom: 5%;">
                      <label>Discount (if applicable)</label>
                      <input type="number" min="0" class="form-control" name="discount">
                    </div>
                  ';
                ?>

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
                <button type="submit" name='action' id="submit" class="btn btn-success">OK</button>
          </form>
</html>