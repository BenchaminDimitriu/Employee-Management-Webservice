//To show modal, when user wants to add
function modalPop(){
  var modal = $('.modal');
  var cancel = $("#cancel");

  $('.mbtn').click(function(e){
    $('#replyFrm').attr('action', '/Employee/add');
      modal.show();
      $('.modal' ).addClass('open' ); 
      if ( $('.modal' ).hasClass('open' ) ) {
        $('.mainContainer' ).addClass('blur' );
        $('.lightBackground' ).addClass('blur' );
      }
  });

  cancel.on('click', function(){
    modal.hide();
     $( '.modal' ).removeClass( 'open' );
     $( '.mainContainer' ).removeClass( 'blur' );
       $( '.lightBackground' ).removeClass( 'blur' );
  });
};

//To show modal, when user wants to delete
function confirm(user_id) {
  alertify.confirm("Delete Employee", "Are you sure you want to delete the employee?",
    function(input) {
      if (input) {
          window.location.href = '/User/remove/' + user_id;
      } else {
          alertify.error('Cancel');
      }
  }, "  ");
};