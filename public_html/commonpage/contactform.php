<form>
    <div class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" id="name" name="name" class="form-control border-0 bg-light px-4" placeholder="Your Name" style="height: 55px;">
        </div>
        <div class="col-md-6">
            <label for="recipient" class="form-label">Your Email</label>
            <input type="email" id="recipient" name="recipient" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;">
        </div>
        <div class="col-12">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" id="subject" name="subject" class="form-control border-0 bg-light px-4" placeholder="Subject" style="height: 55px;">
        </div>
        <div class="col-12">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="message" class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message"></textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
        </div>
    </div>
</form>
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);

        fetch('commonpage/send_email.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the server
                console.log(data);
            })
            .catch(error => {
                // Handle errors
                console.error('Error:', error);
            });
    });
</script>