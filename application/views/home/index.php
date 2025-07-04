<?php if(!empty($banner)) { ?>
<!-- <div class="center slider">
    <?php foreach($banner as $data) { ?>
    <div>
        <a href="<?php echo $data['banner_link'] ?>" title="<?php echo $data['banner_name'] ?>" target="_new">
            <img src="/assets/uploads/<?php echo $data['banner_image'] ?>" alt="<?php echo $data['banner_name'] ?>" style="width: auto; margin: 0 auto;">
        </a>
    </div>
    <?php } ?>

    <?php foreach($banner as $data) { ?>
    <div>
        <a href="<?php echo $data['banner_link'] ?>" title="<?php echo $data['banner_name'] ?>" target="_new">
            <img src="/assets/uploads/<?php echo $data['banner_image'] ?>" alt="<?php echo $data['banner_name'] ?>" style="width: auto; margin: 0 auto;">
        </a>
    </div>
    <?php } ?>
</div> -->
<?php } ?>

<style>
    .carousel-inner
    .carousel-item {
        height: auto;
        margin-bottom: 50px;
    }
    
    .carousel-item {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .carousel-caption {
        position:absolute;right:15%;
        bottom:1.25rem;left:15%;
        padding-top:1.25rem;
        padding-bottom:1.25rem;
        color:#fff;text-align:center
    }
    .carousel-dark 
    .carousel-control-next-icon,
    .carousel-dark 
    .carousel-control-prev-icon {
    filter:invert(1) grayscale(100)
    }
    .carousel-dark 
    .carousel-indicators [data-bs-target] {
    background-color:#000
    }
    /* .carousel-dark
    .carousel-caption {
    color:#000
    } */
    /* @-webkit-keyframes spinner-border { */
    /* to{transform:rotate(360deg)}
    } */
    .row {
    --bs-gutter-x: 5rem;
    }        
    .col-lg-4 h2 
    .bd-placeholder-img {
        text-align: center;
        text-emphasis: none;
        text-decoration: dashed;
        display: block;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        text-align: center;
        text-emphasis: none;
        text-decoration: dashed;
        display: block;
        border-radius: 15px;
    }

    @media (max-width: 576px) {
        .carousel-caption h1 {
            font-size: 1.5rem;
        }
        .carousel-caption p {
            font-size: 0.9rem;
            padding:0 10px;
        }
    }

    </style>


    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators" >
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="home-db-carousel1" src="/assets/images/home_backgrand_photo1.jpg" alt="carousel1" width="100%" height="100%">          
            <div class="container">
            <div class="carousel-caption text-start" >
                <h1>Demo1</h1>
                <p>Some representative placeholder content for the first slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
            </div>
            </div>
        </div>
        <div class="carousel-item">
        <img class="home-db-carousel2" src="/assets/images/home_backgrand_photo2.jpg" alt="carousel2" width="100%" height="100%">
            <div class="container">
            <div class="carousel-caption">
                <h1>Demo2</h1>
                <p>Some representative placeholder content for the second slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
            </div>
            </div>
        </div>
        <div class="carousel-item">
        <img class="home-db-carousel3" src="/assets/images/home_backgrand_photo3.jpg" alt="carousel3" width="100%" height="100%">
            <div class="container">
            <div class="carousel-caption text-end">
                <h1>Demo3</h1>
                <p>Some representative placeholder content for the third slide of this carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
            </div>
            </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row" >
        <div class="col-md-6 col-lg-4 mb-4">
            <img  src="/assets/images/round-icons-05.png" alt="round-icons-05" class="img-fluid rounded-circle" width="140" height="140"></img>

            <!-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="/assets/images/round-icons-03.png" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> -->

            <h2>Heading</h2>
            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
            <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <img src="/assets/images/round-icons-06.png" alt="round-icons-06" class="img-fluid rounded-circle" width="140" height="140"></img>

            <!-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="/assets/images/round-icons-02.png" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> -->

            <h2>Heading</h2>
            <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
            <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-md-6 col-lg-4 mb-4">
            <img src="/assets/images/round-icons-07.png" alt="round-icons-07" class="img-fluid rounded-circle" width="140" height="140"></img>

            <!-- <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="/assets/images/round-icons-01.png" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg> -->

            <h2>Heading</h2>
            <p>And lastly this, the third column of representative placeholder content.</p>
            <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
        </div>
        <div class="col-md-5">
            <img src="/assets/images/alexander-shatov-01.jpg" alt="alexander-shatov-01" class="bd-placeholder-img" width="500" height="500"></img>
        <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> -->
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="/assets/images/alexander-shatov-02.jpg" alt="alexander-shatov-02" class="bd-placeholder-img" width="500" height="500"></img>
            <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> -->

        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
    </div>
    <div class="col-md-5">
        <img src="/assets/images/alexander-shatov-03.jpg" alt="alexander-shatov-03" class="bd-placeholder-img" width="500" height="500"></img>

        <!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> -->

    </div>
    </div>

    <hr class="featurette-divider">


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

