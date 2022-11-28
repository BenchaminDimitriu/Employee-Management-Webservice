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