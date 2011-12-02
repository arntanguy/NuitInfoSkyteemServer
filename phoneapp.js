// This is your app's init method. Here's an example of how to use it
function onLoad() {
    document.addEventListener("deviceready", onDR, false);
} 

function onDR(){
    // add event listener when the backbutton is pressed
    document.addEventListener("backbutton", backKeyDown, true);
}

// Handles how the application is deleted:
function backKeyDown() { 
    closeApp();
}

function closeApp() {
    navigator.app.exitApp()
}


function redirect (page) {
    window.location = page;
}
