function prompt(){
                alertify.prompt("Create Category", "Category Name", '',
                  function(input, value){ 
                          if(value == ''){
                            value = null;
                          }
                          if (input){   
                            window.location.href = '/Category/add/' + value;
                          } else{
                            alertify.error('Cancel'); 
                          }
                  }, "");
            };

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

function editName(name, category_id) {
  window.location.href = '/Category/edit/' + name + '/' + category_id;
};  