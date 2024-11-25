## Node-Red
Node-Red adalah alat pemrograman visual berbasis flow yang memungkinkan penggunanya untuk menyusun alur kerja aplikasi dengan cara menghubungkan node dalam antarmuka yang sederhana. Node-Red sering digunakan untuk integrasi data dalam IoT karena dapat menghubungkan berbagai perangkat, API, dan layanan dengan mudah. Setiap node di Node-Red memiliki fungsi tertentu, seperti menerima data dari perangkat, memprosesnya, dan mengirimkannya ke tujuan yang diinginkan.

Node-Red mendukung berbagai protokol dan layanan seperti MQTT, HTTP, WebSocket, dan banyak lainnya, sehingga memudahkan integrasi dengan broker MQTT dan database MySQL.

Jika kamu menggunakan Node-Red, berikut langkah-langkahnya:
### 1. Cara Menggunakan Node-Red untuk Mengambil Data dari Broker MQTT
Brikut langkah-langkah untuk mengambil data dari broker MQTT menggunakan Node-Red:
#### Instalasi Node MQTT di Node-Red
   * Buka Node-Red dashboard.
   * Klik ikon menu (biasanya di kiri atas) > Manage Palette > Install.
   * Cari mqtt dan pastikan node MQTT sudah terinstal.
#### Tambahkan Node MQTT di Alur Node-Red
   * Di workspace Node-Red, pilih MQTT in dari kategori input dan tarik node ini ke dalam alur kerja.
   * Node ini berfungsi untuk menerima data dari topik tertentu di broker MQTT.
#### Konfigurasi Pengaturan MQTT
* Klik dua kali pada node MQTT in untuk mengatur koneksi ke broker MQTT:
    - Server: Masukkan alamat broker, misalnya your_hivemq_cluster_host.
    - Port: Masukkan 8883 jika broker menggunakan TLS, atau 1883 jika tidak.
    - Client ID: Berikan Client ID unik.
    - Username dan Password: Masukkan username dan password sesuai konfigurasi di broker.
* Topik: Masukkan topik yang akan dipantau (misalnya sensor/data).
* QoS: Atur ke 0, 1, atau 2 tergantung pada tingkat keandalan yang diinginkan (QoS 2 adalah yang paling andal).
#### Melihat Data di Node-Red
* Hubungkan node MQTT in ke Debug node untuk melihat data yang diterima.
* Klik Deploy untuk mulai menjalankan alur kerja. Data yang diterima dari broker MQTT akan muncul di panel debug.


### 2.  Cara Mengirim Data dari Broker MQTT ke MySQL dengan Node-Red
Untuk mengirim data yang diterima dari broker MQTT ke database MySQL, ikuti langkah-langkah berikut:

#### Instal Node MySQL di Node-Red
* Buka Manage Palette di Node-Red dan cari node-red-node-mysql.
* Instal node MySQL jika belum tersedia.
#### Tambahkan Node MySQL ke Alur Node-Red
* Pilih node MySQL dari kategori storage dan tarik ke dalam alur kerja.
* Node ini berfungsi untuk memasukkan data ke dalam database MySQL.
#### Konfigurasi Pengaturan MySQL
* Klik dua kali pada node MySQL untuk mengatur koneksi ke database:
    - Host: Masukkan alamat server MySQL (misalnya localhost atau alamat IP server MySQL).
    - User dan Password: Masukkan username dan password MySQL.
    - Database: Masukkan nama database yang akan digunakan.
* Klik Add untuk menyimpan konfigurasi database.
#### Buat Query SQL untuk Menyimpan Data
* Sebelum mengirim data ke MySQL, buat tabel di database sesuai data yang akan disimpan. Misalnya, jika data dari broker adalah sensor_id, temperature, dan humidity, buat tabel dengan kolom ini.
* Dalam node MySQL, masukkan query SQL untuk memasukkan data, misalnya:
<img width="254" alt="function creat database" src="https://github.com/user-attachments/assets/b2b92379-5dbb-484b-80eb-91a15a0283f6">

Di mana ? akan digantikan oleh data dari alur kerja Node-Red.

#### Hubungkan Node MQTT dengan Node MySQL
* Hubungkan node MQTT in (yang menerima data dari broker) ke node MySQL.
* Tambahkan node function di antara node MQTT in dan MySQL untuk memformat data yang diterima agar sesuai dengan query SQL. Contoh kode dalam node function:
#### Jalankan dan Uji Alur Kerja
* Klik Deploy untuk menjalankan alur kerja.
* Data yang diterima dari broker MQTT seharusnya sekarang disimpan dalam tabel sensor_data di database MySQL.
<img width="489" alt="tampilan node-red" src="https://github.com/user-attachments/assets/fd277bfd-45a4-488d-bc90-84901b5e091c">

Dengan konfigurasi ini, Node-Red akan secara otomatis mengambil data dari broker MQTT dan menyimpannya ke dalam database MySQL, memungkinkan pengolahan dan analisis data lebih lanjut.

[Watch the video on Google Drive](https://drive.google.com/drive/folders/1t7HDB0__3hbtFrGsi0mWfVt8j7W3ua6P?hl=id)
