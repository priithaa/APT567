<?php require_once '../Commons/menu_template.php' ?>

<div class="col-sm-9">
        <div class="p-4 row">
            <div class="row Ann_add">
              <a href='add_ann_template.php?Course_ID=<?php echo $row["Course_ID"]; ?>'>
                <button>
                    <i class='bx bx-plus'></i>
                    <span class="mx-2"> Add Announcement</span>
                </button>
              </a>
            </div>
            <div class="whitebox">
                <div class ="contentbox">
                    <div class="row Ann_head">
                        <div class="col sm Ann_title">
                            <h5>
                                <a href="">Quiz on 29th Feb 2021 </a>
                            </h5>
                        </div>
                        <div class="col sm Ann-date">
                            <h6>Posted: 21/02/2021</h6>
                        </div>
                    </div>
                    <div class="row Ann_desc">
                        An article is any member of a class of dedicated words that are 
                        used with noun phrases to mark the identifiability of the referents of 
                        the noun phrases. The category of articles constitutes a part of speech. 
                        In English, both "the" and "a" are articles, which combine with a noun to 
                        form a noun phrase. Wikipedia
                    </div>
                    <div class="row Ann_delete">
                      <button>Delete</button>
                    </div>
                </div>
            </div>

        </div>
      </div>

      <?php require_once '../Commons/twitter_template.php' ?>