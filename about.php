


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
  font-family: Nunito, sans-serif;
}

.text-blk {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  line-height: 25px;
}

.responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: flex-start;
}

.responsive-container-block.bigContainer {
  padding-top: 10px;
  padding-right: 30px;
  padding-bottom: 10px;
  padding-left: 30px;
  background-image: url("https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb29.png");
  background-position-x: initial;
  background-position-y: initial;
  background-size: cover;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: initial;
  background-repeat-x: no-repeat;
  background-repeat-y: no-repeat;
}

.responsive-container-block.Container {
  max-width: 800px;
  flex-direction: column;
  align-items: center;
  padding-top: 20px;
  padding-right: 20px;
  padding-bottom: 20px;
  padding-left: 20px;
  margin-top: 150px;
  margin-right: auto;
  margin-bottom: 150px;
  margin-left: auto;
  background-color: white;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
}

.text-blk.heading {
  font-size: 36px;
  line-height: 45px;
  font-weight: 800;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 30px;
  margin-left: 0px;
}

.text-blk.subHeading {
  text-align: center;
  font-size: 18px;
  line-height: 26px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 60px;
  margin-left: 0px;
}

.socialIcon {
  width: 33px;
  height: 33px;
}

.social-icons-container {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
}

.social-icon {
  margin: 0 50px 0 50px;
}

.social-icon:hover {
  cursor: pointer;
}

@media (max-width: 768px) {
  .text-blk.heading {
    font-size: 55px;
    line-height: 65px;
  }

  .text-blk.subHeading {
    font-size: 18px;
    line-height: 24px;
  }

  .socialIcon {
    width: 20px;
    height: 20px;
  }

  .text-blk.subHeading {
    line-height: 27px;
  }

  .text-blk.heading {
    font-size: 32px;
    line-height: 40px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 20px;
    margin-left: 0px;
  }

  .social-icon {
    margin: 0 25px 0 25px;
  }
}

@media (max-width: 500px) {
  .responsive-container-block.bigContainer {
    padding-top: 10px;
    padding-right: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
  }

  .text-blk.heading {
    font-size: 45px;
    line-height: 55px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 20px;
    margin-left: 0px;
  }

  .text-blk.subHeading {
    font-size: 14px;
    line-height: 22px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 30px;
    margin-left: 0px;
  }

  .social-icons-container {
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
  }

  .text-blk.subHeading {
    font-size: 16px;
    line-height: 23px;
  }

  .text-blk.heading {
    font-size: 26px;
    line-height: 30px;
  }

  .social-icon {
    margin: 0 20px 0 20px;
  }
}
</style>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap');

*,
*:before,
*:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  margin: 0;
}

.wk-desk-1 {
  width: 8.333333%;
}

.wk-desk-2 {
  width: 16.666667%;
}

.wk-desk-3 {
  width: 25%;
}

.wk-desk-4 {
  width: 33.333333%;
}

.wk-desk-5 {
  width: 41.666667%;
}

.wk-desk-6 {
  width: 50%;
}

.wk-desk-7 {
  width: 58.333333%;
}

.wk-desk-8 {
  width: 66.666667%;
}

.wk-desk-9 {
  width: 75%;
}

.wk-desk-10 {
  width: 83.333333%;
}

.wk-desk-11 {
  width: 91.666667%;
}

.wk-desk-12 {
  width: 100%;
}

@media (max-width: 1024px) {
  .wk-ipadp-1 {
    width: 8.333333%;
  }

  .wk-ipadp-2 {
    width: 16.666667%;
  }

  .wk-ipadp-3 {
    width: 25%;
  }

  .wk-ipadp-4 {
    width: 33.333333%;
  }

  .wk-ipadp-5 {
    width: 41.666667%;
  }

  .wk-ipadp-6 {
    width: 50%;
  }

  .wk-ipadp-7 {
    width: 58.333333%;
  }

  .wk-ipadp-8 {
    width: 66.666667%;
  }

  .wk-ipadp-9 {
    width: 75%;
  }

  .wk-ipadp-10 {
    width: 83.333333%;
  }

  .wk-ipadp-11 {
    width: 91.666667%;
  }

  .wk-ipadp-12 {
    width: 100%;
  }
}

