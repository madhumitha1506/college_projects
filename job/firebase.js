import * as firebase from 'firebase/compat';
import 'firebase/auth';
import 'firebase/database';

const firebaseConfig = {
  apiKey: "AIzaSyAEHx-hiu-BAoV-V-c8byl1bN3W4Sb3iLI",
  authDomain: "jobs-9bf15.firebaseapp.com",
  projectId: "jobs-9bf15",
  storageBucket: "jobs-9bf15.appspot.com",
  messagingSenderId: "482694888995",
  appId: "1:482694888995:web:a7e7f04a0cecdcfe267b96"
};

let app;
if(!firebase.apps.length){
    app = firebase.initializeApp(firebaseConfig);

}else{
    app = firebase.app()
}
const database = firebase.database();
const auth = firebase.auth();

export  {database,auth};

