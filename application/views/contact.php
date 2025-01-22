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
    <div class="card-body position-relative z-2 py-5">
        <form class="mx-auto" style="max-width: 800px;">
            <h2 class="h1 card-title text-center pb-4">聯絡我們</h2>
            <div class="row g-4">
                <div class="col-sm-6">
                    <label class="form-label fs-base" for="name">姓名</label>
                    <input class="form-control form-control-lg" type="text" placeholder="你的姓名" required="" id="name">
                </div>
                <div class="col-sm-6">
                    <label class="form-label fs-base" for="company">公司</label>
                    <input class="form-control form-control-lg" type="text" placeholder="公司名稱" id="company">
                </div>
                <div class="col-sm-6">
                    <label class="form-label fs-base" for="email">電子信箱</label>
                    <input class="form-control form-control-lg" type="email" placeholder="信箱地址" required="" id="email">
                </div>
                <div class="col-sm-6">
                    <label class="form-label fs-base" for="phone">手機</label>
                    <input class="form-control form-control-lg" type="text" placeholder="手機號碼" id="phone">
                </div>
                <div class="col-sm-12">
                    <label class="form-label fs-base" for="message">有什麼我們幫忙的嗎?</label>
                    <textarea class="form-control form-control-lg" rows="6" placeholder="輸入您的訊息..." required="" id="message"></textarea>
                </div>
                
                <div class="col-sm-12 text-center pt-4">
                    <button class="btn btn-lg btn-light" type="submit">送出</button>
                </div>
            </div>
        </form>
    </div>
</div>

