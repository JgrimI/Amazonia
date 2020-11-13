<?php
if(isset($_POST['upload'])){

}
?>
<style>
    .navbar-default .navbar-nav>.books>a,
    .navbar-default .navbar-nav>.books>a:hover,
    .navbar-default .navbar-nav>.books>a:focus {
        color: #ff7236;
        background-color: transparent;
    }
    .select-styled {
         display: none;
        }
</style>
<script>
    window.onload=function(){
        $(".dc").select2();
        dropify = $('.dropify').dropify();
    };
  function changer(val){
      var div=''
      if(val=='book'){
          div='<p class="form-row form-row-first input-required">'+
                '<label>'+
                    '<span class="first-letter">Number of pages</span>'+
                    '<span class="second-letter">*</span>'+
                '</label>'+
                '<input type="text" id="numPages" name="numPages" class="input-text">'+
            '</p>'+
            '<p class="form-row form-row-first input-required">'+
                '<label>'+
                    '<span class="first-letter">ISBN</span>'+
                    '<span class="second-letter">*</span>'+
                '</label>'+
                '<input type="text" id="isbn" name="isbn" class="input-text">'+
            '</p>';
      }else if(val=='presentation'){
          div='<p class="form-row form-row-first input-required">'+
                '<label>'+
                    '<span class="first-letter">Congress Name</span>'+
                    '<span class="second-letter">*</span>'+
                '</label>'+
                '<input type="text" id="congress" name="congress" class="input-text">'+
            '</p>'+
            '<p class="form-row form-row-first input-required">'+
                '<label>'+
                    '<span class="first-letter">ISBN</span>'+
                    '<span class="second-letter">*</span>'+
                '</label>'+
                '<input type="text" id="isbn" name="isbn" class="input-text">'+
            '</p>';
      }else if(val=='sa'){
          div='<p class="form-row form-row-first input-required">'+
                '<label>'+
                    '<span class="first-letter">SSN</span>'+
                    '<span class="second-letter">*</span>'+
                '</label>'+
                '<input type="text" id="ssn" name="ssn" class="input-text">'+
            '</p>';
      }
      $("#changer").html(div);
      console.log(val+' entra');
  }
</script>
<!-- Start: Page Banner -->
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>New Book</h2>
            <span class="underline center"></span>
            <p class="lead"></p>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="?menu=home">Home</a></li>
                <li><a href="?menu=books">Books & Media</a></li>
                <li>Register New Book</li>
            </ul>
        </div>
    </div>
</section>
<!-- End: Page Banner -->
<!-- Start: Cart Section -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="signin-main">
                <div class="container">
                    <div class="woocommerce">
                        <div class="woocommerce-login">
                            <div class="company-info signin-register">
                                <div class="col-md-12 new-user" style="border: 20px solid #f4f4f4;">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="text-center" style="margin: 80px -40px 80px 40px;">
                                                <div class="company-detail new-account bg-light ">
                                                    <div class="new-user-head">
                                                        <h2>Register New Book</h2>
                                                        <br>
                                                    </div>
                                                    <form class="login" method="post">
                                                        <p class="form-row form-row-first input-required">
                                                            <label>
                                                                <span class="first-letter">Title</span>
                                                                <span class="second-letter">*</span>
                                                            </label>
                                                            <input type="text" id="name" name="name" class="input-text">
                                                        </p>
                                                        <p class="form-row form-row-first input-required">
                                                            <label>
                                                                <span class="first-letter">Editorial</span>
                                                                <span class="second-letter">*</span>
                                                            </label>
                                                            <input type="text" id="name" name="name" class="input-text">
                                                        </p>
                                                        <p class="form-row form-row-first input-required">
                                                            <label>
                                                                <span class="first-letter">Authors</span>
                                                                <span class="second-letter">*</span>
                                                            </label>
                                                            <input type="text" id="name" name="name" class="input-text">
                                                        </p>
                                                        <p>
                                                            <label>
                                                                <span class="first-letter">Date published</span>
                                                                <span class="second-letter">*</span>
                                                            </label>
                                                            <input type="date" id="name" name="name" style="background-color: #fff; border-color: #F4F4F4;">
                                                        </p>
                                                        <label style="color:grey;" style="text-align:left;">Description*</label>
                                                        <textarea style="width:100%;" rows="5">
                                                        </textarea>
                                                        <br><br>
                                                        <label style="color:grey;">Type Document*</label>
                                                        <select id="dc" name="dc" class="dc" style="width:100%;" required onchange="changer(this.value)">
                                                            <option value="">Choose one</option>
                                                            <option value="book">Book</option>
                                                            <option value="sa">Science article</option>
                                                            <option value="presentation">Presentation</option>
                                                        </select><br><br>
                                                        <label style="color:grey;" style="margin-top:10%;">Photo*</label>
                                                        <p class="form-row input-required">
                                                            <input type="file" class="form-control-file dropify" name="photo" id="photo" accept=".png" data-allowed-file-extensions="png" required>
                                                        </p>
                                                        <div id="changer">
                                                            
                                                        </div>
                                                        <div class="clear"></div>
                                                        <button type="submit" name="upload" id="upload" class="button btn btn-default">Upload <i class="fa fa-upload"></i></button>
                                                        <div class="clear"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- End: Cart Section -->

<!-- Start: Social Network -->
<section class="social-network section-padding">
</section>
<!-- End: Social Network -->