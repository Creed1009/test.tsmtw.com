<style>
    .jumbotron {
        padding: 2rem 1rem;
        margin-bottom: 2rem;
        background-color:rgb(55, 107, 158);
        /* border-radius: .3rem;  */
        width: 100%;
        height: 400px;
    }
</style>

<!-- <?php if(!empty($banner)) { ?>
    <?php echo $banner['page_content'] ?>
<?php } ?> -->


<main role="main">

<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>
    </div>
</main>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="row">
                <div class="col-md-4">
                    <img src="" alt="">
                </div>
                <div class="col-md-8">
                    <h1>關於我們</h1>
                    <p>我們是一群熱愛生活的人，希望透過我們的努力，讓更多人認識我們的產品，並且喜歡我們的產品。</p>
                </div>
            </div>
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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>關於我們</h1>
            <p>我們是一群熱愛生活的人，希望透過我們的努力，讓更多人認識我們的產品，並且喜歡我們的產品。</p>
        </div>
    </div>
</div>




