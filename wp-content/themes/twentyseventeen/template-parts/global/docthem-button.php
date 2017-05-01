<?php
    if (get_current_template() == 'main-page.php') { ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 modal-more">
                <a href="<?php echo get_permalink(get_page_by_path($page)); ?>"><button type="button" class="btn btn-block">XEM THÊM</button></a>
            </div>
        </div>    
    <?php }
 ?>
