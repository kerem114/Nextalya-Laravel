@extends('frontend.layouts.app')
@section('content')
            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
                <div class="personal-data-section p-4 border rounded">

                    <h2 class="mb-4 fade-in">Nextalya İş Fırsatları</h2>
                    <p class="fade-in">
                        Nextalya olarak, kullanıcı deneyimini sürekli geliştirmek ve güçlü bir ekip oluşturmak amacıyla
                        yeni yetenekleri arıyoruz.
                        Ekibimize katılmak isteyen profesyoneller için en güncel iş fırsatlarını burada paylaşacağız.
                    </p>

                    <!-- Henüz açık ilan yok uyarısı -->
                    <div class="alert alert-warning fade-in" role="alert">
                        Şu anda açık pozisyon bulunmamaktadır. Ancak fırsatlardan haberdar olmak için aşağıdaki formu
                        doldurabilirsiniz.
                    </div>

                    <!-- E-posta toplama formu -->
                    <div class="mb-4 fade-in">
                        <h5 class="mb-3">Fırsatlardan Haberdar Olmak İster misiniz?</h5>
                        <form>
                            <div class="mb-3">
                                <label for="subscriberEmail" class="form-label">E-posta Adresiniz</label>
                                <input type="email" class="form-control" id="subscriberEmail"
                                    placeholder="email@domain.com" required>
                            </div>
                            <button type="submit" class="btn btn-warning">Abone Ol</button>
                        </form>
                    </div>

                    <!-- Şirket kültürü ve avantajlar -->
                    <h5 class="mt-4 mb-3 fade-in">Nextalya’da Çalışmak</h5>
                    <p class="fade-in">
                        Nextalya, dinamik ve yaratıcı bir çalışma ortamı sunar. Çalışanlarımızın gelişimini destekler,
                        fikirlerini özgürce paylaşabileceği bir kültür oluştururuz.
                        Profesyonel ekiplerimizle iş birliği yaparak sürekli yenilikçi projeler üretmekteyiz.
                    </p>

                    <ul class="fade-in">
                        <li>Esnek çalışma saatleri ve uzaktan çalışma imkânı</li>
                        <li>Kariyer gelişimi ve eğitim fırsatları</li>
                        <li>Şeffaf ve açık iletişim kültürü</li>
                        <li>Motivasyonu yüksek, pozitif bir ekip ortamı</li>
                        <li>Performans ve başarıyı ödüllendiren yaklaşım</li>
                    </ul>

                    <p class="mt-4 fade-in">
                        İş fırsatları yayınlandığında öncelikli olarak abonelerimize ve platform kullanıcılarımıza
                        duyurulacaktır.
                        Daha fazla bilgi için <strong>info@nextalya.com</strong> adresinden bizimle iletişime
                        geçebilirsiniz.
                    </p>

                </div>
            </div>

@endsection
