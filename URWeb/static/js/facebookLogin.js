FB.init({
  appId: '419512185089420', // Your app id
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