<?php include '../View/Header.php'; ?>
<?php include '../View/Nav.php'; ?>

<div class="container">
    
    <div class="col-sm-12">
        <section id="about-text">
            <h1>What Is Salsa De Lourdes?</h1>
            <p>Salsa de Lourdes is a small company based out of Lincoln, Nebraska. Its roots runs further south from its home in Villa Juarez, San Luis of Mexico. Whether your home is in the Midwest or anywhere in the world, enjoy the taste of traditional Mexican salsa recipes. These recipes passed down from generation to generation are sure to treat all palates. </p> 
        </section>
    </div>
    <div class="col-sm-12">
        <h2>Get In Touch</h2>
        <p>When you are almost ready for your next order of Lourdes' Salsa, but you have some questions first, send us a message. We love to hear from our customers and look forward to speaking to each one of you soon!</p>
        <form method="post" action="about.htm" style="margin:0px; padding: 10px 0px;" onSubmit="return validation(this)">
            <input type="hidden" name="form_fieldlist" value="Primary_Name,Phone,Email,Comments">
            <input type="hidden" name="form_subject" value="Request a Quote Form">
            <input type="hidden" name="form_thankyou" value="thankyou.htm">
            <input type="hidden" name="form_to" value="felipe.j.almazan@gmail.com">

            <div id="formpage">
                <div class="formfield">
                    <input type="text" name="Primary_Name"  placeholder="Name *">
                </div>
                <div class="formfield">
                    <input type="text" name="Phone"  placeholder="Phone *">
                </div>
                <div class="formfield">
                    <input type="text" name="Email"  placeholder="Email *">
                </div>

                <div style="clear:both;"></div>

                <div class="formpage" id="textarea">
                    <p>Comments/Questions</p>
                    <textarea name="Comments" placeholder="Leave a Message"></textarea>
                </div>

                <div style="clear:both;"></div>


                <div style="clear:both;"></div>
                <input type="submit" class="button"  value="SUBMIT">
                <br>
            </div>
        </form>    
    </div>
</div>

<?php include '../View/Footer.php'; ?>