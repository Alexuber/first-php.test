<div class="container">
    <div id="ajaxStatus"></div>
    <form enctype="multipart/form-data" class="form-group" action="/modules/add_twit.php" method="POST" id="formTwit">
        <input type="hidden" name="user_id" value="<?php echo getUserID(); ?>">
        <label for="twit">Your twit</label>
        <br>
        <br>
        <textarea class="form-control" name="twit" placeholder="Write twit here..." id="twit" rows="3"></textarea>
        <br>
        <input type="file" name="image" id="twitImage">
        <button type="submit" class="btn btn-succes">Send</button>
    </form>
</div>