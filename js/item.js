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
  var modal = $('.modal');
  var cancel = $("#cancel");

    $('.mbtn').click(function(e){
      $('#replyFrm').attr('action', '/Item/add');
        modal.show();
        $('.modal' ).addClass('open' ); 
        if ( $('.modal' ).hasClass('open' ) ) {
          $('.mainContainer' ).addClass('blur' );
        }
    });

    cancel.on('click', function(){
      modal.hide();
       $( '.modal' ).removeClass( 'open' );
       $( '.mainContainer' ).removeClass( 'blur' );
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