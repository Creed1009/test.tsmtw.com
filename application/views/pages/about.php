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

.marquee {
    width: 100%;
    background-color: white;
    white-space: nowrap;
    font-size: 16px;
    line-height: 40px;
    overflow: hidden;
    position: relative;
}

.marquee-content {
    display: flex;
    white-space: nowrap;
    animation: marquee 15s linear infinite;
    min-width: 200%;
}

@keyframes marquee {
    from {
        transform: translate(0%);
    }

    to {
        transform: translate(-50%);
    }
}

.banner {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    background: 
    linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
    url('/assets/images/about_banner_02.jpg') no-repeat center center;
    background-size: cover;
}

.banner h1 {
    text-align: left;
    font-size: 3rem;
}

.banner h2 {
    text-align: left;
    font-size: 2rem;
}

</style>

<!-- <?php if(!empty($banner)) { ?>
    <?php echo $banner['page_content'] ?>
<?php } ?> -->

<main role="main">
    <div class="jumbotron jumbotron-fluid text-white banner">
        <div class="container h-100 d-flex flex-column justify-content-center text-center">
            <h1 class="display-1">ABOUT US01</h1>
            <h2 class="display-4">TACC DESIGN STUDIO</h2>
        </div>
    </div>
</main>


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
                    <a class="category_btn <?php if ($this->uri->segment(1)=="about") {echo "active";} ?>" href="/about">
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






