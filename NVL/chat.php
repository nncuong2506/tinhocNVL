<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chatbot</title>
    <link rel="stylesheet" href="./chat/static/style.css">
</head>

<body>
    <div class="container">
        <div class="chatbox" style="position: fixed;">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img style="width:70px;height:48px" src="./images/chatbotlogo.png" alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">ChatBot</h4>
                        <p class="chatbox__description--header">Xin chào tôi có thể giúp gì cho bạn?</p>
                    </div> 
                </div>
                <div class="chatbox__messages">
                    <!-- Messages will be added dynamically by JavaScript -->
                   <div class="messages__item messages__item--visitor">Chào bạn tôi là ChatBot. Bạn muốn hỏi tôi gì về bài này không?.</div>
                </div>

                <div class="chatbox__footer">
                    <input type="text" placeholder="Write a message...">
                    <button class="chatbox__send--footer send__button">Send</button>
                </div>
            </div>
            <div class="chatbox__button">
                <button><img style="width:48px;height:30px" src="./images/chatbotlogo.png" /></button>
            </div>
        </div>
    </div>
    <script>
        // Replace $SCRIPT_ROOT with the actual root URL in your Flask application
        $SCRIPT_ROOT = {{ request.script_root|tojson }};

        // Function to send the selected product to the server
        function sendProductList() {
            if (selectedProduct !== "") {
                // Add the selected product to the request
                var requestData = {
                    message: selectedProduct,
                    selected_product: selectedProduct
                };

                fetch($SCRIPT_ROOT + '/predict', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(requestData),
                })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response as needed
                        var outputDiv = document.getElementById("output");
                        var newMessage = document.createElement("div");
                        newMessage.className = "messages__item messages__item--operator";
                        newMessage.innerHTML = data.answer;
                        outputDiv.appendChild(newMessage);
                        document.getElementById("inputMessage").value = "";
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }

    </script>
    <script src="./chat/static/app.js"></script>
    <script src="./chat/static/main.js"></script>
</body>

</html>
