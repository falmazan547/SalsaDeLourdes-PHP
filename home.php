<?php include 'View/header_home.php'; ?>
<?php include 'View/Nav.php'; ?>

<div class="home-image">
    <div class="home-text">
        <h1 style="font-size: 9em;">Salsa De Lourdes</h1>
        
    </div>
</div>
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
        <form class="form" method="post" action="about.htm" style="margin:0px; padding: 10px 0px;">
            <input type="hidden" name="form_fieldlist" value="Primary_Name,Phone,Email,Comments">
            <input type="hidden" name="form_subject" value="New Salsa Message">
            <input type="hidden" name="form_thankyou" value="thankyou.htm">
            <input type="hidden" name="form_to" value="felipe.j.almazan@gmail.com">

            <div class="form-group">
                <div class="col-sm-6">
                    <div class="col-sm-12">
                        <label for="Primary_Name"><h4>Name</h4></label>
                        <input class="form-control" type="text" name="Primary_Name"  placeholder="Name *">
                    </div>
                    <div class="col-sm-12">
                        <label for="Phone"><h4>Phone #</h4></label>
                        <input class="form-control" type="text" name="Phone"  placeholder="Phone *">
                    </div>
                    <div class="col-sm-12">
                        <label for="Email"><h4>Email</h4></label>
                        <input class="form-control" type="text" name="Email"  placeholder="Email *">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-12" id="textarea">
                        <label for="Comments"><h4>Comments / Questions</h4></label>
                        <textarea class="form-control" name="Comments" rows="4" placeholder="Leave a Message"></textarea>
                        <div class="col-sm-12">
                            <br>
                            <input type="submit" class="btn btn-lg btn-success"  value="SUBMIT">
                        </div>
                    </div>
                </div>
                
                <br>
            </div>
        </form>    
    </div>
</div>

<?php include 'View/Footer.php'; ?>