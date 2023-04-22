<div class="generalContainer2 commentContainer">
    <div class="commentBox">
        <form action="<?= BASEURL; ?>Patients/comment" method="POST" class="commentForm">
            <?php Flasher::flash3() ?>
            <input type="text" name="patientName" id="" placeholder="Enter Your Name...">
            <input type="text" name="patientId" id="" placeholder="Enter Your Id...">
            <input type="text" name="comment" id="" placeholder="Enter Your Comment...">
            <hr class="commentLine">
            <button type="submit">send</button>
        </form>
    </div>

</div>