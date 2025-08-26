@extends('frontend.layouts.app')
@section('content')
            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
                <div class="personal-data-section p-4 border rounded">

                    <h2 class="mb-4 fade-in">Nextalya Yardım ve SSS</h2>
                    <p class="fade-in">
                        Nextalya kullanıcıları için sıkça sorulan sorular ve detaylı yanıtları aşağıda bulabilirsiniz.
                        Platform kullanımını kolaylaştırmak ve sorularınıza hızlı yanıt vermek için hazırladığımız bu
                        bölüm, kullanıcı deneyimini desteklemektedir.
                    </p>

                    <div class="accordion" id="faqAccordion">

                        <!-- Soru 1 -->
                        <div class="accordion-item fade-in">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Hesabımı nasıl oluşturabilirim?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Nextalya hesabı oluşturmak için ana sayfadaki “Kayıt Ol” butonuna tıklayın. E-posta
                                    adresinizi girerek güvenli bir şifre oluşturun.
                                    Hesap oluşturma sırasında verdiğiniz bilgiler gizli tutulur ve üçüncü kişilerle
                                    paylaşılmaz. Kayıt tamamlandığında e-posta doğrulama linki gönderilir.
                                </div>
                            </div>
                        </div>

                        <!-- Soru 2 -->
                        <div class="accordion-item fade-in">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Şifremi unuttum, ne yapmalıyım?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Şifrenizi unuttuysanız, giriş ekranındaki “Şifremi Unuttum” bağlantısını
                                    kullanabilirsiniz.
                                    E-posta adresinizi girerek şifre sıfırlama linki alabilirsiniz. Linke tıkladıktan
                                    sonra yeni şifrenizi güvenli bir şekilde oluşturabilirsiniz.
                                    Güvenlik için şifrenizi başkalarıyla paylaşmayın ve güçlü bir şifre kullanın.
                                </div>
                            </div>
                        </div>

                        <!-- Soru 3 -->
                        <div class="accordion-item fade-in">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Kişisel bilgilerim güvenli mi?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Nextalya, 6698 sayılı Kişisel Verilerin Korunması Kanunu çerçevesinde kullanıcı
                                    bilgilerini korumaktadır.
                                    Kişisel bilgileriniz yalnızca yasal çerçevede ve platformun işleyişi için gerekli
                                    olduğunda kullanılmaktadır.
                                    Üçüncü taraflarla paylaşılmaz ve güvenli sunucularda saklanır. Gizlilik Politikamızı
                                    inceleyerek detaylı bilgi alabilirsiniz.
                                </div>
                            </div>
                        </div>

                        <!-- Soru 4 -->
                        <div class="accordion-item fade-in">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    İçerik paylaşırken nelere dikkat etmeliyim?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Paylaştığınız yorumlar ve içerikler diğer kullanıcılar tarafından görülebilir.
                                    Küfür, hakaret, ayrımcılık veya yanıltıcı bilgiler içermemelidir.
                                    Telif hakkı ile korunan içerikleri izinsiz paylaşmak yasaktır.
                                    Platform, kurallara uymayan içerikleri kaldırma hakkını saklı tutar.
                                </div>
                            </div>
                        </div>

                        <!-- Soru 5 -->
                        <div class="accordion-item fade-in">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    İş fırsatları hakkında bilgi alabilir miyim?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Nextalya İş Fırsatları sayfasını takip ederek güncel pozisyonları görebilirsiniz.
                                    Ayrıca “Fırsatlardan Haberdar Olmak İster misiniz?” formunu doldurarak yeni iş
                                    ilanları yayınlandığında öncelikli bildirim alabilirsiniz.
                                    Açık pozisyonlar ve detaylı bilgiler için info@nextalya.com üzerinden de iletişime
                                    geçebilirsiniz.
                                </div>
                            </div>
                        </div>

                        <!-- Soru 6 -->
                        <div class="accordion-item fade-in">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Platformdaki hataları nasıl bildirebilirim?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Herhangi bir hata veya aksaklıkla karşılaştığınızda, Yardım sayfasındaki “Bize
                                    Bildir” bölümünü kullanabilirsiniz.
                                    Hata ile ilgili detaylı açıklama ve ekran görüntüsü eklemeniz süreci hızlandırır.
                                    Destek ekibimiz en kısa sürede sizinle iletişime geçer.
                                </div>
                            </div>
                        </div>

                        <!-- Soru 7 -->
                        <div class="accordion-item fade-in">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Hesabımı kapatmak istersem ne yapmalıyım?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Hesabınızı kapatmak için profil ayarları üzerinden “Hesabı Kapat” seçeneğini
                                    kullanabilirsiniz.
                                    Hesap kapatma işlemi geri alınamaz ve tüm kişisel verileriniz platformdan kalıcı
                                    olarak silinir.
                                    İşlem öncesinde destek ekibimizden rehberlik alabilirsiniz.
                                </div>
                            </div>
                        </div>

                        <!-- Soru 8 -->
                        <div class="accordion-item fade-in">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Ödeme ve satın alma ile ilgili sorularım var
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Nextalya platformunda doğrudan ödeme yapılmaz; ancak ürün paylaşım ve yorumları
                                    platformda yer alır.
                                    Ödeme ve satın alma süreçleri ilgili e-ticaret sitesi üzerinden gerçekleşir.
                                    Detaylı bilgi için ilgili satıcı veya destek hattı ile iletişime geçebilirsiniz.
                                </div>
                            </div>
                        </div>

                        <!-- Soru 9 -->
                        <div class="accordion-item fade-in">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    Gizlilik ve veri güvenliği ile ilgili sorular
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Nextalya kullanıcı verilerinin gizliliğine büyük önem verir.
                                    Tüm kişisel bilgiler güvenli sunucularda saklanır, üçüncü taraflarla paylaşılmaz ve
                                    KVKK mevzuatına uygun şekilde işlenir.
                                    Gizlilik politikamızı inceleyerek detaylı bilgi alabilirsiniz.
                                </div>
                            </div>
                        </div>

                        <!-- Soru 10 -->
                        <div class="accordion-item fade-in">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    Destek ile nasıl iletişime geçebilirim?
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Her türlü soru, öneri ve geri bildirimleriniz için
                                    <strong>info@nextalya.com</strong> üzerinden bizimle iletişime geçebilirsiniz.
                                    Destek ekibimiz 24/7 kullanıcı taleplerini değerlendirmekte ve kısa sürede geri
                                    dönüş sağlamaktadır.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

@endsection
