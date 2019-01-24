## codesdb kullanımı
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

[dahata detaylı için](http://renklikodlar.net/CLASS/php_PDO_turu_veritabani_sinifi "dahata detaylı için")
