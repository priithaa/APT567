<?php require_once '../Commons/menu_template.php';
require_once 'includes/functions.inc.php';
// echo  $_GET['Ass_ID'];
$rows = getAssignmentDetails($conn, $_SESSION['Ass_ID']);
$qtrows =  fetchqpName($conn, $rows["QP_ID"]);
?>

<div class="col-sm-9">
    <div class="container">
        <div>
            <div class="ann_text_section">
                <h4>Submit Assignment</h4>
                <p>
                Please make sure that you submit the assignment on time otherwise your marks will get compromised!
                </p>
            </div>
            <div class="update">
                <?php
                if (isset($_GET["title"])) {
                    echo "<p>" . $_GET['title'] . " -added successfully</p>";
                }
                ?>
            </div>
            <form id="ann_add_form" action='includes/add_submit_ass.inc.php' method="post">
                <div class="controls">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ann_add-title">Question Paper Type*</label>
                                <br>
                                <input id="form_title" type="text" name="sub_question_paper_type" class="form-control" value="<?php echo $qtrows["QP_name"]; ?>">
                                <div class="help-block with-errors"></div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ann_add-title">Title*</label>
                                <input id="form_title" type="text" name="sub_title" class="form-control" value="<?php echo $rows["QP_title"] ?>" required="required" data-error="Title is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ann_add-title">Due Date*</label>
                                <input id="date" type="text" name="sub_due_date" value="<?php echo $rows["QP_due_date"] ?>" class="form-control" required="required" data-error="Title is required.">
                                <p id="geek"></p>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div>
                            <div class="form-group">
                                <label for="ann_add-desc">Submission*</label>
                                <textarea id="form_desc" name="desc" class="form-control" placeholder="Please enter the submission link of the assignment  (MAX: 8000 characters)" rows="6" required="required" data-error="Please add a description."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success btn-send" name="submit_ass" value="Submit">
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
