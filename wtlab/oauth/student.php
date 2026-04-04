<!DOCTYPE html>
<html>
<head>
    <title>Student Support - Agri Portal</title>

    <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-auth.js"></script>

    <style>
        body {
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: white;
            text-align: center;
        }

        .card {
            background: white;
            color: black;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
        }

        button {
            padding: 10px 20px;
            background: #1e3c72;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #16325c;
        }

        #loginMessage {
            margin-top: 10px;
            color: green;
            font-weight: bold;
            display: none;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>Student Support Login</h2>
    <button onclick="googleLogin()">Sign in with Google</button>
    <div id="userInfo"></div>
    <div id="loginMessage"></div>
</div>

<script type="module">

import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js";
import { getAuth, signInWithPopup, GoogleAuthProvider } 
from "https://www.gstatic.com/firebasejs/10.12.0/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyDYqsKNZoV8mLFfPvfibLJBYTcqirxuikw",
  authDomain: "first-project-67e3e.firebaseapp.com",
  projectId: "first-project-67e3e",
  appId: "1:629536345148:web:dd593a3fbc7c56fbc48739"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const provider = new GoogleAuthProvider();

window.googleLogin = function() {
    signInWithPopup(auth, provider)
    .then((result) => {
        const user = result.user;

        // Show user info
        document.getElementById("userInfo").innerHTML =
            "<br><b>Name:</b> " + user.displayName +
            "<br><b>Email:</b> " + user.email;

        // Show temporary login message
        const msgDiv = document.getElementById("loginMessage");
        msgDiv.innerText = "Login Successful!";
        msgDiv.style.display = "block";

        // Hide message after 3 seconds
        setTimeout(() => {
            msgDiv.style.display = "none";
        }, 3000);
        
    })
    .catch((error) => {
        alert(error.message);
    });
};

</script>

</body>
</html>
