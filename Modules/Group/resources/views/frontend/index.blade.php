@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')


            <!-- Center -->
            <div class="col-lg-6 col-md-6 col-6 mx-auto middle-content">
                <div class="search-page-container">

                    <!-- Explore Gropus Section -->
                    <div class="meet-posts-container">

                        <div class="meet-post-header-container">
                            <i class="bi bi-arrow-left meet-post-back-icon" id="go-back-icon"></i>
                            <div class="meet-post-header-title">Find Your Shopping Tribe</div>
                        </div>

                        <!-- Start Discovering -->
                        <div class="meet-recommended-title">Start Discovering</div>
                        <div class="row meet-user-card-grid">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_03.png" class="meet-user-image"
                                            alt="Amanda Catherine" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_01.png" class="meet-user-image" alt="Jacob Lee" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_02.png" class="meet-user-image"
                                            alt="Emily Parker" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                           <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_01.png" class="meet-user-image" alt="Liam Scott" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                             <div class="meet-recommended-title">Pick Your Passion</div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_03.png" class="meet-user-image"
                                            alt="Sofia Loren" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_01.png" class="meet-user-image" alt="Daniel Lee" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_02.png" class="meet-user-image" alt="Grace Kim" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_01.png" class="meet-user-image" alt="Max Turner" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                             <div class="meet-recommended-title">Shop Together</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_03.png" class="meet-user-image"
                                            alt="Olivia Stone" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_01.png" class="meet-user-image" alt="Noah Grey" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_02.png" class="meet-user-image" alt="Isla Rae" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_01.png" class="meet-user-image" alt="Leo Rivera" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Discover Sneaker Lovers Header -->
                        <div class="meet-recommended-title">Start Discovering</div>
                        <div class="row meet-user-card-grid">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_01.png" class="meet-user-image" alt="Noah Kim" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_03.png" class="meet-user-image"
                                            alt="Isabella Lee" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_01.png" class="meet-user-image"
                                            alt="Liam Wright" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_02.png" class="meet-user-image"
                                            alt="Chloe Adams" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Streetwear Trendsetters Başlık -->
                        <div class="meet-recommended-title">Pick Your Passion</div>
                        <div class="row meet-user-card-grid">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_03.png" class="meet-user-image" alt="Ezra Blake" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_02.png" class="meet-user-image" alt="Maya Chen" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_01.png" class="meet-user-image" alt="Jaxon Lee" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="img/profil_picture_03.png" class="meet-user-image" alt="Layla Cruz" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">TrendVault</div>
                                            <div class="meet-user-followers">3.7k members/ 10 posts a day</div>
                                            <div class="meet-user-tagline">Stay ahead with the latest must-have items and shopping trends.</div>
                                        </div>
                                        <button class="meet-follow-button">Join</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
