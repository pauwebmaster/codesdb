## codesdb kullanımı  [daha detaylı için](http://renklikodlar.net/CLASS/php_PDO_turu_veritabani_sinifi "dahata detaylı için")

#### İçindekiler
1. [kayıt çekmek](https://github.com/pauwebmaster/codesdb "#kayıt çekmek için")
2. dbclass çoklu veri çekme
3. dbclass ile çoklu kayıt çekmek ve sayfalamak
4. Kayıt sayımı ve sayısal işlemler
5. Kayıt ekleme
6. Var olan kaydın güncellenmesi
7. Bir kaydı silmek için
8. Doğrudan sorgu çalıştırmak [sitesinden incelenmelidir.](http://renklikodlar.net/CLASS/php_PDO_turu_veritabani_sinifi "sitesinden incelenmelidir.")

------------


>Öncelikle Class'ı kullanmak için veritabanı dosyasını Mysql'e yükleyin sonra dbclass.php'yi projemize dahil (include) etmemiz gerekli sonra da sınıf nesnemizi oluşturup gerekli işlemleri kayıt çekme, silme güncelleme v.b yaptıktan sonra veritabanı ile işimiz bitince kapatmamız gerekiyor bunu yapmak için aşağıdaki kodu kullanacağız.
```php
 <?php
 ob_start();   // bu ve alttaki fonksiyon kodun sürekli çalışması sağlıyor.
 $dbhost = "localhost";
 $dbuser = "root"; //Veritabanı Kullanıcı Adı
 $dbpass = "root"; //Veritabanı Şifresi
 $dbdata = "renklikodlar"; //Veritabanı Adı
 include("dbclass.php"); //veritabani class dosyamızı dahil ediyoruz
 $bag = new db(); // db class'imizla $bag nesnemizi olusturduk
 //Kullanılacak olan işlem türü kodları buraya yazılacak
 $bag->kapat();// $bag nesnemizi kapattik
 ob_end_flush();
 ?>
```

### kayıt çekmek için
```php
cek("SEÇİM", "TABLO", "SÜTUNLAR", "KOŞUL", array(KOSULDEGERLERI));
```
- **SEÇİM** yazan yerde ASSOC,OBJ veya NUM kullanın size kalmış.
- **TABLO** yazan yere veritabanında bağlanmak istediğiniz tablo adını yazın.
- **SÜTUNLAR **bu bağlantıda tablodaki hangi sütunlara bağlanacaksanız virgülle ayırın veya tümüne bağlanılacaksa * yazın
- **KOŞUL** olan yere sql sorgusunda kullanılan koşullar yazılacak.
- **KOŞULDEĞERLERİ** bu diziye koşulların değerleri koşul sırasına göre yazılacak.
##### Koşullardan bazı sql örnekleri, KOŞUL ve KOŞULDEĞERLERİ nasıl yazılacak anlamanız için.

------------

   -  "**WHERE baslik LIKE ?**",
   array("%manset%") //baslik sütununda manset kelimesi geçen kaydı alır
   - "**ORDER BY id DESC**"
   array() //id değerine göre listeleme ASC veya DESC
   - "**WHERE id=?"**
   array(12) //bizim belirttiğimiz bir id numarası koşulu
   - "**WHERE id>? AND okuma>? AND okuma<?**"
   array(5,8,10)) // id 5 ten büyük okuma 8 ile 10 arası kaydı getirir
   
>  Birkaç koşul şekli bu şekilde, sql koşulları çok fazla olabileceği için mantığı anlamanız açısından bu örnekler size faydalı olacaktır koşuldaki ? işareti koşul değeri yerine kullanılıyor soldan sağa doğru kaç ? işareti kullanıldıysa okadar değeri koşul sıralamasına denk gelecek şekilde array() içinde virgülle ayırarak giriyoruz KOŞULDEĞERLERİ sayısal alanlar için olduğu gibi array(5,8,10) sayısal olmayan alanlar için array("deger","deger2","deger3") tırnaklarla belirtilmeli.   Birkaç koşul şekli bu şekilde, sql koşulları çok fazla olabileceği için mantığı anlamanız açısından bu örnekler size faydalı olacaktır koşuldaki ? işareti koşul değeri yerine kullanılıyor soldan sağa doğru kaç ? işareti kullanıldıysa okadar değeri koşul sıralamasına denk gelecek şekilde array() içinde virgülle ayırarak giriyoruz KOŞULDEĞERLERİ sayısal alanlar için olduğu gibi array(5,8,10) sayısal olmayan alanlar için array("deger","deger2","deger3") tırnaklarla belirtilmeli.

##### OBJ ile $sonuc->id şeklinde kullanarak veri çekmek
```php
 $sonuc = $bag->cek("OBJ", "haberler", "id,baslik,haber,tarih", "ORDER BY id DESC", array());
 echo "Haber id: ".$sonuc->id."<br>Başlık: ".$sonuc->baslik."<br>Haber: ".$sonuc->haber."<br>Tarih: ".$sonuc->tarih;
```
###  dbclass çoklu veri çekme
```php
 $sonuc = $bag->cek("OBJ_ALL", "haberler", "id,baslik,haber,tarih", "ORDER BY id ASC", array());
 foreach($sonuc as $satir) {
 echo "Haber id: ".$satir->id."<br>Başlık: ".$satir->baslik."<br>Haber: ".$satir->haber."<br>Tarih: ".$satir->tarih;
 echo "<hr>";
 }
```
### dbclass ile çoklu kayıt çekmek ve sayfalamak
> Sayfalama mantığı aynı çoklu kayıtta olduğu gibi (ASSOC_ALL, OBJ_ALL ve NUM_ALL, sorgular, koşullar v.s) sadece birkaç ekleme yapacağız.
```php
 sayfala("SEÇİM", "TABLO", "SÜTUNLAR", "KOŞUL", array(KOŞULDEĞERLERİ), SAYFABAŞIKAYIT, SAYFANO, "?sayfa=", ÖNCESONRA);
```

- **SAYFABAŞIKAYIT **buraya anladığınız gibi bir sayfada gösterilecek olan kayıt sayısını yazıyoruz.
- **SAYFANO** o anda bulunduğumuz sayfa numarası bunu devam eden örnekte goreceğiniz gibi **$_GET[ "sayfa" ]** ile alacağız.
- **?sayfa=** burası adres satırımızı temsil eden yer adresle gönderdiğiniz başka veriler varsa ?id=5&okuma=7&sayfa= şeklinde düzenlenmeli
- **ÖNCESONRA** buraya da sayfa numaraları için bir özellik yaptım *(ilk onceki [ -10 ]123[ 4 ]567[ +10 ] sonraki son) *kırmızı olan yerde kac sayfa çıkması gerekiyorsa onu yazın 3 yazarsanız parantez içindeki gibi olacaktır bu sayede sayfalama numaraları sayfadaki alana sığdırılabilir olacak.
- sayfala functionu array() (dizi) olarak geri döner "veriler","sayfalar","toplamsayfa","toplamkayit" gibi bunların içinden veriler olanda bir array() dizidir ve istenilen kayıtları bu diziyi döngüye alarak yasfaya yazdıracağız.

```php
 // $_GET["sayfa"] ile hangi sayfada olduğumuzu alıyoruz bir sayı girilmemişse veya veri boş gelirse 1 sayıyoruz.
 $sayfa = isset($_GET["sayfa"]) ? (int) $_GET["sayfa"] : 1;
 
 //yazdırma SEÇİMİ (OBJ_ALL) kullandık sayfa başı (5) kayıt sonraki linklerin deseni (?sayfa=) sayfalama numaraları (3)lü sıra olsun
 $sonuc = $bag->sayfala("OBJ_ALL", "haberler", "id,baslik,haber,tarih", "ORDER BY id ASC", array(), 5, $sayfa, "?sayfa=", 3);
 
 // $sonuc["veriler"] dizi olduğu için döngü kurduk
 foreach($sonuc["veriler"] as $satir) {
 echo "Haber id: ".$satir->id."<br>Başlık: ".$satir->baslik."<br>Haber: ".$satir->haber."<br>Tarih: ".$satir->tarih;
 echo "<hr>";
 }
 
 // Sayfalama yapacak olan kodlarımız
 echo "<div class='sayfala'>";
 echo $sonuc["sayfalar"];//sayfa sayilarini yazdirir (ilk onceki [-10]123[4]567[+10] sonraki son) seklinde
 echo "</div><br>";
 
 // Bazen kayıt sayısı sayfa sayısı gerekli olabilir kullanabileceklerimiz
 echo $sonuc["toplamsayfa"]. " sayfada toplam " .$sonuc["toplamkayit"]. " kayit var, " .$sayfa. ". sayfadasınız.";
```

**Sayfa numaraları güzel bir görüntü oluşturmadı class='sayfala' var kodlarda dikkatinizi çektiyse sayfaya asağıdaki css kodunu ekleyin kendinize göre düzenleyebilirsiniz renkleri v.s **
```css
 <style>
 .sayfala {
   margin-top: 10px;
   color: #000;
 } 
 .sayfala, li {
   cursor:pointer;
   margin-right: 8px;
   font-size: 12px;
   display: inline-block;
   padding: 5px 9px;
   background-color: #efefef;
   border: 1px solid #ccc;
   border-radius: 3px
 } 
 .sayfala, li:hover, li.current {
   color: #000;background-color: #c9d2da;
 } </style>
```

### Kayıt sayımı ve sayısal işlemler

> Şimdi de haberler tablosunda kaç kayıt var kaç kez okundular veya başlığı manşet olan veriler kaçtane gibi sayısal işlemleri yapalım burada tek kayıt çekmede kullandığımız mantığı kullanıyoruz ufak değişikliklerle.

```php
 cek("SEÇİM", "TABLO", "SÜTUNLAR", "KOŞUL", array(KOŞULDEĞERLERİ));
```
- **SEÇİM** sayısal işlemler için *ASSOC*,*OBJ* veya *NUM* yerine *KAYITSAY* yazılıyoruz
- **SÜTUNLAR** sayım yapacağımız türe göre *SUM*(okuma) , *COUNT*(id) gibi
- **TABLO**, **KOŞUL** , **KOŞULDEĞERLERİ** önceki örneklerde olan mantıkla çalışıyor. Konuyu uzatarak bilgili arkadaşları ince detaylarla sıkmamak için örnekleri bir arada veriyorum.

```php
 //haberler tablosunda kac kayit var
 $say1 = $bag->cek("KAYITSAY", "haberler", "COUNT(id)", "", array());
 echo "Tabloda " .$say1 . " haber var<br>";
 
 //haberler tablosundaki okuma sutununda olan sayilari toplar
 $toplam = $bag->cek("KAYITSAY", "haberler", "SUM(okuma)", "", array());
 echo "Haberler " .$toplam. " defa okundu<br>";
 
 //haberler tablosunda okuma sayısı 4 olan kac kayit var
 $say2 = $bag->cek("KAYITSAY", "haberler", "COUNT(id)", "WHERE okuma=?", array(4));
 echo "Okuma sayısı 4 olan " .$say2 . " haber bulundu<br>";
 
 //baslik alaninda (Basligi 1) kelimesi gecen kac kayit var
 $say3 = $bag->cek("KAYITSAY", "haberler", "COUNT(id)", "WHERE baslik LIKE ?", array("%Basligi 1%"));
 echo "(Basligi 1) kelimesi gecen " .$say3 . " haber bulundu<br>";
```
### Kayıt ekleme
> Kayıt eklemek çok basit bir şekilde tamamlanıyor, kayıt eklendikten sonra eklenen kaydın id nosu döndürür aksi halde false döner ve ona göre işlem yapar veya uyarı veririrz.
```php
 ekle("TABLO", "sutun,sutun", array("sutundeğeri", "sutundeğeri"));
```

> **TABLO** sadece veri gireceğimiz tablo adını yazıyoruz sütun ve sütun değerlerini veriyoruz

```php
 //haberler tablosunun baslik,haber,tarih ve okuma sütunlarına veriler ekleyerek bir kayıt oluşturalım
 $ekle = $bag->ekle("haberler", "baslik,haber,tarih,okuma", array("Haberin Basligi", "Haber icerigi", date("Y-m-d H:i:s"), 0));
 
 //$ekle bize yeni kaydın id no yu verecektir false dönerse kayıt varsa gibi durumlar için kontrolu yapalım 
 if ($ekle){
  echo "Haber " .$ekle. " nolu id'e eklendi";
 }else{
  echo "Kayit eklenmedi";
 }
```
### Var olan kaydın güncellenmesi
> Var olan kaydı güncelleme gerektiğinde kullanılacak kod örneği.

```php
 guncelle(TÜR, "TABLO", "SÜTUNLAR", "KOŞUL", array(SÜTUNDEĞERLERİ,KOŞULDEĞERLERİ));
```
- **TÜR** , bir veya birden çok (koşullara bağlı) sütun içeriğini değişmek için **0** yazıyoruz.

```php
 // id numarası 10 olan kaydı güncelleyelim
 $guncel = $bag->guncelle(0, "haberler", "baslik,haber", "WHERE id=?", array("Değişen Başlik", "Değişen Haber Iceriği", 10));
 if ($guncel){
  echo $guncel. ": haber guncellendi";
 }else{
  echo "haber guncellenmedi";
 }
```

> İşlem başarılı olduğu durumda guncelle functionu güncellediği kayıt sayısını döndürür aksi halde false olarak döner.
TÜR , (sayac haber okuma sayisi) gibi sutunlarda kullandigimiz önceki degere +1 eklemek için buraya 1 yazıyoruz böylece eski değeri 12 olan bir veri 1 artıyor yada artmasını istediğiniz kadar.

```php
 //id'si 10 olan haberin okuma sütunundaki sayıyı 1 arttıalım
 $guncel = $bag->guncelle(1, "haberler", "okuma", "WHERE id=?", array(1, 10));
 if ($guncel){
  echo $guncel. ": haberin okuma sütunundaki sayı 1 arttırıldı";
 }else{
  echo "haber guncellenmedi";
 }
```

> İşlem başarılı olduğu durumda guncelle functionu güncellediği kayıt sayısını döndürür aksi halde false olarak döner.

### Bir kaydı silmek için

> Bir kaydı silmek için kullanılacak function örneği.
```php
 sil("TABLO", "KOŞUL", array(KOŞULDEĞERLERİ));
```
> Açıklamam gereken detay olduğunu sanmıyorum üsttekileri okuyarak buraya geldiyseniz zaten bunlari biliyorsunuz kullanım şekli oldukça açık anlaşılır vaziyette sanırım onun için birkaç örnek kodu toplu şekilde veriyorum.

```php
 //haberler tablosunda id'si 10 olan kaydı sil
 $sil = $bag->sil("haberler", "WHERE id=?", array(10));
 if ($sil){
  echo $sil. ": haber silindi";
 }else{
  echo "kayit YOK";
 }
 
 //haberler tablosunda id'si 12 ve 15 olan kayıtları sil
 $sil = $bag->sil("haberler", "WHERE id=? AND id=?", array(12, 15));
 if ($sil){
  echo $sil. ": haber silindi";
 }else{
  echo "kayit YOK";
 }
 
 //haberler tablosundaki baslik alaninda manset kelimesi gecen kaylari silmek için
 $sil = $bag->sil("haberler", "WHERE baslik LIKE ?", array("%manset%"));
 if ($sil){
  echo $sil. ": haber silindi";
 }else{
  echo "kayit YOK";
 }
```

### Doğrudan sorgu çalıştırmak
**konusu biraz karışık  -  [sitesinden incelenmelidir.](http://renklikodlar.net/CLASS/php_PDO_turu_veritabani_sinifi "sitesinden incelenmelidir.")**






