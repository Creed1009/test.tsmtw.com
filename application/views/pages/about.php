<style>
    .jumbotron {
    margin-bottom: 0;
    padding: 0;
    position: relative;
}

.display-1 {
    font-weight: bold;
    letter-spacing: 2px;
}

.display-4 {
    letter-spacing: 1px;
}
</style>

<!-- <?php if(!empty($banner)) { ?>
    <?php echo $banner['page_content'] ?>
<?php } ?> -->


<main role="main">
    <div class="jumbotron jumbotron-fluid text-white" style="height: 100vh; background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/asset/images/tacc_images/aboutus_top_pic.jpg') no-repeat center center; background-size: cover;">
        <div class="container h-100 d-flex flex-column justify-content-center">
            <h1 class="display-1">ABOUT US</h1>
            <h2 class="display-4">TACC DESIGN STUDIO</h2>
        </div>
    </div>
</main>
<div class="container">
    <div class="row align-items-center my-5">
            <div class="col-md-6">
                <img src="/assets/images/tacc_images/aboutus_pic_01.jpg" class="img-fluid" alt="設計圖">
            </div>
            <div class="col-md-6" style="line-height: 1.3; font-size: 14px;">
                <h2>太工創作設計</h2>
                太工創作設計專注於住宅與商業空間的整合設計，<br>
                堅持以溫度與創意為核心，結合建築本質，<br>
                為客戶帶來嶄新的空間體驗。<br><br>

                我們擅長將不同材質、結構與功能融合，化解工程難題，<br>
                創造實用且美觀的設計方案，<br>
                致力於突破業界的界限。<br><br>

                多年來，憑藉創新的設計理念與專業的執行能力，<br>
                太工創作設計深受業主與合作夥伴的信賴與推崇，<br>
                成為眾多粉絲心中的優質品牌。<br><br>

                每一個太工的作品都蘊藏著獨特的創意，量身打造、不可複製，<br>
                為客戶實現他們的夢想空間。<br><br>

                我們相信設計不僅是功能與美學的結合，<br>
                更是一種對生活方式的詮釋。期待與您一同創造令人驚豔的作品！
            </div>
    </div>

</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="padding-top: 0px; padding-bottom: 0px; background: #E6E6E6;">
            <ul style="padding: 0px;">
                <!-- <li class="nav nav-tabs" style="padding: 15px;">
                    <a class="category_btn <?php if ($this->uri->segment(1)=="history") {echo "active";} ?>" href="/history">
                        <p class="text-dark" style="cursor: pointer;">
                            籌組歷史
                        </p>
                    </a>
                </li> -->
                <li class="nav nav-tabs" style="padding: 15px;">
                    <a class="category_btn <?php if ($this->uri->segment(1)=="about_us") {echo "active";} ?>" href="/about_us">
                        <p class="text-dark" style="cursor: pointer;">
                            簡介
                        </p>
                    </a>
                </li>
                <!-- <li class="nav nav-tabs" style="padding: 15px;">
                    <a class="category_btn <?php if ($this->uri->segment(1)=="groups") {echo "active";} ?>" href="/groups">
                        <p class="text-dark" style="cursor: pointer;">
                            組織架構
                        </p>
                    </a>
                </li> -->
                <!-- <li class="nav nav-tabs" style="padding: 15px;">
                    <a class="category_btn <?php if ($this->uri->segment(1)=="localtions") {echo "active";} ?>" href="/localtions">
                        <p class="text-dark" style="cursor: pointer;">
                            交通圖
                        </p>
                    </a>
                </li> -->
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






