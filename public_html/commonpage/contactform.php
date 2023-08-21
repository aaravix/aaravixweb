<form action="commonpage/send_email.php" method="post">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="inputName" class="form-label">Your Name</label>
            <input type="text" id="inputName" class="form-control border-0 bg-light px-4" placeholder="Your Name" style="height: 55px;">
        </div>
        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Your Email</label>
            <input type="email" id="inputEmail" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;">
        </div>
        <div class="col-12">
            <label for="inputSubject" class="form-label">Subject</label>
            <input type="text" id="inputSubject" class="form-control border-0 bg-light px-4" placeholder="Subject" style="height: 55px;">
        </div>
        <div class="col-12">
            <label for="inputMessage" class="form-label">Message</label>
            <textarea id="inputMessage" class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message"></textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
        </div>
    </div>
</form>