function notify(){
  $('#notificationBox').dxPopover({
    target: '#NotifyBox',
    showEvent: 'mouseenter',
    hideEvent: 'mouseleave',
    position: 'bottom',
    width: 300
  });
};
