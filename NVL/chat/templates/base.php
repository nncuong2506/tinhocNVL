<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chatbot</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="chatbox">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-5--v1.png" alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">Chat support</h4>
                        <p class="chatbox__description--header">Hi. My name is Sam. How can I help you?</p>
                    </div>
                </div>

                <div class="chatbox__messages" id="output">
                    <!-- Messages will be added dynamically by JavaScript -->
                </div>
                
                <div class="chatbox__footer">
                   <input type="text" id="inputMessage" placeholder="Write a message...">
                    <button id="sendBtn">Send</button>
                    <div id="output"></div>
                </div>
            </div>
            <div class="chatbox__button">
                <button onclick="showProductList()"><img src="./images/chatbox-icon.svg" /></button>
            </div>
            <script>
                // Function to show the product list
                function showProductList() {
                    var productListContainer = document.getElementById("product-list-container");
                    productListContainer.style.display = "block";
                }

                // Function to send a message to the server
                function sendMessage() {
    var inputMessage = document.getElementById("inputMessage").value;

    if (!inputMessage) return;

    fetch('/predict', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message: inputMessage })
    })
    .then(res => res.json())
    .then(data => {
        // Thêm câu trả lời của bot vào UI
        var outputDiv = document.getElementById("output");
        
        // User message
        var userMsg = document.createElement("div");
        userMsg.className = "messages__item messages__item--visitor";
        userMsg.innerText = inputMessage;
        outputDiv.appendChild(userMsg);

        // Bot response
        var botMsg = document.createElement("div");
        botMsg.className = "messages__item messages__item--operator";
        botMsg.innerText = data.answer;
        outputDiv.appendChild(botMsg);

        // Clear input
        document.getElementById("inputMessage").value = "";
    })
    .catch(err => console.error(err));
}

            </script>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="app.js"></script>
    <script src="main.js"></script>
</body>

</html>
