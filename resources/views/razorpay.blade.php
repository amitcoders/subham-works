<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Laravel 9 Razorpay Payment Gateway - Tutsmake.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<style>
.card-product .img-wrap {
border-radius: 3px 3px 0 0;
overflow: hidden;
position: relative;
height: 220px;
text-align: center;
}
.card-product .img-wrap img {
max-height: 100%;
max-width: 100%;
object-fit: cover;
}
.card-product .info-wrap {
overflow: hidden;
padding: 15px;
border-top: 1px solid #eee;
}
.card-product .bottom-wrap {
padding: 15px;
border-top: 1px solid #eee;
}
.label-rating { margin-right:10px;
color: #333;
display: inline-block;
vertical-align: middle;
}
.card-product .price-old {
color: #999;
}
</style>
</head>
<body>
<div class="container">
<br>  
<p class="text-center">More article on <a href="https://www.tutsmake.com/">Tutsmake.com</a></p>
<hr>
<div class="row">
<div class="col-md-4">
<figure class="card card-product">
<div class="img-wrap"><img src="//www.tutsmake.com/wp-content/uploads/2019/03/c05917807.png"></div>
<figcaption class="info-wrap">
<h4 class="title">Mouse</h4>
<p class="desc">Some small description goes here</p>
<div class="rating-wrap">
<div class="label-rating">132 reviews</div>
<div class="label-rating">154 orders </div>
</div>
<!-- rating-wrap.// -->
</figcaption>
<div class="bottom-wrap">
<a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="1000" data-id="1">Order Now</a> 
<div class="price-wrap h5">
<span class="price-new">₹1000</span> <del class="price-old">₹1200</del>
</div>
<!-- price-wrap.// -->
</div>
<!-- bottom-wrap.// -->
</figure>
</div>
<!-- col // -->
<div class="col-md-4">
<figure class="card card-product">
<div class="img-wrap"><img src="//www.tutsmake.com/wp-content/uploads/2019/03/vvjghg.png"> </div>
<figcaption class="info-wrap">
<h4 class="title">Sony Watch</h4>
<p class="desc">Some small description goes here</p>
<div class="rating-wrap">
<div class="label-rating">132 reviews</div>
<div class="label-rating">154 orders </div>
</div>
<!-- rating-wrap.// -->
</figcaption>
<div class="bottom-wrap">
<a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="1280" data-id="2">Order Now</a> 
<div class="price-wrap h5">
<span class="price-new">₹1280</span> <del class="price-old">₹1400</del>
</div>
<!-- price-wrap.// -->
</div>
<!-- bottom-wrap.// -->
</figure>
</div>
<!-- col // -->
<div class="col-md-4">
<figure class="card card-product">
<div class="img-wrap"><img src="//www.tutsmake.com/wp-content/uploads/2019/03/jhgjhgjg.jpg"></div>
<figcaption class="info-wrap">
<h4 class="title">Mobile</h4>
<p class="desc">Some small description goes here</p>
<div class="rating-wrap">
<div class="label-rating">132 reviews</div>
<div class="label-rating">154 orders </div>
</div>
<!-- rating-wrap.// -->
</figcaption>
<div class="bottom-wrap">
<a href="javascript:void(0)" class="btn btn-sm btn-primary float-right order_now" data-amount="1280" data-id="3">Order Now</a> 
<div class="price-wrap h5">
<span class="price-new">₹1500</span> <del class="price-old">₹1980</del>
</div>
<!-- price-wrap.// -->
</div>
<!-- bottom-wrap.// -->
</figure>
</div>
<!-- col // -->
</div>
<!-- row.// -->
</div>
<!--container.//-->
<br><br><br>
<article class="bg-secondary mb-3">
<div class="card-body text-center">
<h4 class="text-white">Welcome to Tutsmake.com<br>  </h4>
<p class="h5 text-white">Thank you for being here </p>
<br>
<p><a class="btn btn-warning" target="_blank" href="//tutsmake.com/"> Tutsmake.com  
<i class="fa fa-window-restore "></i></a>
</p>
</div>
<br><br><br>
</article>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var SITEURL = '{{URL::to('')}}';
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
}); 
$('body').on('click', '.buy_now', function(e){
var totalAmount = $(this).attr("data-amount");
var product_id =  $(this).attr("data-id");
var options = {
"key": "rzp_test_KveMgJFnfg5rFA",
"amount": (totalAmount*100), // 2000 paise = INR 20
"name": "Tutsmake",
"description": "Payment",
"image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
"handler": function (response){
window.location.href = SITEURL +'/'+ 'paysuccess?payment_id='+response.razorpay_payment_id+'&product_id='+product_id+'&amount='+totalAmount;
},
"prefill": {
"contact": '9988665544',
"email":   'amit@gmail.com',
},
"theme": {
"color": "#528FF0"
}
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
});
/*document.getElementsClass('buy_plan1').onclick = function(e){
rzp1.open();
e.preventDefault();
}*/
</script>
</body>
</html>