document.addEventListener('DOMContentLoaded', function() {
    const maxCharacterLimit = 200; // Set the maximum character limit
  
    const messageInput = document.getElementById('message');
    const characterCount = document.getElementById('character-count');
  
    messageInput.addEventListener('input', function () {
      const message = this.value;
      const remainingCharacters = maxCharacterLimit - message.length;
  
      if (remainingCharacters >= 0) {
        characterCount.textContent = `${remainingCharacters} characters remaining`;
        messageInput.classList.remove('error');
      } else {
        characterCount.textContent = `Exceeded the character limit by ${Math.abs(remainingCharacters)}`;
        messageInput.classList.add('error');
      }
    });
  
    const contactForm = document.getElementById('contact-form');
    contactForm.addEventListener('submit', function (event) {
      const message = messageInput.value;
  
      if (message.length > maxCharacterLimit) {
        event.preventDefault();
        messageInput.classList.add('error');
        alert('Exceeded the character limit for the message');
      }
    });
  });
  