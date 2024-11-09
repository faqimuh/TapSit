## Aktifasi SSL/TLS di Broker HiveMQ Cloud
Jika kamu menggunakan HiveMQ Cloud (layanan broker MQTT yang di-host oleh HiveMQ) dan ingin mengaktifkan SSL/TLS untuk koneksi aman, berikut langkah-langkahnya:
### 1. Buat Akun dan Masuk ke HiveMQ Cloud
   * Kunjungi situs HiveMQ Cloud.
   * Buat akun atau login jika sudah memiliki akun.
   * Setelah masuk, kamu akan diarahkan ke dashboard HiveMQ Cloud.
### 2.  Buat atau Kelola MQTT Cluster
   * Di dashboard, klik "Create Cluster" untuk membuat broker MQTT baru jika belum ada. Jika sudah ada cluster, pilih cluster yang ingin kamu konfigurasi.
<img src="../assets/cluster.png" /> 
   
   * Setelah memilih atau membuat cluster, kamu akan masuk ke halaman detail cluster.
<img src="../assets/cluster2.png"/>
   
### 3. Mengaktifkan SSL/TLS di HiveMQ Cloud
HiveMQ Cloud secara otomatis mengaktifkan SSL/TLS untuk koneksi aman. Kamu tidak perlu secara manual membuat atau mengunggah sertifikat, karena HiveMQ Cloud menggunakan sertifikat yang diterbitkan oleh Let's Encrypt atau penyedia sertifikat lainnya untuk mengamankan koneksi.
1. Port TLS: HiveMQ Cloud biasanya menyediakan dua port:
   * Port MQTT tanpa TLS (1883).
   * Port MQTT dengan TLS (8883).
Kamu hanya perlu memastikan bahwa klien MQTT yang kamu gunakan terhubung ke port 8883 untuk koneksi aman menggunakan SSL/TLS.

### 4. Navigasi ke Pengaturan Otentikasi
1. Pada halaman detail cluster, pilih menu "Access Management" atau "Authentication" di bagian navigasi atas.
2. Di halaman Authentication, kamu akan menemukan opsi untuk mengatur otentikasi username dan password.
   
### 5. Menambahkan Username dan Password
1. Di halaman Authentication, akan ada opsi untuk "Add User" atau "Create new credentials".
2. Klik "Add User".
  * Username: Masukkan username untuk klien yang akan menghubungkan ke broker MQTT.
  * Password: Masukkan password untuk username tersebut. Pastikan menggunakan password yang kuat untuk keamanan.
Setelah mengisi username dan password, klik "Save" atau "Add" untuk menyimpan kredensial tersebut.
<img src="../assets/cluster3.png"/>

### 6. Uji Koneksi Dengan Dengan MQTT.Cool
1. Buka Situs Test Client
   Kunjungi https://testclient-cloud.mqtt.cool/ menggunakan browser.

2. Masukkan Informasi Broker MQTT
   Setelah halaman terbuka, isi informasi koneksi broker yang relevan di antarmuka web:
   
   * Broker Address: Masukkan hostname atau alamat IP dari broker HiveMQ Cloud kamu. Misalnya, `your_hivemq_cluster_host`.
   * Port: Gunakan 8883, yang merupakan port standar untuk koneksi MQTT over TLS/SSL.
   * Client ID: Buat Client ID unik. Misalnya, `TestClient-12345`.
   * Username dan Password: Jika HiveMQ mengharuskan autentikasi, masukkan username dan password yang telah dikonfigurasi.
     
Aktifkan opsi untuk SSL/TLS dengan mencentang atau memilih opsi yang sesuai (biasanya berupa checkbox atau pilihan yang diberi label Enable SSL atau Use TLS). Ini memastikan bahwa koneksi ke broker HiveMQ menggunakan enkripsi.

![alt text](../assets/ujikoneksi1.png)

3. Connection Settings
   
Pada navigasi Web client isi username dan password sesuai dengan Credential yang sudah dibuat pada autentification. Buatlah topik yang misalnya`Test` kemudian subcribe dan ubah Qos menjadi 2. 

![alt text](../assets/ujikoneksi2.png)

setelah itu klik tombol connect untuk mengaktifkan koneksi broker.

4. Connect to Broker

Klik Connect atau tombol sejenis untuk mencoba terhubung ke broker HiveMQ. Jika semua konfigurasi sudah benar, klien testclient-cloud.mqtt.cool akan berhasil terhubung ke broker melalui TLS/SSL, dan status akan menunjukkan bahwa kamu terhubung.

![alt text](../assets/ujikoneksi5.png)

### 7. Uji Pengiriman dan Penerimaan Pesan
Setelah koneksi berhasil:
   * Gunakan bagian Publish untuk mengirim pesan ke topik tertentu. Masukkan nama topik dan payload pesan, lalu klik Publish.
   * Untuk menerima pesan, gunakan bagian Subscribe untuk berlangganan ke topik tertentu. Masukkan nama topik dan klik Subscribe. Kamu akan menerima pesan apa pun yang dipublikasikan ke topik tersebut oleh klien lain atau oleh klien ini sendiri.
![alt text](../assets/ujikoneksi3.png)
![alt text](../assets/ujikoneksi4.png)

### 8. Mengelola Username dan Password
* Kamu dapat kembali ke halaman Security/Authentication kapan saja untuk menambahkan, mengedit, atau menghapus username dan password.
* Ini berguna jika kamu ingin memberikan akses kepada lebih banyak klien atau ingin mengganti kredensial yang ada untuk meningkatkan keamanan.

Dengan pengaturan ini, broker HiveMQ Cloud kamu sudah aman dengan autentikasi berbasis username dan password, dan setiap klien yang mencoba mengakses harus memberikan kredensial yang valid.
