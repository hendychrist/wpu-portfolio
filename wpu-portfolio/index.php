<?php

// YouTube Data API V3 
// API Key : AIzaSyDuw84XEB8B1fyGUTo7gjr9hBrt6J5toQk
//https://developers.google.com/youtube/youtube_subscribe_button

  function get_CURL($url){

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);

  // if (curl_errno($curl)) { 
      //     echo "Tidak dapat dibaca <br>";
      //     print curl_error($curl); 
  // } 
      
    curl_close($curl);

    // Mengembalikan array associative
    return json_decode($result, true); 
   
  }

  $result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCgV9SFT888vD-SB7ZBVjt5A&key=AIzaSyDuw84XEB8B1fyGUTo7gjr9hBrt6J5toQk');

  $youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
  $channelName = $result['items'][0]['snippet']['title'];
  $subscriber = $result['items'][0]['statistics']['subscriberCount'];

  // Lastest video 
  $urlLastestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyDuw84XEB8B1fyGUTo7gjr9hBrt6J5toQk&channelId=UCgV9SFT888vD-SB7ZBVjt5A&maxResults=1&order=date&part=snippet';

  $result = get_CURL($urlLastestVideo);   
  // var_dump($result);

  $urlLastestVideoId = $result['items'][0]['id']['videoId'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="icon" type="image/png" href="img/SCovv1.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home"><?php echo $channelName; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/bbbbbb.jpg" class="rounded-circle img-thumbnail">
          <h1 class="display-4"> Hendy Christian </h1>
          <h3 class="lead"> Front-end Web Development | Mobile Apps & Java Developer </h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
          </div>
          <div class="col-md-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
          </div>
        </div>
      </div>
    </section>

 <!-- Youtube & IG -->
<section class="social bg-light" id="social">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2> Social Media </h2>
      </div>
    </div>

  <div class="row justify-content-center">
    <div class="col-md-5">

      <div class="row">

        <div class="col-md-4">
           <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
        </div>

        <div class="col-md-8">
          <h5> <?php echo $channelName; ?></h5>
          <p> <?php echo $subscriber; ?>  Subscribers. </p>

          <!-- Subscribe button -->
          <div class="g-ytsubscribe" data-channelid="UCgV9SFT888vD-SB7ZBVjt5A" data-layout="default" data-count="default"></div>

        </div>
      </div>

      <div class="row mt-3 pb-3">
          <div class="col">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $urlLastestVideoId?>" allowfullscreen></iframe>
            </div>
          </div>
      </div>

    </div>
      <div class="col-md-5">

        <div class="row">

          <div class="col-md-4">
             <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
          </div>

            <div class="col-md-8">
              <h5> @hendychristt </h5>
              <p> 70000 Folowers. </p>
           </div>

        </div>

        <div class="row mt-3 pb-3">
          <div class="col" >

            <div class="thumbnail" style="width: 100px;
                                          height: 100px;
                                          float: left;
                                          overflow: hidden;">
              <img src="img/thumbs/1.png" class="rounded" style=" width: 100px;">
            </div>

            <div class="thumbnail" style="width: 100px;
                                          height: 100px;
                                          float: left;
                                          overflow: hidden;">
              <img src="img/thumbs/2.png" class="rounded" style=" width: 100px;">
            </div>

            <div class="thumbnail" style="width: 100px;
                                          height: 100px;
                                          float: left;
                                          overflow: hidden;">
              <img src="img/thumbs/3.png" class="rounded" style=" width: 100px;" >
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  </div>
</section>

    <!-- Portfolio -->
    <section class="portfolio " id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/1.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>   
        </div>

        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/5.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/6.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Office</li>
              <li class="list-group-item">Jl. Setiabudhi No. 193, Bandung</li>
              <li class="list-group-item">West Java, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2018.</p>
          </div>
        </div>
      </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script src="https://apis.google.com/js/platform.js"></script>

  </body>
</html>

<!-- 
Reference : 
- https://developers.google.com/youtube/v3/docs/search/list 

-->