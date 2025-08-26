@extends('frontend.layouts.app')
@section('content')
            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
                <div class="row">
                    <!-- Sol Bölüm -->
                    <div class="col-md-6 mb-4 mb-md-0">
                        <div class="personal-data-section p-3 border rounded">
                            <h4 class="mb-3">Nextalya Topluluk Kuralları</h4>
                            <p><strong>1. Saygılı ve Kapsayıcı Olun</strong><br>
                                Tüm kullanıcılarımız farklı kültürel ve sosyal geçmişlerden gelmektedir. Irk, cinsiyet,
                                din, yaş, engellilik durumu, cinsel yönelim veya siyasi görüş ayrımı yapmaksızın
                                herkesin güvenli ve saygılı bir ortamda etkileşimde bulunması beklenir. Küfür,
                                aşağılama, küçümseme, alay etme veya dışlayıcı davranışlar kesinlikle yasaktır.
                                Toplulukta pozitif ve kapsayıcı bir deneyim sağlamak hepimizin sorumluluğudur.</p>

                            <p><strong>2. Şiddet, Taciz ve Nefret Söylemi Yasaktır</strong><br>
                                Fiziksel veya psikolojik şiddeti teşvik eden içerikler, görseller veya yorumlar derhal
                                kaldırılır. Taciz, cinsel içerikli imalar, istenmeyen mesajlar ve tehditkâr dil
                                kullanımı kesinlikle yasaktır. Irkçı, ayrımcı, cinsiyetçi veya homofobik içerikler
                                tespit edildiğinde hesaplar kalıcı olarak askıya alınabilir. Nextalya, topluluk
                                güvenliğini sağlamak için tüm kullanıcıların bu kurallara uymasını zorunlu kılar.</p>

                            <p><strong>3. Yapıcı ve Güvenilir Yorumlar Paylaşın</strong><br>
                                Yorum ve paylaşımlarınızın doğruluğu, güvenilirliği ve topluluk için faydalı olması
                                esastır. Ürünleri karalama, yanıltıcı bilgi verme veya bilinçli kötüleme yapmak
                                yasaktır. Eleştiri yaparken somut ve yapıcı olun. Yorumlarınız, diğer kullanıcıların
                                bilinçli karar vermesine yardımcı olmalıdır. Şeffaf ve dürüst geri bildirim topluluğun
                                gelişimi için önemlidir.</p>

                            <p><strong>4. Reklam ve Tanıtım İçerikleri İçin Onay Alın</strong><br>
                                Kendi ürün veya hizmetlerinizin tanıtımını yapmak için Nextalya’nın 'marka işbirlikleri'
                                politikalarına uygun hareket edin. Kullanıcıları yanıltıcı promosyonlar, spam veya toplu
                                mesajlarla rahatsız etmek yasaktır. Onaysız reklam içerikleri silinir ve tekrar eden
                                ihlaller hesabın askıya alınmasına yol açabilir.</p>

                            <p><strong>5. Kişisel Bilgi Paylaşmayın</strong><br>
                                Kendi veya başkalarının kişisel bilgilerini paylaşmak güvenlik riski oluşturur. Telefon
                                numarası, ev adresi, e-posta veya diğer hassas bilgilerinizin paylaşılması yasaktır.
                                Başkalarının kişisel bilgilerini izinsiz ifşa etmek, gizlilik ihlali olarak
                                değerlendirilir ve hesabın kapatılmasına neden olabilir. Topluluğun güvenliği hepimizin
                                ortak sorumluluğudur.</p>

                            <p><strong>6. Telif Hakkı ve İçerik Paylaşımı</strong><br>
                                Başkasına ait fotoğraf, yazı veya ürün açıklamalarını izinsiz kullanmak yasaktır. Kendi
                                deneyimlerinizi yansıtan özgün içerikler paylaşmanız teşvik edilir. İçeriklerin telif
                                haklarına saygı göstermek, topluluk bütünlüğünü ve yasal uyumluluğu sağlar. Gerekli
                                durumlarda lisans veya izin belgesi talep edilebilir.</p>
                        </div>
                    </div>

                    <!-- Sağ Bölüm -->
                    <div class="col-md-6">
                        <div class="personal-data-section p-3 border rounded">
                            <p><strong>7. Alışveriş Paylaşımlarında Dürüstlük Esastır</strong><br>
                                Kullanmadığınız veya deneyimlemediğiniz ürünleri paylaşmak yasaktır. Paylaşımlarınız
                                sadece kişisel deneyimlerinizi yansıtmalıdır. Yanıltıcı bilgiler, topluluk güvenini
                                zedeler ve hesap yaptırımlarına yol açabilir. Ürün yorumlarınızın doğru, açıklayıcı ve
                                faydalı olmasına özen gösterin.</p>

                            <p><strong>8. Sahte Hesaplar ve Manipülasyon Yasaktır</strong><br>
                                Sahte takip, sahte yorum, otomatik bot kullanımı, beğeni veya etkileşim artırma gibi
                                yöntemler kesinlikle yasaktır. Bu tür davranışlar tespit edildiğinde hesaplar askıya
                                alınır. Topluluğun güvenilirliği ve etkileşim kalitesi, gerçek kullanıcı deneyimine
                                dayanmaktadır.</p>

                            <p><strong>9. Şeffaflık ve Sorumluluk</strong><br>
                                Platform kurallarına uymayan içerikleri bildirmek kullanıcıların sorumluluğundadır.
                                Kurallar ihlal edildiğinde sistem otomatik uyarı verir, içerikler kaldırılır veya
                                hesaplar kısıtlanır. Topluluk güvenliği, kullanıcıların bilinçli ve sorumlu davranması
                                ile sağlanır. Kuralların amacı, herkes için eşit ve güvenli bir deneyim sunmaktır.</p>

                            <p><strong>10. Yorumlarda Satın Almaya Yönelik Önerilerde Sorumluluk</strong><br>
                                Başkalarını etkileyen alışveriş önerilerinizin sorumluluğu tamamen size aittir.
                                Yanıltıcı yönlendirmeler ciddi şikayet ve yaptırımlara yol açabilir. Ürünle ilgili yorum
                                yaparken, 'kendi deneyimimdir' veya benzeri açıklamalar eklemek güvenilirliği artırır.
                                Toplulukta dürüstlük ve şeffaflık esas alınır.</p>

                            <p><strong>Kurallara Uyulmaması Durumunda Yaptırımlar</strong><br>
                                1. Aşama: Uyarı ve içerik kaldırma<br>
                                2. Aşama: Geçici hesap kısıtlaması<br>
                                3. Aşama: Hesabın kalıcı olarak askıya alınması<br>
                                Nextalya, ihlallere karşı adil ve şeffaf bir uygulama yürütür. Kullanıcılar her aşamada
                                bilgilendirilir ve gerekçeler açıklanır.</p>

                            <p><strong>Misyonumuz ve Topluluk Değerleri</strong><br>
                                Nextalya, kullanıcıların alışveriş deneyimlerini özgürce ve güvenli şekilde
                                paylaşabilecekleri, pozitif ve destekleyici bir topluluk oluşturmayı hedefler. Topluluk
                                üyeleri; saygılı, sorumlu ve bilinçli davranarak, deneyimlerini paylaşırken diğer
                                kullanıcıların güvenliğini ve haklarını gözetir. Misyonumuz, güçlü bir sosyal alışveriş
                                ekosistemi kurmak ve kullanıcıların güvenini her zaman ön planda tutmaktır.</p>

                            <p><strong>İletişim</strong><br>
                                Kurallara veya topluluk ile ilgili herhangi bir sorunuz için
                                <strong>info@nextalya.com</strong> adresinden bize ulaşabilirsiniz. Tüm geri
                                bildirimleriniz değerlendirilecek ve topluluk deneyimini iyileştirmek için
                                kullanılacaktır.</p>
                        </div>
                    </div>
                </div>
            </div>

@endsection