@media (max-width: 768px) {
  .wk-tab-1 {
    width: 8.333333%;
  }

  .wk-tab-2 {
    width: 16.666667%;
  }

  .wk-tab-3 {
    width: 25%;
  }

  .wk-tab-4 {
    width: 33.333333%;
  }

  .wk-tab-5 {
    width: 41.666667%;
  }

  .wk-tab-6 {
    width: 50%;
  }

  .wk-tab-7 {
    width: 58.333333%;
  }

  .wk-tab-8 {
    width: 66.666667%;
  }

  .wk-tab-9 {
    width: 75%;
  }

  .wk-tab-10 {
    width: 83.333333%;
  }

  .wk-tab-11 {
    width: 91.666667%;
  }

  .wk-tab-12 {
    width: 100%;
  }
}

@media (max-width: 500px) {
  .wk-mobile-1 {
    width: 8.333333%;
  }

  .wk-mobile-2 {
    width: 16.666667%;
  }

  .wk-mobile-3 {
    width: 25%;
  }

  .wk-mobile-4 {
    width: 33.333333%;
  }

  .wk-mobile-5 {
    width: 41.666667%;
  }

  .wk-mobile-6 {
    width: 50%;
  }

  .wk-mobile-7 {
    width: 58.333333%;
  }

  .wk-mobile-8 {
    width: 66.666667%;
  }

  .wk-mobile-9 {
    width: 75%;
  }

  .wk-mobile-10 {
    width: 83.333333%;
  }

  .wk-mobile-11 {
    width: 91.666667%;
  }

  .wk-mobile-12 {
    width: 100%;
  }
}
</style>
<body>
<div class="responsive-container-block bigContainer">
  <div class="responsive-container-block Container">
    <p class="text-blk heading" style="font-size: 36px; font-weight: bold; color: #333; text-align: center; margin-bottom: 20px;">
      About Us
    </p>
    <p class="text-blk subHeading" style="font-size: 16px; color: #666; text-align: center; margin-bottom: 30px;">
    Welcome to Velvet Vogue, where style meets sophistication. At Velvet Vogue, we believe that clothing is more than just fabric—it's an expression of individuality, confidence, and timeless elegance. Our curated collection of high-quality apparel is designed to celebrate every occasion, offering a perfect blend of classic trends and contemporary designs.

Whether you're looking for everyday essentials or show-stopping pieces, Velvet Vogue is your ultimate destination for unparalleled fashion. With a commitment to superior craftsmanship, sustainable practices, and exceptional customer service, we aim to make your shopping experience as luxurious as the clothes you wear.

Discover your style, redefine your wardrobe, and step into the world of Velvet Vogue—because you deserve nothing less than extraordinary.
    </p>
    <div class="social-icons-container" style="text-align: center; margin-bottom: 30px;">
      <a class="social-icon" style="margin: 0 10px;">
        <img class="socialIcon image-block" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb33.png" style="width: 40px; height: 40px;">
      </a>
      <a class="social-icon" style="margin: 0 10px;">
        <img class="socialIcon image-block" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb34.png" style="width: 40px; height: 40px;">
      </a>
      <a class="social-icon" style="margin: 0 10px;">
        <img class="socialIcon image-block" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb35.png" style="width: 40px; height: 40px;">
      </a>
      <a class="social-icon" style="margin: 0 10px;">
        <img class="socialIcon image-block" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/bb36.png" style="width: 40px; height: 40px;">
      </a>
    </div>

    <!-- Contact Us Form -->
    <div class="contact-form-container" style="background-color: #f4f4f4; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 0 auto;">
      <p class="text-blk heading" style="font-size: 28px; font-weight: bold; color: #333; text-align: center; margin-bottom: 20px;">
        Contact Us
      </p>
      <form action="process_form.php" method="POST" class="contact-form">
        <div class="form-group" style="margin-bottom: 20px;">
          <label for="name" style="font-size: 16px; font-weight: bold; color: #333; display: block; margin-bottom: 5px;">Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
          <label for="email" style="font-size: 16px; font-weight: bold; color: #333; display: block; margin-bottom: 5px;">Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
          <label for="message" style="font-size: 16px; font-weight: bold; color: #333; display: block; margin-bottom: 5px;">Message:</label>
          <textarea id="message" name="message" placeholder="Enter your message" rows="4" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;"></textarea>
        </div>
        <button type="submit" class="submit-button" style="background-color: #007bff; color: white; padding: 15px 30px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; width: 100%; transition: background-color 0.3s;">
          Submit
        </button>
      </form>
    </div>
  </div>
</div>

<!-- Inline CSS Explanation -->
<style>
  .submit-button:hover {
    background-color: #0056b3;
  }
</style>



</body>
</html>