FB.init({
  appId: '419512185089420', // Your app id
  apiKey: '5646cecf9effba7e810d28c577248570',
  channelUrl : 'http://localhost', // Your channel url
  xfbml: true,
  status: true,
  cookie: true,
});

function fbAuthUser() {
    FB.login(checkLoginStatus);
}

function checkLoginStatus(response) {
    if(response && response.status == 'connected') {
        document.getElementById("fb").checked = true
    } else {
        document.getElementById("fb").checked = false
    }
}

FB.Event.subscribe('auth.login', function () {
          window.location.href = "{{ url_for('board') }}";
 });

function LogoutFacebook(){
FB.logout(function(response) {
  // user is now logged out
});
}