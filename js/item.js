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

//To show modal, when user wants to add
function modalPop(){
  var item_idP;
  var modal = $('.modal');
  var cancel = $("#cancel");

    $('.addButton').click(function(e){
      $('#replyFrm').attr('action', '/Item/add');
        modal.show();
        $('.modal' ).addClass('open' ); 
        if ( $('.modal' ).hasClass('open' ) ) {
          $('.mainContainer' ).addClass('blur' );
        $('.lightBackground' ).addClass('blur' );
        }
    });

    // $('.editButton').click(function(e){
    //   item_idP = $(this).attr('item_id');
    //   $('#replyFrm').attr('action', '/Item/edit' + item_id);
    //     modal.show();
    //     $('.modal' ).addClass('open' ); 
    //     if ( $('.modal' ).hasClass('open' ) ) {
    //       $('.mainContainer' ).addClass('blur' );
    //       $('.lightBackground' ).addClass('blur' );
    //     }
    //     $.ajax({
    //     url: '/Item/edit' + item_id,
    //     method:"POST",
    //     data:{item_id : item_idP)});
    // });

    cancel.on('click', function(){
      modal.hide();
       $( '.modal' ).removeClass( 'open' );
       $( '.mainContainer' ).removeClass( 'blur' );
       $( '.lightBackground' ).removeClass( 'blur' );
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