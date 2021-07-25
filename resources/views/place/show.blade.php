@extends('layouts.app') 

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">
@endsection

@section('content')
    <!--navbar section starts-->
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input
              class="form-control mr-sm-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-success my-2 my-sm-0" type="submit">
              Search
            </button>
          </form>
        </div>
      </nav>
    </div>

    <!--navbar section ends-->

    <!--main section starts-->
    <section id="main">
      <div class="container">
        <div class="row" id="post-content">
          <div class="col-12" style="margin-top: 20px"></div>
          <div class="col-12">
            <div class="container">
              <ul class="list-group list-group-horizontal">
                <li class="list-group-item"><a href="">ট্যুরস</a></li>
                <li class="list-group-item"><a href="">প্রাকৃতিক ঝরনা </a></li>
              </ul>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="content">
              <div class="post-content">
                <div class="post-title mt-5">
                  <h1 class="title">
                    নাপিত্তাছড়া ও ঝরঝরি ট্রেইল ভ্রমণে ব্যাকপ্যাকওয়ালার দল
                  </h1>
                </div>

                <div class="post-summary">
                  <h2>ঝর্ণার সৌন্দর্য বিলাশ হবে ব্যাকপ্যাকওয়ালার সাথে</h2>
                </div>

                <div class="post-meta mt-3">

                  <div class="container d-flex justify-content-center px-5">
                    <div class="row">
                        
                            <div class="">
                                <div class=" text-center mt-3"> <span class="myratings">4.5</span>
                                    
                                    <fieldset class="rating mt-3"> <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label> <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label> <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label> <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label> <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> <input type="radio" class="reset-option" name="rating" value="reset" /> </fieldset>
                                    <button type="button" class="btn btn-dark mt-5">Rate This</button>
                                </div>
                            </div>
                        
                    </div>
                </div>
                </div>

                <div class="post-text text-style fzaWUy">
    
                <!--carousel starts-->
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="images/jhorjhori trail.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="images/napittachora.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="images/traveller.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  <!--carousel ends-->

                  <!--carousel pic caption starts-->
                  <figcaption
                  class="captionClass mt-3"
                  style="text-align: center; color: rgb(153, 153, 153)"
                >
                  ঝরঝরি ও নাপিত্তাছড়া ট্রেইল। ছবি : ইন্টারনেট
                </figcaption>
                
                <!--carousel pic caption starts-->

                  <!--Description parts starts-->
                  <figure class="figureClass">
                    <figcaption
                      class="captionClass"
                      style="text-align: left; color: rgb(153, 153, 153)"
                    >
                      <strong style="color: rgb(0, 0, 0)"> বিস্তারিত :</strong>
                    </figcaption>
                  </figure>
                  <p>
                    সীতাকুণ্ড-মিরসরাই রেঞ্জে লুকিয়ে আছে বেশ কিছু ঝর্ণার ট্রেইল।
                    তারমধ্যে তুলনামূলক দুইটি অপরিচিত ট্রেইল হচ্ছে নাপিত্তাছড়া ও
                    ঝরঝরি ট্রেইল। দুইটি ট্রেইলেই আমরা তিন-চারটি করে খুব সুন্দর
                    ঝর্ণা দেখবো। দুটি ট্রেইলই মোটামুটি সহজ ট্রেইল। তাই মোটামুটি
                    ট্রেকিং জানলেই এই ট্যুরে আমাদের সাথে যে কেউ যোগ দিতে পারেন।
                  </p>

                  <!--Description parts Ends-->

                  <!--Direction Parts Start-->

                  <p><strong>যেভাবে যাবেন :</strong></p>
                  <p>
                    <strong>২৪জুন ২০২১</strong> বৃহষ্পতিবার রাত ১১ঃ০০ টায়
                    কলাবাগান/ফকিরাপুল বাস কাউন্টার থেকে মীরেরসরাইয়ের উদ্দেশ্যে
                    যাত্রা করবো।
                  </p>
                  <p>
                    <strong>২৫ জুন ২০২১</strong> শুক্রবার ভোরে বাস থেকে নেমে ফ্রেশ হয়ে
                    নাস্তা সেরে চলে যাব নাপিত্তাছড়া ট্রেইলে। এই ট্রেইলে বেশি সময়
                    লাগবে না। ৩ ঘন্টার মধ্যেই আমরা ঘুরে দেখে চলে যাবো ঝরঝরি
                    ট্রেইলে। মাঝে একটা হোটেলে লাঞ্চ করে নিব। ৩-৪ ঘন্টা ঝরঝরি
                    ট্রেইলে সময় লাগবে সব ঝর্ণা গুলো দেখতে। ঝর্ণা দেখা শেষে আমরা
                    সুবিধামত সময়ে ঢাকার উদ্দেশ্যে রওনা দিব। আশা করি রাত দশটার
                    মধ্যে ঢাকা পৌঁছে যাবো।
                  </p>

                  <!--Direction parts Ends-->

                  <!--additional info parts start-->
                  <p><strong>বিশেষ দ্রষ্টব্য </strong>: </p>
                  <ul>
                    <li>
                      ট্যুরের সময়ে সঠিক দূরত্ব বজায় রাখার চেষ্টা করতে হবে এবং
                      সবসময় মাস্ক ব্যবহার করতে হবে।
                    </li>
                    <li>
                      করোনার যেকোন লক্ষণ কারো মধ্যে দেখা গেলে তার ট্যুর সঙ্গে
                      সঙ্গে ক্যানসেল করা হবে।
                    </li>
                  </ul>
                </div>

                <!--additional info parts ends-->

                <!--Budget Parts starts-->
                <div>
                  <p><strong>বাজেট </strong>: </p>
                  <p class="package-price"><b>৳2300.00</b> / Person</p>
                
                </div>
                <!--Budget Parts starts-->


               

                <!--related package section-->

                <div class="related-posts mt-5">
                  <div class="d-flex justify-content-between mb-3">
                    <button type="button" class="btn btn-dark">Add Packages <span><i class="far fa-plus-square"></i></span> </button>
                    <h3>Related Packages</h3>
                    <a href="">See All</a>
                  </div>
                  <div class="card-deck">
                    <div class="card">
                      <img
                        src="images/boalia trail.jpg"
                        class="card-img-top"
                        alt="..."
                      />
                      <div class="card-body">
                        <h5 class="card-title">
                          বোয়ালিয়া ট্রেইল - মিরসরাই রেঞ্জের অন্যতম আকর্ষণ
                        </h5>
                      </div>
                    </div>
                    <div class="card">
                      <img
                        src="images/no-kaba.jpg"
                        class="card-img-top"
                        alt="..."
                      />
                      <div class="card-body">
                        <h5 class="card-title">
                          ন-কাবা ছড়া এই পাহাড়ি ঝর্ণা বাংলাদেশের অন্য সকল ঝর্ণার
                        </h5>
                      </div>
                    </div>
                    <div class="card">
                      <img
                        src="images/dhuppani.jpg"
                        class="card-img-top"
                        alt="..."
                      />
                      <div class="card-body">
                        <h5 class="card-title">জোছনাতরীর সাথে ধুপপানি ভ্রমণ</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <!--related package section-->


              <!--related posts section-->

              <div class="related-posts mt-5">
                <div class="d-flex justify-content-between mb-3">
                  <h3>Related Posts</h3>
                  <a href="">See All</a>
                </div>
                <div class="card-deck">
                  <div class="card">
                    <img
                      src="images/boalia trail.jpg"
                      class="card-img-top"
                      alt="..."
                    />
                    <div class="card-body">
                      <h5 class="card-title">
                        বোয়ালিয়া ট্রেইল - মিরসরাই রেঞ্জের অন্যতম আকর্ষণ
                      </h5>
                    </div>
                  </div>
                  <div class="card">
                    <img
                      src="images/no-kaba.jpg"
                      class="card-img-top"
                      alt="..."
                    />
                    <div class="card-body">
                      <h5 class="card-title">
                        ন-কাবা ছড়া এই পাহাড়ি ঝর্ণা বাংলাদেশের অন্য সকল ঝর্ণার
                      </h5>
                    </div>
                  </div>
                  <div class="card">
                    <img
                      src="images/dhuppani.jpg"
                      class="card-img-top"
                      alt="..."
                    />
                    <div class="card-body">
                      <h5 class="card-title">জোছনাতরীর সাথে ধুপপানি ভ্রমণ</h5>
                    </div>
                  </div>
                </div>
              </div>
              <!--related posts section-->

            </div>
          </div>
        </div>
      </div>
    </section>

    <!--main section ends-->
@endsection