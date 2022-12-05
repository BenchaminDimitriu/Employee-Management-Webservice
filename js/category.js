//To show modal, when user wants to add
function modalPop(){
  var modal = $('.modal');
  var cancel = $("#cancel");

  $('.mbtn').click(function(e){
      $('#replyFrm').attr('action', '/Category/add');
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

//To show modal, when user wants to delete
function confirm(category_id) {
  alertify.confirm("Delete Category", "Are you sure you want to delete?",
    function(input) {
      if (input) {
        window.location.href = '/Category/remove/' + category_id;
      } else {
        alertify.error('Cancel');
      }
    }, " ");
};

//Used to edit the category
function sendName(category_id){
  newName = $('.catName').val();
  $.ajax({
    type: "POST",
    url: "/Category/edit/" + category_id,
    data: { name : newName }
  })
};