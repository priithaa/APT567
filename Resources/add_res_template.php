<?php require_once '../Commons/menu_template.php' ?>

<div class="col-sm-9">
        <div class="container">

          <div >

            <div class ="ann_text_section">
                <h4>Add Resources</h4>
                <p>A form is a document with spaces in which to write or select, for a series
                  of documents with similar contents. The documents usually have the printed
                  parts in common, except, possibly, for a serial number. Forms, when completed,
                  may be a statement, a request, an order, etc.; a check may be a form.
                </p>
            </div>

            <div class="update">
                <?php
                        if (isset($_GET["title"])) {
                            echo "<p>".$_GET['title']." -added successfully</p>";
                        }
                ?>
              </div>

            <form id="ann_add_form" action='includes/add_res.inc.php' method="post">
                <div class="controls">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="ann_add-title">Week*</label>
                        <br>
                        <select id="" name="week"  class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>

                        </select>

                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="ann_add-title">Title*</label>
                        <input id="form_title" type="text" name="title" class="form-control" placeholder="Please enter the title of the resources (MAX: 500 characters)" required="required" data-error="Title is required.">
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div>
                      <div class="form-group">
                        <label for="ann_add-desc">Description*</label>
                        <textarea id="form_desc" name="desc" class="form-control" placeholder="Please enter the description of the resources  (MAX: 8000 characters)" rows="6" required="required" data-error="Please add a description."></textarea>
                        <div class="help-block with-errors"></div>
                      </div>
                    </div>

                    <div>
                      <input type="submit" class="btn btn-success btn-send" name="submit_res" value="Submit">
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
