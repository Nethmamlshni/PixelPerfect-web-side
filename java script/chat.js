document.getElementById('send-button').addEventListener('click', sendMessage);
document.getElementById('message-input').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
});

// Load saved messages from local storage when the page is loaded
window.onload = function() {
    loadMessages();
}

function sendMessage() {
    const input = document.getElementById('message-input');
    const message = input.value.trim();
    
    if (message) {
        addMessage(message, 'user');
        saveMessage(message, 'user');
        input.value = '';
    }
}

function addMessage(text, sender) {
    const chatContent = document.getElementById('chat-content');
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', sender);
    const textElement = document.createElement('div');
    textElement.classList.add('text');
    textElement.textContent = text;
    messageElement.appendChild(textElement);
    chatContent.appendChild(messageElement);
    chatContent.scrollTop = chatContent.scrollHeight;
}

function saveMessage(text, sender) {
    const messages = JSON.parse(localStorage.getItem('messages')) || [];
    messages.push({ text, sender });
    localStorage.setItem('messages', JSON.stringify(messages));
}

function loadMessages() {
    const messages = JSON.parse(localStorage.getItem('messages')) || [];
    messages.forEach(message => addMessage(message.text, message.sender));
}

document.getElementById('chat-icon').addEventListener('click', function() {
    var chatBox = document.getElementById('chat-box');
    if (chatBox.style.display === 'none') {
        chatBox.style.display = 'block';
    } else {
        chatBox.style.display = 'none';
    }
});
