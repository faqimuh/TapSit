<div style="background-color: #2e2e2e; padding: 10px; border-radius: 5px; color: white;">
  <h3>WORKSHOP MIKROKONTROLLER - PROGRAM STUDI TEKNIK ELEKTRONIKA - POLITEKNIK ELEKTRONIKA NEGERI SURABAYA</h3>
  <p>DOSEN PENGAMPU : Akhmad Hendriawan ST, MT <br/> NIP. 197501272002121003</p>
</div>


# TapSit
<div align="center">
  <img src="./assets/logo.jpg" alt="LOGO" width="200px"/>
</div>

# Sistem Pemilihan dan Pemantauan Tempat Duduk Berbasis RFID untuk Optimalisasi Industri F&B
<div align="justify">

Proyek ini bertujuan untuk mengembangkan sistem monitoring otomatis yang memantau ketersediaan tempat duduk di kafe dan restoran, menggunakan mikrokontroler ESP32 dan teknologi RFID. Sistem ini memungkinkan pelanggan untuk memilih meja dengan mengetuk kartu RFID, yang secara instan memperbarui status meja. Data yang dikumpulkan oleh cloud server disimpan dalam database lokal dan ditampilkan di monitor kasir, memungkinkan staf untuk melihat meja yang kosong dan terisi. Dengan demikian, sistem ini meningkatkan kenyamanan pelanggan dan efisiensi operasional, serta mengurangi waktu tunggu dan kesalahan.
</div>


<div align="center">

  <img src="./assets/anggota.png" alt="LOGO" />

</div>

# The Stackholder

| No | Name                   | Role                                                               |
|----|------------------------|--------------------------------------------------------------------|
| 1  | Muhammad Faqidin       | Project Manager                                                    |
| 2  | Ahmad Zen Azhari       | Hardware Development                                               |
| 3  | Fadlan Surya           | Software Development                                               |
| 4  | Adib Tantowi           | UI/UX Designer                                                     |
| 5  | Rizka Sugiharto        | Data Analyst                                                       |
| 6  | M Lukman Al Khakim     | Procurement Product                                                |


