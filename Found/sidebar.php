<style>
h4 {
    border-left: 3px solid #1e90ff;
    padding-left: 7px;

}

a {
    text-decoration: none;
}

.recent-post.d-flex {
    border-bottom: 1px solid #e7e7e7;
    padding-bottom: 10px;
}
</style>

<div class="col-md-4">
    <div class="recent-post-container" id="bgshadow">
        <h4>Recent Posts</h4>
        <?php
require_once "../config/config.php";
$limit = 3;
$sql = "SELECT * FROM foundproduct JOIN user ON foundproduct.author=user.user_id ORDER BY fproductid DESC LIMIT {$limit}";
$result = mysqli_query($conn, $sql);
if (isset($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <div class="recent-post d-flex">
            <a class="post-img" href="readmore.php?id=<?php echo $row['fproductid'] ?>">
                <img class="img-fluid" style="height: 90px; width: 90px;  object-fit: cover;"
                    src="../upload/img/<?php echo $row['postimg'] ?>" alt="" />
            </a>
            <div class="post-content" style="padding-left: 10px;">
                <h5><a href="readmore.php?id=<?php echo $row['fproductid'] ?>"><?php echo $row['objectname'] ?></a></h5>
                <span>
                    <i style="color: #1e90ff;" class="fas fa-user"></i>
                    <a href='author.php?aid=<?php echo $row['author'] ?>'
                        style="color: #666;"><?php echo $row['username'] ?></a>
                </span>
                <span>
                    <i style="color: #1e90ff;" class="fas fa-calendar-alt"></i>
                    <?php
echo $row['postdate']
        ?>
                </span>
                <div style="padding-top: 10px !important;">
                    <button class="btn btn-primary"><a style="color: #fff;padding: 0 !important;" class="read-more"
                            href="readmore.php?id=<?php echo $row['fproductid'] ?>">READ MORE</a></button>
                </div>
            </div>
        </div>
        <?php
}
}
?>
    </div>
</div>