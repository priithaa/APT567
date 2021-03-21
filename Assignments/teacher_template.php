<?php require_once '../Commons/menu_template.php' ?>

<?php require_once 'includes/fetchAssignment.inc.php';
require_once 'includes/functions.inc.php';
?>

<div class="col-sm-9">
        <div class="p-4 row">
            <div class="row Ann_add">
              <a href='add_assgn_template.php'>
                <button>
                    <i class='bx bx-plus'></i>
                    <span class="mx-2"> Add Assignment</span>
                </button>
              </a>
            </div>
            <div class="faqs-container" itemscope itemtype="https://schema.org/FAQPage">
            <?php $rows = mysqli_fetch_assoc($resultData);
                    if(empty($rows)){
                        echo "<h3>SORRY, NOTHING TO SHOW</h3>";
                    }
                    else{

                        printAssignment($conn,$rows['QP_ID']);
                    }
                ?>



                  <?php while($row = mysqli_fetch_assoc($resultData))
                  {
                    printAssignment($conn,$row['QP_ID']);
                  }
                  ?>


                   </div>


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
