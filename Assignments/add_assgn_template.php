<?php require_once '../Commons/menu_template.php';
      require_once 'includes/functions.inc.php';
?>

<div class="col-sm-9">
        <div class="container">

          <div >

            <div class ="ann_text_section">
                <h4>Add an Assignment</h4>
                <p>Please make sure that you submit the assignment on time otherwise your marks will get compromised!
                </p>
            </div>

            <div class="update">
                <?php
                        if (isset($_GET["title"])) {
                            echo "<p>".$_GET['title']." -added successfully</p>";
                        }
                ?>
              </div>

            <form id="ann_add_form" action='includes/add_assgn.inc.php' method="post">
                <div class="controls">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="ann_add-title">Question Paper Type*</label>
                        <br>
                        <select id="" name="question_paper_type"  class="form-control">
                          <?php qpType($conn); ?>
                        </select>

                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="ann_add-title">Title*</label>
                        <input id="form_title" type="text" name="title" class="form-control" placeholder="Please enter the title of the assignment (MAX: 500 characters)" required="required" data-error="Title is required.">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="ann_add-title">Due Date*</label>
                        <input id="date" type="date" name="due_date" min="<?php echo date("Y-m-d") ?>" class="form-control datepicker" placeholder="Please enter the title of the assignment (MAX: 500 characters)" required="required" data-error="Title is required.">
                        <p id = "geek"></p>
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div>
                      <div class="form-group">
                        <label for="ann_add-desc">Description*</label>
                        <textarea id="form_desc" name="desc" class="form-control" placeholder="Please enter the description of the assignment  (MAX: 8000 characters)" rows="6" required="required" data-error="Please add a description."></textarea>
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>

                    <div>
                      <input type="submit" class="btn btn-success btn-send" name="submit_assgn" value="Submit">
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <p class="text-muted"><strong>*</strong>These fields are required.</p>
                    </div>
                  </div>

                </div>
            </form>

          </div>
        </div>
      </div>
      
<?php require_once '../Commons/twitter_template.php' ?>
