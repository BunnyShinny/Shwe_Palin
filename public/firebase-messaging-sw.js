/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.2/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
  apiKey: "AIzaSyAcaFy_xhWMse08obMFsnjMAvtTjS_oCwc",
  authDomain: "shwepalin-7bbf2.firebaseapp.com",
  databaseURL: "https://shwepalin-7bbf2.firebaseio.com",
  projectId: "shwepalin-7bbf2",
  storageBucket: "shwepalin-7bbf2.appspot.com",
  messagingSenderId: "879703222246",
  appId: "1:879703222246:web:d3e7d73d1dde203051d827",
  measurementId: "G-RRQ1D4D6R6"
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.',
    icon: '/firebase-logo.png'
  };

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});

messaging.onMessage((payload) => {
  console.log('Message received. ', payload);
  // ...
});