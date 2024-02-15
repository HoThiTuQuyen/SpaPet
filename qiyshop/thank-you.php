<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
    <style>
    @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
    @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
    </style>
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
    <title>Thank You</title>
</head>

<body>
    <div class="thankyou-container">
        <div class="thankyou-content">
            <!-- <div class="loader">
              

            </div> -->
            <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
            <h1>Thanh toán thành công!</h1>
            <p>Cảm ơn bạn đã tin tưởng.</p>
            <p>Hẹn gặp lại.</p>
            <a href="index.php">Trang chủ</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
<style>
body {
    margin: auto;
    padding: auto;
    font-family: 'Arial', sans-serif;
    background-color: #fff;
}

.thankyou-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;

}

.thankyou-content {
    text-align: center;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
    position: relative;
    /* Thêm dòng này để có thể định vị loader bên trong */
}

.thankyou-content h1 {
    color: #2ecc71;
    font-size: 50px;
}

.thankyou-content p {
    font-size: 24px;
    margin-bottom: 20px;
}

.loader {
    position: relative;
    width: 80px;
    height: 80px;
    margin: 0 auto;
    /* Đảm bảo loader ở giữa */
    border-radius: 50%;
    border: 4px solid #3498db;
    border-top: 4px solid #2ecc71;
    animation: spin 1s linear infinite, tick 1s 1s forwards;
}

@keyframes spin {
    100% {
        transform: rotate(360deg);
    }
}

@keyframes tick {
    0% {
        opacity: 0;
        transform: scale(0);
    }

    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.thankyou-content a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.thankyou-content a:hover {
    background-color: #2980b9;
}
</style>

</html>