
  FB.init({
  appId: '419512185089420', // Your app id
  apiKey: '5646cecf9effba7e810d28c577248570',
  channelUrl : 'http://localhost', // Your channel url
  xfbml: true,
  status: true,
  cookie: true,
});

  FB.Event.subscribe('auth.login', function () {
          window.location.href = "{{ url_for('.board') }}";
 });

function fbAuthUser() {
    FB.login(checkLoginStatus);
}

function checkLoginStatus(response) {
    if(response && response.status == 'connected') {
        basicAPIRequest();
    } else {
    }
}
function basicAPIRequest() {
    FB.api('/me', function(response) {
        document.getElementById("inputFname").innerHTML = response.first_name;
        document.getElementById("profilePic").src = '"' + response.picture.data.url + '"';
        }
    );
}
function LogoutFacebook(){
FB.logout(function(response) {
  // user is now logged out
});
}