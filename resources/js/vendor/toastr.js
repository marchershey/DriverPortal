window.toastr = require("toastr");

toastr.options = {
    // html stuff
    target: "body",
    containerId: "toast-container",
    positionClass: "toast-position",
    toastClass: "toast",
    messageClass: "toast-message",
    titleClass: "toast-title",
    progressClass: "toast-progress",
    closeClass: "toast-close-button",
    iconClass: "toast-info", // default class
    iconClasses: {
        error: "toast-error",
        info: "toast-info",
        success: "toast-success",
        warning: "toast-warning"
    },
    closeHtml:
        '<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>',

    // general options
    tapToDismiss: true,
    closeOnHover: true,
    newestOnTop: true,
    preventDuplicates: true,
    progressBar: true,
    rtl: false,

    // advanced options
    escapeHtml: false,
    debug: false,

    // default timing durations
    showDuration: 800, // how long should fade in take
    timeOut: 4500, // how long it should be visible
    extendedTimeOut: 2000, // how long after hover should it stay visible
    hideDuration: 250, // how long should fade out take
    closeDuration: false,

    // visibility effects
    showEasing: "swing", //swing and linear are built into jQuery
    showMethod: "fadeIn", //fadeIn, slideDown, and show are built into jQuery
    hideEasing: "swing",
    hideMethod: "fadeOut",
    closeEasing: false,
    closeMethod: false,

    // optional methods
    onShown: undefined,
    onHidden: undefined
};

window.addEventListener("alert", event => {
    var type = event.detail.type;
    var title = event.detail.title;
    var text = event.detail.text;
    var time = event.detail.time;

    console.log(time);

    if (type == "info" || type == null) {
        toastr.info(text, title, { timeOut: time });
    } else if (type == "success") {
        toastr.success(text, title, { timeOut: time });
    } else if (type == "warning") {
        toastr.warning(text, title, { timeOut: time });
    } else if (type == "error") {
        toastr.error(text, title, { timeOut: time });
    }
});
