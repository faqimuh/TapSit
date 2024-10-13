# Komponen Utama

| No  | Item                   | Jumlah | Total | Alasan Pemilihan                                                                                     | Link Pembelian  |                                       
|-----|------------------------|--------|-----------------|---------|-----------------------------------------------------------------------------------------------------|
| 1   | ESP32 Devkitc 32D      | 1      | 66.900          | Harga terjangkau, fitur lengkap (I/O pins, Wi-Fi, Bluetooth), serta konsumsi daya yang efisien     | [beli disini](https://s.shopee.co.id/g7zNegvfe)        |
| 2   | Buzzer SMD 8530 3V     | 1      | 4.000           | Harga terjangkau, kompatibilitas, ketersediaan                                                     | [beli disini](https://www.tokopedia.com/marnov/buzzer-smd-8530-3v-16r-8-5-3mm-piezo-mini-aktif-pasif?extParamsrc%3Dshop%26whid%3D225282) |
| 3   | LED SMD 1206           | 2     | 280             | Efisiensi energi                                                                                    | [beli disini](https://tokopedia.link/4pipX6fPrNb)     |
| 4   | RFID MRFC 522          | 1      | 14.000          | Pengingat suara, ukuran kecil, biaya rendah                                                        | [beli disini](https://s.shopee.co.id/sIaWPa9R)         |
| 5   | Resistor SMD 1206      | 3      | 450             | Ukurannya kecil, hemat tempat pada PCB                                                             | [beli disini](https://tokopedia.link/CMivhgmPrNb)    |
| 6   |  Etching Papan PCB     | 1      | 5.900           | Struktur stabil, kemudahan desain                                                                   | [beli disini](https://s.shopee.co.id/5fWfL0X3Ry)      |
| 7   |  3D print casing       | 1      | 20.000          | Keamanan, desain rapi                                                                                |                                                         |
| 8   |  TP4056 1A 5V Lithium |  1       | 4.000    | Ringan, kapasitas tinggi, dapat diisi ulang berkali-kali                                          | [beli disini](https://www.tokopedia.com/isee/tp4056-1a-5v-lithium-lipo-18650-battery-charging-usb-type-c-proteksi) |
| 9  | Lithium 2500mah 3.7V   | 1     | 37.000          | Ringan, kapasitas tinggi                                                                            | [beli disini](https://id.shp.ee/LSUCxvz)                |
|     | **TOTAL**              |           | 154.630              |                                                                                                     |                                                         |

# Perbandingan Komponen

| No  | Komponen               | Alternatif               | Fitur Utama                  | Keunggulan                    | Alasan Pemilihan                                                                                                                                                                         |
|-----|------------------------|--------------------------|------------------------------|-------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| 1   | ESP32 Devkitc 32D      | ESP8266                  | Wi-Fi, Bluetooth             | Konsumsi daya rendah, fitur lengkap | **ESP32 dipilih** karena memiliki fitur lebih lengkap (Wi-Fi, Bluetooth, dan GPIO 34 pin) serta konsumsi daya lebih rendah. Sementara itu, ESP8266 hanya mendukung Wi-Fi dengan GPIO lebih sedikit. |
| 2   | Buzzer SMD 8530 3V     | Piezo Speaker            | Indikasi suara               | Biaya murah, mudah diimplementasi | **Buzzer** dipilih karena lebih murah dan cukup untuk memberikan umpan balik suara sederhana. Piezo speaker lebih mahal dan tidak diperlukan untuk fungsi dasar ini. |
| 3   | LED SMD 1206           | LED 5mm                  | Efisiensi energi, ukuran kecil | Konsumsi daya rendah | **LED SMD** dipilih karena ukurannya lebih kecil dan lebih efisien daripada LED 5mm, cocok untuk aplikasi hemat energi. |
| 4   | RFID MRFC 522          | PN532 RFID               | Komunikasi RFID 13.56 MHz    | Biaya rendah, ukuran kecil    | **MRFC 522** dipilih karena ekonomis dan cukup untuk aplikasi sederhana. PN532 memiliki fitur lebih banyak tetapi tidak dibutuhkan dan harganya lebih tinggi. |
| 5   | Resistor SMD 1206      | Resistor Through Hole    | Komponen pasif               | Ukuran kecil, stabilitas tinggi | **Resistor SMD** dipilih karena lebih kecil dan sesuai untuk produksi PCB, menghemat ruang dibanding resistor through-hole yang lebih besar dan kurang efisien. |
| 6   | Etching Papan PCB      | Veroboard                | Desain rangkaian tetap       | Struktur stabil               | **Papan PCB** dipilih untuk instalasi permanen yang rapi dan stabil, sedangkan Veroboard lebih cocok untuk prototyping. |
| 7   | 3D Print Casing        | Kotak Plastik            | Penyimpanan komponen elektronik | Melindungi dari debu dan air  | **Box hasil 3D printing** dipilih karena memberikan perlindungan lebih baik terhadap debu dan air dibandingkan kotak plastik biasa. |
| 8   | Modul Battery TP4056 1A 5V Lithium | NiMH Rechargeable | Rechargeable, kapasitas tinggi | Ringan, efisiensi daya tinggi | **Modul Battery TP4056** dipilih karena lebih efisien dan ringan dibandingkan NiMH, yang lebih berat dan kurang efisien untuk aplikasi dengan pengisian ulang berulang. |
| 9   | Lithium 2500mAh 3.7V   | NiMH Rechargeable       | Kapasitas tinggi, ringan      | Daya tahan lama, efisiensi tinggi | **Baterai Lithium 2500mAh 3.7V** dipilih karena bobotnya ringan, kapasitas tinggi, dan efisiensi lebih baik. Dibandingkan NiMH, Lithium memiliki kecepatan pengisian lebih cepat, self-discharge rendah, dan lebih sesuai untuk aplikasi jangka panjang. |



# Perhitungan Resistor
Pembagi Tegangan:
𝑉𝑜𝑢𝑡 = 𝑉𝑖𝑛 × 𝑅2 / (𝑅1 + 𝑅2)
Diketahui:
𝑉𝑖𝑛 = 12V
𝑉𝑜𝑢𝑡 = 3V
𝑅1 = 10KΩ
𝑅2 = (𝑉𝑜𝑢𝑡 × 𝑅1) / (𝑉𝑖𝑛 − 𝑉𝑜𝑢𝑡)
𝑅2 = (3V × 10KΩ) / (12V − 3V)
𝑅2 = 3.33KΩ
Hasil: Untuk mendapatkan tegangan output 3V dari sumber 12V, dengan R1 = 10KΩ, diperlukan R2 = 3.33KΩ.
# Dasar teori 
Untuk menurunkan Tegangan, Pembagi tegangan memungkinkan penurunan tegangan dari sumber yang lebih tinggi ke nilai yang lebih rendah, sesuai dengan kebutuhan komponen di rangkaian.

# Perhitungan Kapasitas Baterai:
Diketahui:
Arus beban = 200mA
Waktu pemakaian = 12 jam
Kapasitas Baterai = Arus Beban × Waktu Pemakaian
Kapasitas = 200 mA × 12 jam = 2400 mAh
Waktu Pengisian Baterai:
Waktu Pengisian = Kapasitas Baterai / Arus Pengisian
Waktu = 2500 mAh / 1000 mA × 1/0.8 = 3.125 jam
Perkiraan Lama Pemakaian:
Lama Pemakaian = Kapasitas Baterai / Arus Beban
Lama = 2500 mAh / 200 mA = 12.5 jam
# Dasar Teori
Dengan Menggunakan baterai berkapasitas besar seperti 2500mAh atau 3000mAh juga dapat meningkatkan efisiensi pengisian. Modul pengisian seperti TP4056 akan bekerja lebih optimal ketika dipasangkan dengan baterai berkapasitas lebih besar karena pengisian akan berlangsung lebih lama pada arus yang lebih tinggi, mengurangi kerugian daya akibat pengisian berulang kali.