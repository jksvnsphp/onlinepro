<!-----------subcription start------------>

<section id="subcs">
<form action="">
  <div class="container">
    <div class="row">
   
      <div class="form-group">
       <div id="news" align="center">  </div>
        <div class="input-group col-md-4 m1 col-xs-12 col-sm-4">
          <input type="text" value="" class="form-control" name="name" id="name" placeholder="Your Name">
        </div>
        <div class="input-group col-md-4 m1 col-xs-12 col-sm-4">
          <input type="email" value="" class="form-control" name="email" id="email" placeholder="Your Email">
        </div>
        <div class="input-group col-md-4 m1 col-xs-12 col-sm-4">
    
          <button class="add  sub-btn form-control" onclick="newsletter()" type="button">Subscribe for Newsletter</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>
</section>

<!-----------Footer Offer--------------->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 f1">
        <h2>Welcome</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-3 col-xs-6 f2">
            <h2>Company</h2>
            <ul>
              <li><a href="#">Home </a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us </a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Deals</a></li>
              <li><a href="#">Advertise with us</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-xs-6 f3">
            <h2> Popular Restaurants</h2>
            <ul>
              <li><a href="#">Ghazal Chandigarh</a></li>
              <li><a href="#">Sindhi Sweets</a></li>
              <li><a href="#">Girl in the Cafe </a></li>
              <li><a href="#">Subway </a></li>
              <li><a href="#">Gourmet nine</a></li>
              <li><a href="#">Food Junction</a></li>
              <li><a href="#">The Lion'z Bar </a></li>
            </ul>
          </div>
          <div class="col-md-3 col-xs-6 f3">
            <h2>Cities</h2>
            <ul>
              <li><a href="#">Sector-17</a></li>
              <li><a href="#">Sector-22</a></li>
              <li><a href="#">Sector-35</a></li>
              <li><a href="#">Sector-43</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-xs-6 f3">
            <h2>Cities</h2>
            <ul>
              <li><a href="#">20% Off on Food Bill</a></li>
              <li><a href="#">30% Off on Food  Bill</a></li>
              <li><a href="#">40% Off on Food  Bill</a></li>
              <li><a href="#">50% Off on Food  Bill</a></li>
              <li><a href="#">Gift Vouchers </a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-12 text-center">
        <div class="social"> <a href="#"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a> <a href="#"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a> <a href="#"><i id="social-gp" class="fa fa-instagram fa-3x social"></i></a> <a href="#"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a> <a href="#"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a> </div>
      </div>
    </div>
  </div>
  <section id="footer2">
    <h3>@2016 Burpbig Media All Rights Reserved. Terms & Condition | Privacy Policy</h3>
  </section>
</footer>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script src="<?php echo base_url(); ?>common/front/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>common/front/js/custom.js"></script>

<script>
function newsletter() {
var name = document.getElementById("name").value;
var email = document.getElementById("email").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name1=' + name + '&email1=' + email;
if (name == '' || email == '' ) {
$('#news').html("<div style=color:#C30>Name and email required!</div>");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "<?php echo base_url('newsletter/add');?>",
data: dataString,
cache: false,
success: function(result) {
$('#news').html(result);

}
});
document.getElementById("name").value='';
document.getElementById("email").value='';
}
return false;
}
</script>
</body>
</html>