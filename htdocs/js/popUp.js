function popUpSuccess(title){
    alertify.set('notifier', 'position', 'top-center');
    alertify.success(title);        
};

function popUpError(title){
    alertify.set('notifier', 'position', 'top-center');
    alertify.error(title);        
};