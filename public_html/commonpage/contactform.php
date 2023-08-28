<form>
    <div class="row">
        <div class="col-md-6">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" id="name" name="name" class="form-control border-0 bg-light px-4" placeholder="Your Name" style="height: 55px;">
            <span id="nameError" class="error"></span>
        </div>
        <div class="col-md-6">
            <label for="recipient" class="form-label">Your Email</label>
            <input type="email" id="recipient" name="recipient" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;">
            <span id="emailError" class="error"></span>
        </div>
        <div class="col-12">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control border-0 bg-light px-4" placeholder="Subject" style="height: 55px;">
            <span id="subjectError" class="error"></span>
        </div>
        <div class="col-12">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="message" class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message"></textarea>
            <span id="messageError" class="error"></span>
        </div>
        <div class="col-12"><br>
            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
        </div>
    </div>
</form>

<script>
    const form = document.querySelector('form');

    function validateField(inputElement, errorElement, errorMessage) {
        const inputValue = inputElement.value.trim();

        if (inputValue === '') {
            errorElement.textContent = errorMessage;
            return false;
        } else {
            errorElement.textContent = '';
            return true;
        }
    }

    function validateForm() {
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('recipient');
        const subjectInput = document.getElementById('subject');
        const messageInput = document.getElementById('message');

        const isValidName = validateField(nameInput, nameError, 'Please enter your name.');
        const isValidEmail = validateField(emailInput, emailError, 'Please enter your email.');
        const isValidSubject = validateField(subjectInput, subjectError, 'Please enter the subject.');
        const isValidMessage = validateField(messageInput, messageError, 'Please enter your message.');

        return isValidName && isValidEmail && isValidSubject && isValidMessage;
    }

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        if (validateForm()) {
            const formData = new FormData(form);

            fetch('commonpage/send_email.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the server
                    console.log(data);
                })
                .catch(error => {
                    // Handle errors
                    console.error("Error:", error);
                });
        }
    });

    const formFields = form.querySelectorAll('input, textarea');
    formFields.forEach(field => {
        field.addEventListener('input', () => {
            validateField(field, field.nextElementSibling, '');
        });

        field.addEventListener('focus', () => {
            field.nextElementSibling.textContent = '';
        });
    });
</script>