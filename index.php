<?php
require('connection.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Play & Earn</title>
    <?php require('include/links.php') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <style>

        p{
          font-size: 20px;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
          .availability-form{
             margin-top: -50px;
             z-index: 2;
             position: relative;
          }
          @media  screen and (max-width: 575px)  {
            .availability-form{
                margin-top: 25px;
                padding: 0 35px;
              }
          }
    </style>
  </head>
<body class="bg-light ">
<?php
       require('include/header.php')
  ?>
   <div class='card m-4 border-0 shadow p-4'>

  <?php
    if(isset($_SESSION['login']) && $_SESSION['login']==true)
    {

     echo " <h2 class='text-center' style=' margin-top: 5%;'> Welcome to Play & Earn - $_SESSION[name] </h2>";


    $query = "SELECT * FROM `users` WHERE `name`='$_SESSION[name]'";
    $result=mysqli_query($con, $query);
    $result_fetch=mysqli_fetch_assoc($result);

    echo "
    <div class='container p-4'><h3 class='text-center'>Your Referall Code: $result_fetch[referral_code]</h3>
    <h3 class='text-center'>You Referred By: $result_fetch[referred_by]</h3>
    <h3 class='text-center'>Your Referall Points: $result_fetch[referral_point]</h3>
    <h3 class='text-center'>
    Your Referall Link: <a class='text-white bg-danger link-primary btn  text-decoration-none' id='btn-referral'  href='http://127.0.0.1/admin_app/trackify/play_earn/index.php?refer=$result_fetch[referral_code]'>Link</a>
    </h3>
    </div>
    <div class='d-flex col-md-12 p-4'>
    <input class='col-md-8 col-6 me-2 text-center' type='text' value='http://127.0.0.1/admin_app/trackify/index.php?refer=$result_fetch[referral_code]' id='myInput'>
    <button class='col-md-4 col-6 me-1 btn text-danger shadow border' onclick='myFunction()'>Copy Link</button>
  </div>
    ";
  }

  ?>

      <div class="container align-items-center p-4" >
          <h3 class="text-center p-1 fw-500" >Play &amp; Earn पर गेम खेलकर आप एक sizable income कमा सकते हैं।</h3>
          <div class="row">
               <div class="col-md-2">
                    <figure class=" alignleft size-large is-resized is-style-default"><img src="https://letsplayearn.com/wp-content/uploads/2022/09/Untitled-design-3-341x1024.png" alt="" class="wp-image-82" width="133" height="400" srcset="https://letsplayearn.com/wp-content/uploads/2022/09/Untitled-design-3-341x1024.png 341w, https://letsplayearn.com/wp-content/uploads/2022/09/Untitled-design-3-100x300.png 100w, https://letsplayearn.com/wp-content/uploads/2022/09/Untitled-design-3.png 400w" sizes="(max-width: 133px) 100vw, 133px" /></figure>
               </div>
               <div class="col-md-10">
                   <p class="text-center pt-4 pb-2">यहां आपको registration, game खेलने के लिए या किसी भी तरह का कोई पैसा लगाने की जरूरत नहीं है, न ही आपको कोई Hard work करना होगा।</p>
                   <p class="text-center pb-2">आपको बस Play &amp; earn Platform पर आना है और game खेलकर पैसे कमा सकते हैं।</p>
                   <p class="text-center text-color pb-2" style="color:#da0000">इस service से जुड़ने के लिए सामान्य <strong>नियम और शर्ते</strong> हैं। Smooth Operation के लिए खिलाड़ियों को इन्हें ध्यानपूर्वक पढ़कर समझ लेना हैं।</p>
                   <div class="row align-items-center">
                         <div class="col-md-6 pe-0">
                          <button class='btn btn-primary color-white w-50' type='button' data-bs-toggle='modal' data-bs-target='#loginModal'>LOGIN</button>
                         </div>
                         <div class="col-md-6 pl-0">
                          <button class='btn btn-dark color-white w-50' type='button' data-bs-toggle='modal' data-bs-target='#registerModal'>REGISTER</button>
                         </div>

                    </div>
                </div>
          </div>
          <p>हर वह व्यक्ति जिसके पास Smartphone है और वे उस पर game खेल सकते हैं, Play &amp; Earn Program से जुड़कर एक अच्छा income कर सकते हैं, चाहे आप working person, housewife, student, या किसी भी profession मे काम कर रहे हो तो भी आप इसमे जुड़ सकते है।  </p>
          <p><strong>1.</strong> जुड़ने वाले खिलाड़ियों को इस पूरे document को ध्यानपूर्वक पढ़कर checkbox पर click करके registration के लिए I agree पर click करके आगे बढ़ना है।</p>



          <p><strong>2.</strong> Registration प्रक्रिया पूरी कर चुके उम्मीदवारों को हमारे team की तरफ से confirmation call आएगा जिसमें उनसे registration के समय भरी गई सारी जानकारियों का verification किया जाएगा।</p>



          <p><strong>3.</strong> Verification की प्रक्रिया पूरी हो जाने के बाद खिलाड़ियों को हमारे Trakyfi App के लिए उनका credentials (unique ID) दिया जाएगा। Trakyfi हमारा Daily Work Tracker App है।</p>



          <p><strong>4.</strong> हर खिलाडी Play &amp; earn के Trackyfi Platform पर अपने unique ID से ही game खेल पाएंगे। </p>



          <p><strong>5.</strong> Working Hour लगभग 3 से 5 घंटे का ही होगा। यह 100% flexible होगा, खिलाड़ी 24 घंटे में कभी भी 1 दिन के दिए गए task को पूरा कर सकता है।</p>



          <p><strong>6.</strong> सभी खिलाड़ियों को प्रतिदिन&nbsp; Trackyfi App पर login करना होगा । यह mandatory होगा। बिना login किए आप काम नहीं कर पाएंगे।</p>



          <p><strong>7. </strong>सभी खिलाड़ी प्रतिदिन का काम और earning Trackyfi app पर देख सकेंगे।</p>



          <p><strong>8.</strong> हर खिलाड़ी उनका पूरे महीने के काम का Payout अगले महीने की 10 तारीख को Withdraw कर पाएंगे। उदाहरण के तौर पर, september महीने मे किया हुए काम का Payout आप October की 10 तारीख को ही withdraw कर पाएंगे। </p>



          <p><strong>9. </strong>हर खिलाड़ी को अपना bank account detail add करना जरूरी होगा और kYC (pan card, Aadhar card) का procedure भी करना जरूरी है। ये दो procedure  किए बगैर कोई भी खिलाड़ी withdraw नहीं कर पाएंगे। </p>



          <p><strong>10.</strong> सभी खिलाड़ियों को समय-समय पर &#8216;Play &amp; Earn&#8217; के द्वारा offer किए गए campaigns और events में भाग लेना होगा। खिलाड़ियों को इसके लिए निर्धारित benefits भी प्राप्त होगें।</p>



          <p><strong>11.</strong> इस पूरी प्रक्रिया के विस्तार से जानकारी के लिए आप नीची दिए गए Vidoe link पर click करके हमारा पूरा वीडियो देख सकते हैं।</p>



          <figure ><div class="embed-responsive embed-responsive-16by9">
         <iframe class="embed-responsive-item" loading="lazy" title="Game खेलकर पैसे कैसे कमाए - महीने के 4000" src="https://www.youtube.com/embed/RhGjpTV5FDg?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
          </figure>



          <h2 class="has-text-color" style="color:#db0000;font-size:18px"><strong>Terms and Conditions*</strong></h2>



          <p>इस service से जुड़ने के लिए सामान्य नियम और शर्ते हैं नीचे दी गयी है। Smooth Operation के लिए हरेक खिलाड़ियों को इन्हें ध्यानपूर्वक पढ़ना है।</p>



          <p>1. TDS और दूसरे कोई भी applicable government taxes बाद किए जाएंगे। </p>



          <p>2. किसी भी तरह के विवाद आदि की स्थिति में सिर्फ Play &amp; Earn authority के पास ही desicions लेने का अधिकार होगा।</p>



          <p>3. यह खिलाड़ियों की जिम्मेदारी है कि रजिस्ट्रेशन के समय खिलाड़ियों के द्वारा दी गई सारी जानकारी सही हो। भविष्य में किसी भी तरह की गलत जानकारी के संबंधित कोई विवाद स्वीकार्य नहीं होगा।</p>



          <p>4. Play &amp; Earn के पास एकाधिकार है कि वह किसी भी खिलाड़ी को कभी भी disqualify कर सकता है और इसके लिए Play &amp; Earn किसी भी व्यक्ति, Structure और department को कोई verbal या written clarification देने के लिए बाध्य नहीं है।</p>



          <p>5. किसी तरह के support की आवश्यकता होने पर खिलाड़ी हमारे prescribed form का इस्तेमाल करके query raise करेंगे और हमारे customer support द्वारा उन्हें support  प्रदान की जाएगी।</p>



          <p>6. खिलाड़ियों को सिर्फ अपने referral के rewards मिलेंगे। उनके referrals द्वारा किए गए referrals का उन्हें कोई लाभ नहीं मिलेगा।</p>



          <p>7. इस concept में कोई MLM, Ponzi Scheme, या अन्य किसी तरह की level marketing involved नहीं है।</p>



          <p>8. कोई भी खिलाड़ी जॉइन होने के बाद पहले 7 दिन की ट्रैनिंग लेगा। ये ट्रैनिंग पूरा करना अनिवार्य है और इस ट्रैनिंग के 7 दिनों का कोई payout  नहीं होगा। </p>



          <p>9. खिलाड़ियों को उनका referral reward उनके referrals के पहले payout cycle यानी payment हो जाने के बाद प्राप्त होगा।</p>



          <p>10. हर कोई खिलाड़ी आपने Referral rewards को  हर महीने की 15 तारीख को ही withdraw कर पाएगा। उदाहरण के तौर पर, september महीने मे किया हुए referral का Payout आप October की 15  तारीख को ही withdraw कर पाएंगे।</p>


              <div class="row align-items-center">
                   <div class="col-md-2 p-4 "></div>
                   <div class="col-md-4 p-4 ">
                     <a class="btn btn-light text-white shadow-none" href="https://forms.gle/QAUMpmdeoufAkJ3t5" style="background-color:#e60000">Register</a>
                   </div>
                   <div class="col-md-4 p-4">
                       <a class="btn btn-light text-white shadow-none" href="https://forms.gle/QAUMpmdeoufAkJ3t5" style="background-color:#de0000">Book A Call</a>
                   </div>
                   <div class="col-md-2 p-4 "></div>
             </div>


        </div>


          </div>




    <script>
      //script for Copy link
    function myFunction() {

      var copyText = document.getElementById('myInput');


      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices


      navigator.clipboard.writeText(copyText.value);


      alert('Your Referral Link Copied Successfully!');
    }
    </script>
  <script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
  </script>


<?php

if(isset($_GET['refer']) && $_GET['refer']!='')
{
  if(!(isset($_SESSION['login']) && $_SESSION['login']==true))
  {
    $query="SELECT * FROM `users` WHERE `referral_code`='$_GET[refer]'";
    $result=mysqli_query($con, $query);
    if(mysqli_num_rows($result)==1)
    {
      echo
      "<script>
          document.getElementById('refercode').value='$_GET[refer]';
          popup('register-popup');
      </script>";
    }
    else
    {
      echo "<script>alert('Invalid Referral Code');</script>";
    }
  }
}

?>
</div>



  <?php
          include('include/footer.php')
  ?>


</body>
</html>