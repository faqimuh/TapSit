# TAPSIT FIRMWARE

Firmware diprogram dengan menggunakan software PLATFORM IO pada Visual Studio Code. Program menggunakan framework milik arduino dengan tujuan mempermudah penggunaan library pada sistem.

## LIBRARY

Library yang kami gunakan untuk memprogram firware dari system kami meliputi sebagai berikut.  

#### 1. <WiFi.h> dan <WiFiManager.h>

        Library `wifi`  digunakan untuk menghubungkan system hardware dengan koneksi internet dengan protokol wifi atan wlan (wireless lan). Untuk melakukan konfigurasi tersebut, digunakanlah  library `wifi manager`. Salah satu Kelebihan dari library wifi manager ada pada fitur penyimpanan konfigurasi wifi yang telah disetting. Library `wifi manager` juga kami setting secara `advance` untuk memberikan input parameter tambahan yang dicustom untuk memberikan suatu variable untuk device tersebut.  Pada library `wifi manager` yang disetting advance juga dapat menambahkan button untuk melakukan reset konfigurasi dari koneksi wifi dan juga dapat membuat suatu algoritma timeout ketika wifi tidak dapat tersambung.


#### 2. <PubSubClient.h>

        Library `PubSubClient` adalah library Arduino yang digunakan untuk mengimplementasikan komunikasi **Message Queue Telemetry Transport* (MQTT) pada microcontroller seperti ESP32 atau ESP8266. `MQTT` merupakan protokol komunikasi yang ringan dan banyak digunakan dalam aplikasi *Internet of Things* (IoT) untuk mengirim dan menerima data antara perangkat dan *server* (broker) melalui jaringan internet.

#### 3. <Preferences.h>

        Library `Preferences` di ESP32 memungkinkan penyimpanan data secara non-volatile, sehingga data tetap tersimpan meskipun perangkat dimatikan atau di-restart. Dengan menggunakan `Preferences`, kamu dapat menyimpan berbagai jenis data, seperti string, integer, dan boolean, dengan cara yang mudah dan efisien. Proses dimulai dengan menginisialisasi objek `Preferences` di dalam fungsi `setup()`, kemudian menyimpan data seperti nomor meja atau identitas hardware menggunakan metode `putString()`, `putInt()`, atau metode lainnya sesuai tipe data yang diinginkan. Untuk mengambil data yang telah disimpan, cukup gunakan metode `getString()` atau `getInt()` dengan kunci yang sama yang digunakan saat menyimpan. Selain itu, library ini juga menyediakan fungsi untuk menghapus data yang disimpan jika diperlukan. Semua data yang disimpan berada dalam flash memory ESP32, sehingga tetap dapat diakses setelah perangkat dimatikan. Dalam aplikasi kamu, library `Preferences` digunakan untuk menyimpan data nomor meja atau identitas hardware ESP32 yang didapat dari custom parameter WiFi Manager Advance, memastikan bahwa informasi ini selalu tersedia bahkan setelah perangkat di-restart. Dengan demikian, library `Preferences` sangat cocok digunakan untuk menyimpan informasi penting yang perlu diakses kembali setelah restart, seperti data konfigurasi atau identitas unik dalam aplikasi IoT.

#### 4. <SPI.h> dan <MFRC522.h>

      Library `<SPI.h>` dan `<MFRC522.h>` kami gunakan secara bersamaan untuk mengoperasikan RFID reader MFRC522 dengan mikrokontroler seperti Arduino atau ESP32. Library `<SPI.h>` menyediakan antarmuka untuk komunikasi SPI (Serial Peripheral Interface), yang merupakan protokol yang diperlukan untuk berkomunikasi dengan perangkat seperti MFRC522. Di sisi lain, library `<MFRC522.h>` menyediakan fungsi khusus untuk mengatur dan mengelola operasi RFID, termasuk membaca dan menulis data pada kartu RFID. Penggunaannya dimulai dengan menginisialisasi objek MFRC522 dan mengatur koneksi SPI di dalam fungsi `setup()`. Setelah itu, kami dapat menggunakan berbagai fungsi yang disediakan oleh library ini untuk mendeteksi kartu RFID, membaca informasi dari kartu, atau melakukan operasi lain yang berkaitan dengan RFID. Kombinasi kedua library ini memungkinkan kami untuk mengembangkan aplikasi berbasis RFID yang efektif, seperti sistem akses kontrol atau manajemen inventaris, dengan cara yang sederhana dan intuitif.

#### 5. "esp32-hal-timer.h"

        File header `esp32-hal-timer.h` dalam framework Arduino untuk ESP32 digunakan untuk mengelola timer dengan efisien. File ini menyediakan fungsi untuk menginisialisasi dan mengonfigurasi timer dalam mode one-shot dan periodic, serta memungkinkan pengaturan prescaler untuk menentukan kecepatan penghitungannya. Salah satu fitur utamanya adalah kemampuan untuk mengatur interrupt, yang memicu eksekusi kode secara otomatis saat timer mencapai nilai tertentu. Dalam pengaplikasiannya, kami menggunakan timer ini untuk memperbarui  baterai sistem setiap 30 menit. Dengan demikian, `esp32-hal-timer.h` menyederhanakan pengelolaan timer, memungkinkan pengembang untuk membuat aplikasi yang responsif dan terjadwal dengan baik dalam lingkungan IoT.