# Daftar Isi
- [Hardware](#Hardware)
    * [Rangkaian Skematik](#Rangkaian-Skematik)
    * [Pin I/O](#Pinout)
    * [Layout PCB](#Layout-PCB)
- [Software](#Software)
    * [Aktifasi SSL/TLS di Broker HiveMQ CLoud](#aktifasi-ssltls-di-broker-hivemq-cloud)
- [Rincian Biaya](#Rincian-Biaya)





# Hardware
## Produk

<div align="center">

<video controls src="./assets/produk.mp4" title="Title"></video>
  Tampilan 3D 
 ![Tampilan Produk 0][def0]
 ![Tampilan Produk 1][def1]
 ![Tampilan Produk 2][def2]

[def0]: /assets/Desain1.png
[def1]: /assets/Desain2.png
[def2]: /assets/Desain3.png
</div>

## Rangkaian Skematik
<div align = center>
<img src="assets/SKEMATIK.png" alt="Skematik" />
</div>


 ## Layout PCB
  <img src="assets/LAYOUT.png" alt="Layout" />

<p> Menggunakan PCB 2 Layer </p>



  ## Pinout yang Dipakai

Pin GPIO34 | untuk data input baterai<br>
Pin GPIO26 | untuk indikator LED<br>
Pin GPIO27 | untuk indikator LED<br>
Pin GPIO13 | untuk input interrupt<br>
Pin GPIO14 | untuk output buzzer<br>
Pin MISO   | untuk RFID <br>
Pin MOSI   | untuk RFID<br>
Pin SCK    | untuk RFID<br>
Pin SDA    | untuk RFID<br>
Pin RST    | untuk RFID<br>
Pin 3,3V   | untuk input tegangan<br>
Pin GND    | untuk ground<br>

# Software

## Aktifasi SSL/TLS di Broker HiveMQ Cloud
Jika kamu menggunakan HiveMQ Cloud (layanan broker MQTT yang di-host oleh HiveMQ) dan ingin mengaktifkan SSL/TLS untuk koneksi aman, berikut langkah-langkahnya:
### 1. Buat Akun dan Masuk ke HiveMQ Cloud
   * Kunjungi situs HiveMQ Cloud.
   * Buat akun atau login jika sudah memiliki akun.
   * Setelah masuk, kamu akan diarahkan ke dashboard HiveMQ Cloud.
### 2.  Buat atau Kelola MQTT Cluster
   * Di dashboard, klik "Create Cluster" untuk membuat broker MQTT baru jika belum ada. Jika sudah ada cluster, pilih cluster yang ingin kamu konfigurasi.
<img src="assets/cluster.png" />
   
   * Setelah memilih atau membuat cluster, kamu akan masuk ke halaman detail cluster.
<img src="assets/cluster2.png"/>
   
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
<img src="assets/cluster3.png"/>

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

![alt text](assets/ujikoneksi1.png)

3. Connection Settings
   
Pada navigasi Web client isi username dan password sesuai dengan Credential yang sudah dibuat pada autentification. Buatlah topik yang misalnya`Test` kemudian subcribe dan ubah Qos menjadi 2. 

![alt text](assets/ujikoneksi2.png)

setelah itu klik tombol connect untuk mengaktifkan koneksi broker.

4. Connect to Broker

Klik Connect atau tombol sejenis untuk mencoba terhubung ke broker HiveMQ. Jika semua konfigurasi sudah benar, klien testclient-cloud.mqtt.cool akan berhasil terhubung ke broker melalui TLS/SSL, dan status akan menunjukkan bahwa kamu terhubung.

![alt text](assets/ujikoneksi5.png)

### 7. Uji Pengiriman dan Penerimaan Pesan
Setelah koneksi berhasil:
   * Gunakan bagian Publish untuk mengirim pesan ke topik tertentu. Masukkan nama topik dan payload pesan, lalu klik Publish.
   * Untuk menerima pesan, gunakan bagian Subscribe untuk berlangganan ke topik tertentu. Masukkan nama topik dan klik Subscribe. Kamu akan menerima pesan apa pun yang dipublikasikan ke topik tersebut oleh klien lain atau oleh klien ini sendiri.
![alt text](assets/ujikoneksi3.png)
![alt text](assets/ujikoneksi4.png)

### 8. Mengelola Username dan Password
* Kamu dapat kembali ke halaman Security/Authentication kapan saja untuk menambahkan, mengedit, atau menghapus username dan password.
* Ini berguna jika kamu ingin memberikan akses kepada lebih banyak klien atau ingin mengganti kredensial yang ada untuk meningkatkan keamanan.

Dengan pengaturan ini, broker HiveMQ Cloud kamu sudah aman dengan autentikasi berbasis username dan password, dan setiap klien yang mencoba mengakses harus memberikan kredensial yang valid.

# Rincian Biaya


| No  | Item                   | Jumlah | Harga   | Total   |Link|
|-----|------------------------|--------|---------|---------|-----|
| 1   | ESP32 Devkitc 32D      | 1      | 66.900  | 66.900  |[Buy](https://s.shopee.co.id/g7zNegvfe) |
| 2   | Buzzer SMD 8530 3V     | 1      | 4.000   | 4.000   |[Buy](https://www.tokopedia.com/marnov/buzzer-smd-8530-3v-16r-8-5-3mm-piezo-mini-aktif-pasif?extParamsrc%3Dshop%26whid%3D225282) |
| 3   | LED SMD 1206           | 2      | 140     | 280     |[Buy](https://tokopedia.link/4pipX6fPrNb)|
| 4   | RFID MRFC 522          | 1      | 14.000  | 14.000  |[Buy](https://s.shopee.co.id/sIaWPa9R)         |
| 5   | Resistor SMD 1206      | 3      | 150     | 450     |[Buy](https://tokopedia.link/CMivhgmPrNb)    |
| 6   | Etching Papan PCB      | 1      | 8.000   | 8.000   |   |
| 7   | 3D print casing        | 1      | 20.000  | 20.000  |     |
| 8   | TP4056 1A 5V Lithium   | 1      | 4.000   | 4.000   |[Buy](https://www.tokopedia.com/isee/tp4056-1a-5v-lithium-lipo-18650-battery-charging-usb-type-c-proteksi) |
| 9   | Lithium 2500mah 3.7V   | 1      | 37.000  | 37.000  |[Buy](https://id.shp.ee/LSUCxvz)                |
|     |                        |        | **TOTAL** | 154.630 |

