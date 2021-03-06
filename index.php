
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
       <!--Import jQuery Library-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!--Import materialize.js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />   
  <link rel="stylesheet" href="style.css">
</head>

    <body>
       <div class="navbar-fixed">
           <nav class="teal">
               <!-- <div class="container"> -->
                   <div class="nav-wrapper">
                       <a href="" class="brand-logo hide-on-med-and-down logo">Quezon City University</a>
                       <a href="" data-target="mobile-nav" class="sidenav-trigger">
                           <i class="material-icons">menu</i>

                       </a>
                       <img src="img/logo.jpg" style="height: 60px;" class="brand-logo center ">
                       <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="#Home">Home</a>
                        </li>
                        <li>
                            <a href="#About">About</a>
                        </li>
                        <li>
                            <a href="#Tuition">Tuition</a>
                        </li>
                        <li>
                            <a href="#Gallery">Gallery</a>
                        </li>
                        <li>
                            <a href="#Contact">Contact</a>
                        </li>
                        
                        <li>
                            <?php include("app/LoginButton.php");?>
                        </li>
                        
                      </ul>
                      
                    </div>
                    <!-- </div> -->
                      
           </nav>
       </div>

     <!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="pages/dashboardBS.php">Home</a></li>
  <li><a href="app/logout.php">Logout</a></li>
</ul>

       <ul class="sidenav center" id="mobile-nav">
           <li class="brand-logo  center teal"><img src="img/qcu9.png" alt="" style="height: 60px; width: auto; margin-top: 5%;"><p class=" center">Quezon City University</p></li>
     
           <li>
            <a href="#Home">Home</a>
        </li>
        <li>
            <a href="#About">About</a>
        </li>
        <li>
            <a href="#Tuition">Tuition</a>
        </li>
        <li>
            <a href="#Gallery">Gallery</a>
        </li>
        <li>
            <a href="#Contact">Contact</a>
        </li>
        <li>
       
        </li>
      </ul>

 <!-- slider -->

 <div class="slider">
    <ul class="slides">
       <li>
        <img src="img/background.jpg" class="image1"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h1><a href="/pages/dashboardBS.html">  CLICK ME!></h1></a>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li> 
      <li>
        <img src="img/bgq1.png" class="image1"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="img/qcu9.png" class="image1"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="img/qcu9.png" class="image1"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
  </div>
<!-- Search BAr
 -->

<div id="search" class="section section-search teal darken-1 white-text center scrollspy">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3>Search Destinations</h3>
                <div class="input-field">
                    <input type="text" class="white grey-text autocomplete left" id="autocomplete-input" placeholder="Search Branches">

                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ICONS boxes  -->
<div class="section section-icons grey lighten-4 center">
    <div class="container">
        <div class="row">
            <div class="col s12 m4">
                <div class="card-panel">
                    <i class="material-icons large teal-text">room </i>
                        <h4>Pick Where</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, cumque?</p>
                   
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card-panel">
                    <i class="material-icons large teal-text">room </i>
                        <h4>Pick Where</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, cumque?</p>
                   
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card-panel">
                    <i class="material-icons large teal-text">room </i>
                        <h4>Pick Where</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, cumque?</p>
                   
                </div>
            </div>
          
         
        </div>
    </div>
</div>
<!-- Popular Places -->

<div id="popular" class="section section-popilar scrollspy">
    <div class="container">
        <div class="row">
            <h4 class="center">
                <span class="teal-text">Popular </span>Places</h4>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/qcu4.jpg" alt="">
                            <span class="card-title">TITLE HERE!</span>
                        </div>
                        <div class="card-content">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam, deleniti.
                            
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/qcu4.jpg" alt="">
                            <span class="card-title">TITLE HERE!</span>
                        </div>
                        <div class="card-content">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam, deleniti.
                            
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/qcu4.jpg" alt="">
                            <span class="card-title">TITLE HERE!</span>
                        </div>
                        <div class="card-content">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam, deleniti.
                            
                        </div>
                    </div>
                </div>
             

           
        
    </div>
</div>



<!-- Gallery -->

