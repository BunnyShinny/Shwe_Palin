// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyAt17cRDm6O0jBr5_AWwKVOKxkqu5Cd5-U",
    authDomain: "shwepalin-25d94.firebaseapp.com",
    databaseURL: "https://shwepalin-25d94.firebaseio.com",
    projectId: "shwepalin-25d94",
    storageBucket: "shwepalin-25d94.appspot.com",
    messagingSenderId: "509437086415",
    appId: "1:509437086415:web:8319facfece4ae53a085ba",
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
