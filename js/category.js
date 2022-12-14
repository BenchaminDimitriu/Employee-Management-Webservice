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
function confirm(category_id, event) {
  event.preventDefault();
  alertify.confirm("Delete Category", "Are you sure you want to delete?",
    function(input) {
      if (input) {
        window.location.href = '/Category/remove/' + category_id;
      } else {
        alertify.error('Cancel');
      }
    }, " ");
}

//Used to edit the Category
function editCat(category_id){
  var form = document.getElementById('catEdit');
  form.action += '/' + category_id;
  form.method = 'post';
  form.submit();
};