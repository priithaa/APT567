<?php require_once '../Commons/menu_template.php' ?>

<?php require_once 'includes/fetchAnnouncement.inc.php'; ?>

    <div class="col-sm-9">
            <div class="p-4 row">
                <?php $rows = mysqli_fetch_assoc($resultData);
                    if(empty($rows)){
                        echo "<h3>SORRY, NOTHING TO SHOW</h3>";
                    }
                    else{
                ?>
                <div class="whitebox">
                        <div class ="contentbox">
                            <div class="row Ann_head">
                                <div class="col sm Ann_title">
                                    <h5>
                                        <a href=""><?php echo $rows['Ann_title'];?> </a>
                                    </h5>
                                </div>
                                <div class="col sm Ann-date">
                                    <h6>Posted: <?php echo $rows['Ann_date'];?></h6>
                                </div>
                            </div>
                            <div class="row Ann_desc">
                                <?php  echo $rows['Ann_desc'];?>
                            </div>
                        </div>
                </div>
                <?php          
                 while ($rows = mysqli_fetch_assoc($resultData)) { // $rows;
                ?>
                    <div class="whitebox">
                        <div class ="contentbox">
                            <div class="row Ann_head">
                                <div class="col sm Ann_title">
                                    <h5>
                                        <a href=""><?php echo $rows['Ann_title'];?> </a>
                                    </h5>
                                </div>
                                <div class="col sm Ann-date">
                                    <h6>Posted: <?php echo $rows['Ann_date'];?></h6>
                                </div>
                            </div>
                            <div class="row Ann_desc">
                                <?php  echo $rows['Ann_desc'];?>
                            </div>
                        </div>
                    </div>
                <?php }  ?>
                <?php mysqli_stmt_close($stmt); ?>
            <?php } ?>
                
            </div>
        
            
    </div>

    <?php require_once '../Commons/twitter_template.php' ?>