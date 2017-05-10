// window.fbAsyncInit = function() {
//   FB.init({
//   appId: '419512185089420', // Your app id
//   apiKey: '5646cecf9effba7e810d28c577248570',
//   channelUrl : 'http://localhost', // Your channel url
//   xfbml: true,
//   status: true,
//   cookie: true,
// });
//   FB.Event.subscribe('auth.login', function () {
//           window.location.href = "{{ url_for('board') }}";
//  });
// };

// function fbAuthUser() {
//     FB.login(checkLoginStatus);
// }

// function checkLoginStatus(response) {
//     if(response && response.status == 'connected') {
//         document.getElementById("fb").checked = true
//     } else {
//         document.getElementById("fb").checked = false
//     }
// }

// function LogoutFacebook(){
// FB.logout(function(response) {
//   // user is now logged out
// });
// }

loadFB(facebookInit); // load FB scripts, then call facebookInit

function facebookInit() {
    buttonFB.disabled = false; // ready to connect with FB
    buttonFB.onclick = function(){
        // sometimes FB is still not available after facebookInit is called, it's safer to call it just in time
        FB.init({ appId: '419512185089420',apiKey: '5646cecf9effba7e810d28c577248570', cookie: true, xfbml: true, oauth: true });
        // FB.api( or FB.login( ..
    }
}

function loadFB(cb) { // loads FB script asynchronously
    var script = document.createElement('script');
    script.async = true;
    script.src = '//connect.facebook.net/en_US/all.js';
    script.onload = cb;
    document.head.appendChild(script);
      FB.Event.subscribe('auth.login', function () {
          window.location.href = "{{ url_for('board') }}";
 });
}

function LogoutFacebook(){
FB.logout(function(response) {
  // user is now logged out
});
}