<?php require_once '../Commons/menu_template.php' ?>

<?php require_once 'includes/fetchResources.inc.php';
      require_once 'includes/functions.inc.php';
 ?>

<div class="col-sm-9">
        <div class="p-4 row">
            <div class="row Ann_add">
              <a href='add_res_template.php'>
                <button>
                    <i class='bx bx-plus'></i>
                    <span class="mx-2"> Add Resources</span>
                </button>
              </a>
            </div>
            <div class="faqs-container" itemscope itemtype="https://schema.org/FAQPage">
            <?php $rows = mysqli_fetch_assoc($resultData);
                    if(empty($rows)){
                        echo "<h3>SORRY, NOTHING TO SHOW</h3>";
                    }
                    else{

                        printResources($conn,$rows['Res_week']);
                    }
                ?>



                  <?php while($row = mysqli_fetch_assoc($resultData))
                  {
                    printResources($conn,$row['Res_week']);
                  }
                  ?>


                   </div>



                <!--<div class="whitebox">
                        <div class ="contentbox">
                            <div class="row Ann_head">
                                <div class="col sm Ann_title">
                                    <h5>
                                        <a href=""><//?php echo $rows['Ann_title'];?> </a>
                                    </h5>
                                </div>
                                <div class="col sm Ann-date">
                                    <h6>Posted: <//?php echo $rows['Ann_date'];?></h6>
                                </div>
                            </div>
                            <div class="row Ann_desc">
                                <//?php  echo $rows['Ann_desc'];?>
                            </div>
                            <div class="row Ann_delete">
                        <a href="includes/redirect_delete.inc.php?Ann_ID=<//?php echo $rows["Ann_ID"];?>">
                            <button>Delete</button>
                        </a>
                        </div>
                        </div>
                </div>
                <//?php
                 while ($rows = mysqli_fetch_assoc($resultData)) { // $rows;
                ?>
                    <div class="whitebox">
                        <div class ="contentbox">
                            <div class="row Ann_head">
                                <div class="col sm Ann_title">
                                    <h5>
                                        <a href=""><//?php echo $rows['Ann_title'];?> </a>
                                    </h5>
                                </div>
                                <div class="col sm Ann-date">
                                    <h6>Posted: <//?php echo $rows['Ann_date'];?></h6>
                                </div>
                            </div>
                            <div class="row Ann_desc">
                                <//?php  echo $rows['Ann_desc'];?>
                            </div>
                            <div class="row Ann_delete">
                        <a href="includes/redirect_delete.inc.php?Ann_ID=<//?php echo $rows["Ann_ID"];?>">
                            <button>Delete</button>
                        </a>
                        </div>
                        </div>
                    </div>
                <//?php }  ?>
                <//?php mysqli_stmt_close($stmt); ?>
            <//?php } ?>-->
        </div>
      </div>
      <script>
      $(document).ready(function() {
        $(".faqs-container .faq-singular:first-child").addClass("active").children(".faq-answer").slideDown();//Remove this line if you dont want the first item to be opened automatically.
        $(".faq-question").on("click", function(){
          if( $(this).parent().hasClass("active") ){
            $(this).next().slideUp();
            $(this).parent().removeClass("active");
          }
          else{
            $(".faq-answer").slideUp();
            $(".faq-singular").removeClass("active");
            $(this).parent().addClass("active");
            $(this).next().slideDown();
          }
        });
      });
      </script>
      <?php require_once '../Commons/twitter_template.php' ?>
