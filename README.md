<div style="background-color: #2e2e2e; padding: 10px; border-radius: 5px; color: white;">
  <h3>WORKSHOP MIKROKONTROLLER - PROGRAM STUDI TEKNIK ELEKTRONIKA - POLITEKNIK ELEKTRONIKA NEGERI SURABAYA</h3>
  <p>DOSEN PENGAMPU : Akhmad Hendriawan ST, MT <br/> NIP. 197501272002121003</p>
</div>


# TapSit
<div align="center">

  <img src="./assets/logo.jpg" alt="LOGO" />

</div>

# Sistem Pemilihan dan Pemantauan Tempat Duduk Berbasis RFID untuk Optimalisasi Industri F&B
<div align="justify">

Proyek ini bertujuan untuk mengembangkan sistem monitoring otomatis yang memantau ketersediaan tempat duduk di kafe dan restoran, menggunakan mikrokontroler ESP32 dan teknologi RFID. Sistem ini memungkinkan pelanggan untuk memilih meja dengan mengetuk kartu RFID, yang secara instan memperbarui status meja. Data yang dikumpulkan oleh cloud server disimpan dalam database lokal dan ditampilkan di monitor kasir, memungkinkan staf untuk melihat meja yang kosong dan terisi. Dengan demikian, sistem ini meningkatkan kenyamanan pelanggan dan efisiensi operasional, serta mengurangi waktu tunggu dan kesalahan.
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


## Daftar Isi
- [Hardware](#Hardware)
    * [Rangkaian Skematik](#Rangkaian-Skematik)
    * [Pin I/O](#Pinout)
    * [Layout PCB](#Layout-PCB)
- [Hasil Produk](#Hasil-Produk)
- [Rincian Biaya](#Rincian-Biaya)




## Hardware
### Produk

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

### Rangkaian Skematik
<div align = center>
<img src="assets/SKEMATIK.png" alt="Skematik" />
</div>

 ### Layout PCB
  <img src="assets/LAYOUT.png" alt="Layout" />

<p> Menggunakan PCB 2 Layer </p>



  ### Pinout yang Dipakai

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





## Rincian Biaya

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

