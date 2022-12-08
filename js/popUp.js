//To display success messages
function popUpSuccess(title){
    alertify.set('notifier', 'position', 'top-center');
    alertify.success(title);        
};

//To display error messages
function popUpError(title){
    alertify.set('notifier', 'position', 'top-center');
    alertify.error(title);        
};