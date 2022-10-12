<?php
$twits = getAllTwitsByUser(getUserID());

?>

<ul id="listTwits">
    <?php while ($row = $twits->fetch_assoc()) : ?>
        <li>
            <?php echo $row['twit']; ?>

            <?php if ($row['image'] != "") : ?>
                <img src="/uploads/<?php echo $row['image']; ?>">
                <div class="job-status-bar">
                    <ul class="like-com">
                        <li>
                            <a href="#"><i class="fas fa-heart"></i> Like</a>
                            <img src="images/liked-img.png" alt="">
                            <span>25</span>
                        </li>
                        <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>
                    </ul>
                    <a href="#"><i class="fas fa-eye"></i>Views 50</a>
                </div>
            <?php endif; ?>
        </li>
    <?php endwhile; ?>
</ul>