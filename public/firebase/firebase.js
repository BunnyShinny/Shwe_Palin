// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyAcaFy_xhWMse08obMFsnjMAvtTjS_oCwc",
    authDomain: "shwepalin-7bbf2.firebaseapp.com",
    databaseURL: "https://shwepalin-7bbf2.firebaseio.com",
    projectId: "shwepalin-7bbf2",
    storageBucket: "shwepalin-7bbf2.appspot.com",
    messagingSenderId: "879703222246",
    appId: "1:879703222246:web:d3e7d73d1dde203051d827",
    measurementId: "G-RRQ1D4D6R6"
  };

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Retrieve Firebase Messaging object.
const messaging = firebase.messaging();
messaging
    .requestPermission()
    .then(function () {
        console.log("Notification permission granted.");
        // TODO(developer): Retrieve an Instance ID token for use with FCM.
        // ...

        return messaging.getToken();
    }).then(function(token){
        console.log(token)
    })
    .catch(function (err) {
        console.log("Unable to get permission to notify.", err);
    });

messaging.onMessage((payload) => {
    console.log("payload");
    console.log(payload);
});