<div id="gallery" class="section section-gallery scrollspy">
    <div class="container">
        <h4 class="center">
            <span class="teal-text">Photo</span>Gallery
        </h4>
        <div class="row">
            <div class="col s12 m3">
                <div class="car-image">
                <img src="https://source.unsplash.com/collection/190727/daily"alt="" class="materialboxed responsive-img">
                </div>
            </div>
            <div class="col s12 m3">
                <div class="car-image">
                <img src="https://source.unsplash.com/collection/190727/jump"alt="" class="materialboxed responsive-img">
                </div>
            </div>
            <div class="col s12 m3">
                <div class="car-image">
                <img src="https://source.unsplash.com/collection/190727/computer"alt="" class="materialboxed responsive-img">
                </div>
            </div>
            <div class="col s12 m3">
                <div class="car-image">
                <img src="https://source.unsplash.com/collection/190727/what"alt="" class="materialboxed responsive-img">
                </div>
            </div>
            
        </div>
    </div>
   
</div>


<!-- CONTACT US -->


<div id="contact" class="section section-contact scrollspy">
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class="card-panel teal white-text center">
                    <i class="material-icons fa-4x">email</i>
                    <h4>Contact Us For Booking</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam, quasi</p>
                    <li ><h4>Location</h4></li>
                    <li >Quezon City </li>
                    <li >Bagong Silang</li>
                </div>
                <!-- <ul class="collecion-with-header center teal white-text">
                    <li class="collection-header"><h4>Location</h4></li>
                    <li class="collection-item">Quezon City </li>
                    <li class="collectionitem">Bagong Silang</li>
                </ul> -->
            </div>
            <div class="col s12 m6">
                <div class="card-panel grey lighten-3">
                    <h5>Please Fill out Form</h5>
                    <div class="input-field">
                        <input type="text" placeholder="Name">
                        
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Name">
                        
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Name">
                        
                    </div>
                    <div class="input-field">
                        <textarea class="materialize-textarea" name="" id="" cols="50" rows="30" placeholder="Enter Message"></textarea>
                        
                    </div>
                    <input type="submit" value="Submit" class="btn">
                </div>
            </div>
        </div>
    </div>
</div>

<!--TAPTARGET  -->

  <div class="fixed-action-btn direction-top ">
      
     <a id="menu" class="waves-effect waves-light btn btn-floating clickme ">OK</a>
  </div>
  
  <!-- Tap Target Structure -->
  <div class="tap-target" data-target="menu">
    <div class="tap-target-content">
      <h5>Title</h5>
      <p>A bunch of text</p>
      
    </div>
    
    </div>
  
<!-- COPYRIGHT -->

<div class="section section-follow teal darken-2 white-text">
    <div class="container center">
        <div class="row">
            <div class="col s12">
                <h4>Vincent Fernandez &COPY; 2021</h4>
                <p>Follow me On Github for Special Website Offers</p>
                <a href="#" class="white-text">
                    <i class="fab fa-facebook fa-4x"></i>
                </a>
                <a href="#" class="white-text">
                    <i class="fab fa-github fa-4x"></i>
                </a>
                <a href="#" class="white-text">
                    <i class="fab fa-linkedin fa-4x"></i>
                </a>
                <a href="#" class="white-text">
                    <i class="fab fa-google fa-4x"></i>
                </a>
            </div>
        </div>
    </div>
</div>
      <!--JavaScript at end of body for optimized loading-->
     </script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
       <script>

         const value = 1;
            
           //sidenav
           const sideNav = document.querySelector('.sidenav');
           M.Sidenav.init(sideNav, {});
        // slider
           const slider = document.querySelector('.slider');
           M.Slider.init(slider , {
               indicators: false,
               height: 500,
               transition: 500,
               interval: 6000
           });

        const ac = document.querySelector('.autocomplete');
        M.Autocomplete.init(ac, {
            data: {
                "Batasan": null,
                "Novaliches" : null,
                "San Francisco" : null
            }
        });
        // MATERIAL BOX
        const mb = document.querySelectorAll(".materialboxed");
        M.Materialbox.init(mb, {});
        // ScrollSpy
        const ss = document.querySelectorAll('.scrollspy');
        M.ScrollSpy.init(ss, {});

        $(document).ready(function () {
  $('.tap-target').tapTarget()
  
  $('.clickme').click('onclick', function() {
     $('.tap-target').tapTarget('open');
   
   
     
  })  
});


$(document).ready(function(){
   $('.modal').modal();
   $('.dropdown-trigger').dropdown({
       coverTrigger: false
   });
});
       </script>    
    </body>
  </html>
        