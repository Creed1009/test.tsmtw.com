<style>
    .category_btn {
        /*padding-left: 5px;*/
        width: 100%;
        text-align: center;
    }
    .category_btn:hover{
        border-left: 5px solid #192988;
        padding-left: 10px;
    }
    .category_btn.active{
        border-left: 5px solid #192988;
        padding-left: 10px;
    }
</style>
<?php if(!empty($banner['page_banner'])){ ?>
    <img src="/assets/uploads/<?php echo $banner['page_banner'] ?>" class="img-fluid">
<?php } ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="padding-top: 20px; padding-bottom: 0px; background: #E6E6E6;">
            <ul style="padding: 0px;">
                <li class="nav nav-tabs" style="padding: 15px;">
                    <a class="category_btn <?php if ($this->uri->segment(1)=="history") {echo "active";} ?>" href="/history">
                        <p class="text-dark" style="cursor: pointer;">
                            籌組歷史
                        </p>
                    </a>
                </li>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <a class="category_btn <?php if ($this->uri->segment(1)=="about_us") {echo "active";} ?>" href="/about_us">
                        <p class="text-dark" style="cursor: pointer;">
                            簡介
                        </p>
                    </a>
                </li>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <a class="category_btn <?php if ($this->uri->segment(1)=="groups") {echo "active";} ?>" href="/groups">
                        <p class="text-dark" style="cursor: pointer;">
                            組織架構
                        </p>
                    </a>
                </li>
                <li class="nav nav-tabs" style="padding: 15px;">
                    <a class="category_btn <?php if ($this->uri->segment(1)=="locations") {echo "active";} ?>" href="/locations">
                        <p class="text-dark" style="cursor: pointer;">
                            交通圖
                        </p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-9" style="padding-top: 15px; padding-bottom: 15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $banner['page_content'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container" style="padding-top: 50px; padding-bottom: 70px;">
    <?php //echo $banner['page_content'] ?>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 60px; border-top: 1px solid #333;">
            <div class="col-md-5 text-center" style="margin-top: 60px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.8141013527193!2d121.53898641541814!3d25.04038208396938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abd7184318d5%3A0x7cf68fbfb8f6eca3!2zMTA25Y-w5YyX5biC5aSn5a6J5Y2A5b-g5a2d5p2x6Lev5LiJ5q61MjQ45be3MzDomZ8!5e0!3m2!1szh-TW!2stw!4v1552617689267" width="300" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-5" style="margin-top: 60px;">
                <?php //echo $about_contact['page_content'] ?>
            </div>
        </div>
    </div>
</div> -->