    <style>
        /* Chatbot Container */
        #chatbot-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #fff;
            display: none;
            flex-direction: column;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            z-index: 1000;
        }

        /* Chatbot Header */
        #chatbot-header {
            background: #0B3D91;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            position: relative;
        }

        #chatbot-header #close-chatbot {
            position: absolute;
            top: 5px;
            right: 10px;
            background: none;
            color: #fff;
            border: none;
            font-size: 18px;
            cursor: pointer;
        }

        /* Chatbot Messages */
        #chatbot-messages {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
            height: 300px;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }

        .message {
            margin-bottom: 10px;
            padding: 8px 12px;
            border-radius: 12px;
            max-width: 75%;
            word-wrap: break-word;
        }

        .message.bot {
            background-color: #f1f1f1;
            text-align: right;
            margin-left: auto;
        }

        .message.user {
            background-color: #0B3D91;
            color: #fff;
            text-align: left;
            margin-left: auto;
            /* Aligns to the right */
        }

        /* Input Area */
        #chatbot-input-container {
            display: flex;
            padding: 5px;
        }

        #chatbot-input {
            flex-grow: 1;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px;
        }

        #send-message {
            margin-left: 5px;
            background: #0B3D91;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>

    <!-- Chatbot Widget -->
    <div id="chatbot-container">
        <div id="chatbot-header">
            <h4>Chatbot</h4>
            <button id="close-chatbot">×</button>
        </div>
        <div id="chatbot-messages"></div>
        <div id="chatbot-input-container">
            <input type="text" id="chatbot-input" placeholder="Type a message...">
            <button id="send-message">Send</button>
        </div>
    </div>

    <!-- Chatbot Toggle Button -->
    <button id="open-chatbot"
        style="position: fixed; bottom: 20px; right: 20px; background: #0B3D91; color: white; border: none; border-radius: 50%; padding: 10px 15px; font-size: 18px; cursor: pointer;">💬</button>

    <script>
        // Toggle Chatbot
        const chatbotContainer = document.getElementById('chatbot-container');
        const openChatbotButton = document.getElementById('open-chatbot');
        const closeChatbotButton = document.getElementById('close-chatbot');

        openChatbotButton.addEventListener('click', () => chatbotContainer.style.display = 'flex');
        closeChatbotButton.addEventListener('click', () => chatbotContainer.style.display = 'none');

        // Chatbot Functionality
        const chatbotMessages = document.getElementById('chatbot-messages');
        const chatbotInput = document.getElementById('chatbot-input');
        const sendMessageButton = document.getElementById('send-message');

        sendMessageButton.addEventListener('click', sendMessage);
        chatbotInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });

        function sendMessage() {
            const userMessage = chatbotInput.value.trim();
            if (!userMessage) return;

            // Display User Message
            displayMessage(userMessage, 'user');
            chatbotInput.value = '';

            // Send Message to Server
            fetch('/chatbot/message', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message: userMessage
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Display Bot Response
                    displayMessage(data.reply, 'bot');
                })
                .catch(err => {
                    console.error('Error:', err);
                    displayMessage('Something went wrong. Please try again.', 'bot');
                });
        }

        function displayMessage(message, sender) {
            const messageElement = document.createElement('div');
            messageElement.className = sender;
            messageElement.textContent = message;
            chatbotMessages.appendChild(messageElement);
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        }
    </script>
