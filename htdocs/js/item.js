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