<?php
    include_once 'header.php';

?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg dichvu">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <!-- <p>Get 24/7 Support</p> -->
                    <h1></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h2>Bạn có câu hỏi nào không?</h2>
                    <p>Đừng ngần ngại gửi câu hỏi cho chúng tôi, chúng tôi sẽ trả lời bạn sớm nhất có thể! </p>
                </div>
                <div id="form_status"></div>
                <div class="contact-form">
                    <form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );"
                        action="actions/send_email.php">
                        <p>
                            <input type="text" placeholder="Tên" name="name" id="name">
                            <input type="email" placeholder="Email" name="email" id="email">
                        </p>
                        <p>
                            <input type="tel" placeholder="Số điện thoại" name="phone" id="phone">
                            <input type="text" placeholder="Tiêu đề" name="subject" id="subject">
                        </p>
                        <p><textarea name="message" id="message" cols="30" rows="10" placeholder="Nội dung"></textarea>
                        </p>
                        <input type="hidden" name="token" value="FsWga4&@f6aw" />
                        <p><input type="submit" value="Gửi mail"></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    <div class="contact-form-box">
                        <h4><i class="fas fa-map"></i> Địa chỉ</h4>
                        <p>236, Đ. Lê Văn Sỹ <br> Phường 1, Tân Bình. <br> Tp.Hồ Chí Minh</p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Giờ hoạt động</h4>
                        <p>Thứ hai - Thứ sáu: 9 AM đến 9 PM <br> Thứ bảy: 10 AM to 7 PM </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Liên hệ</h4>
                        <p>Phone: +0987 457 151 <br> Email: pethomemart@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact form -->

<!-- find our location -->
<div class="find-location blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
            </div>
        </div>
    </div>
</div>
<!-- end find our location -->

<!-- google map section -->
<div class="embed-responsive embed-responsive-21by9">
    <iframe
        src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=đại học tài nguyên và môi trường tphcm&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
        class="embed-responsive-item"></iframe>
</div>
<!-- end google map section -->
<?php
    include_once 'footer.php';

?>