//Filter by category
function categoryChoose(){
  const url = window.location.href;
  const myArray = url.split("/");
  const lastVal = myArray.pop();
  const select = document.getElementById('category');
  
  if(lastVal == "None" || lastVal =="" || isNaN(lastVal)){
  } else{
    select.value = lastVal;
  }
}

//To show modal, when user wants to add or edit
function modalPop(){
  var modalAdd = $('#modalAdd');
  var modalEdit = $('#modalEdit');
  var cancel = $(".cancel");
  var item_id;

    $('.addButton').click(function(e){
      $('#addFrm').attr('action', '/Item/add');
        modalAdd.show();
        $('#modalAdd' ).addClass('open' ); 
        if ( $('#modalAdd' ).hasClass('open' ) ) {
          $('.mainContainer' ).addClass('blur' );
          $('.lightBackground1' ).addClass('blur' );
          $('.lightBackground2' ).addClass('blur' );
        }
    });

    $('.editBtn').click(function(){
      item_id = $(this).attr('item_id');
      $('#editFrm').attr('action', '/Item/edit/' + item_id);
      var item = JSON.parse(this.getAttribute('data-json'));

      document.getElementById('itemName').value = item.item_name;
      document.getElementById('purchaseP').value = item.Pprice;
      document.getElementById('sellingP').value = item.Sprice;
      
      var itemCat;
      if(item.category_id != null){
         itemCat = item.category_id;
      } else{
        itemCat = 'None';
      }
      $("#category option[value='" + itemCat + "']").prop("selected", true);

      $('#modalEdit').show();
      $('#modalEdit' ).addClass('open' ); 
        if ( $('#modalEdit' ).hasClass('open' ) ) {
          $('.mainContainer' ).addClass('blur' );
          $('.lightBackground1' ).addClass('blur' );
          $('.lightBackground2' ).addClass('blur' );
        }
    });

    cancel.on('click', function(){
      modalAdd.hide();
      modalEdit.hide();
       $( '#modalAdd' ).removeClass( 'open' );
       $( '#modalEdit' ).removeClass( 'open' );
       $( '.mainContainer' ).removeClass( 'blur' );
       $( '.lightBackground1' ).removeClass( 'blur' );
       $( '.lightBackground2' ).removeClass( 'blur' );
    });
};

//Send new category to filter by
function changeURL(category_name){ 
  location.href = "/Item/filterCategory/"+ category_name.value;  
}

//To show modal, when user wants to delete
function confirm(item_id) {
  alertify.confirm("Delete Item", "Are you sure you want to delete the item?",
    function(input) {
      if (input) {
          window.location.href = '/Item/remove/' + item_id;
      } else {
          alertify.error('Cancel');
      }
  }, "  ");
};