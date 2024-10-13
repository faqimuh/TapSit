<div style="background-color: #2e2e2e; padding: 10px; border-radius: 5px; color: white;">
  <h3>WORKSHOP MIKROKONTROLLER - PROGRAM STUDI TEKNIK ELEKTRONIKA - POLITEKNIK ELEKTRONIKA NEGERI SURABAYA</h3>
  <p>DOSEN PENGAMPU : Akhmad Hendriawan ST, MT <br/> NIP. 197501272002121003</p>
</div>


# TapSit
<div align="center">
  <img src="assets/TS1.png" alt="LOGO" />
</div>

# Sistem Pemilihan dan Pemantauan Tempat Duduk Berbasis RFID untuk Optimalisasi Industri F&B
<div align="justify">

Proyek ini bertujuan untuk mengembangkan sistem monitoring otomatis yang memantau ketersediaan tempat duduk di kafe dan restoran, menggunakan mikrokontroler ESP32 dan teknologi RFID. Sistem ini memungkinkan pelanggan untuk memilih meja dengan mengetuk kartu RFID, yang secara instan memperbarui status meja. Data yang dikumpulkan oleh cloud server disimpan dalam database lokal dan ditampilkan di monitor kasir, memungkinkan staf untuk melihat meja yang kosong dan terisi. Dengan demikian, sistem ini meningkatkan kenyamanan pelanggan dan efisiensi operasional, serta mengurangi waktu tunggu dan kesalahan.

</div>


# The Stackholder
| No | Name               | Role                                                         |
|----|--------------------|--------------------------------------------------------------|
| 1  | Muhammad Faqidin    | Project Manager                                              |
| 2  | Ahmad Zen Azhari    | Hardware Developer                                           |
| 3  | Fadlan Surya        | Software Development, Bahasa Pemrograman, Kerangka kerja, Tools |
| 4  | Adib Tantowi        | UI/UX Designer, Riset Pengguna, Pembuatan Prototipe, Support Hardware |
| 5  | Rizka Sugiharto     | Data Analyst, Berpikir Kritis, Analisis Statistik            |
| 6  | M Lukman Al Khakim  | Mechanic, Proses Manufaktur, Pemecahan Masalah               |


# Hardware

<div align = center>
 <h2>Desain Skematik</h2>

![alt text](gambarskematik.png)
</div>

<div align=center>
<h3> Daftar pin yang digunakan </h3>
<!-- Tabel dengan CSS di file Markdown -->
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pin GPIO Ke- </th>
                <th>Alasan</th>
                <th>Fungsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>32</td>
                <td>Aman untuk I/O</td>
                <td>Input info daya baterai</td>
            </tr>
            <tr>
                <td>2</td>
                <td>15</td>
                <td>Aman untuk I/O</td>
                <td>Output ke buzzer</td>
            </tr>
            <tr>
                <td>3</td>
                <td>33</td>
                <td>Aman untuk I/O</td>
                <td>Output ke LED_G</td>
            </tr>
            <tr>
                <td>5</td>
                <td>17</td>
                <td>Aman untuk I/O</td>
                <td>Output ke LED_R</td>
            </tr>
             <tr>
                <td>6</td>
                <td>3,3V</td>
                <td>default</td>
                <td>Daya RFID</td>
            </tr>
             <tr>
                <td>7</td>
                <td>GND 3</td>
                <td>default</td>
                <td>GND RFID</td>
            </tr>
             <tr>
                <td>8</td>
                <td>5</td>
                <td>default</td>
                <td>Pin SDA RFID</td>
            </tr>
             <tr>
                <td>9</td>
                <td>18</td>
                <td>default</td>
                <td>Pin SCK RFID</td>
            </tr>
             <tr>
                <td>10</td>
                <td>23</td>
                <td>default</td>
                <td>Pin MOSI RFID</td>
            </tr>
             <tr>
                <td>11</td>
                <td>19</td>
                <td>default</td>
                <td>Pin MISO RFID</td>
            </tr>
             <tr>
                <td>12</td>
                <td>0</td>
                <td>default</td>
                <td>Pin RST RFID</td>
            </tr>
               <tr>
                <td>13</td>
                <td>Vin</td>
                <td>default</td>
                <td>Daya ESP32</td>
            </tr>
               <tr>
                <td>14</td>
                <td>GND1</td>
                <td>default</td>
                <td>G pembagi (V) dan G ESP32</td>
            </tr>
               <tr>
                <td>15</td>
                <td>GND2</td>
                <td>default</td>
                <td>G LED_R dan G LED_G</td>
            </tr>
         </tbody>
    </table>

<p>Untuk file skematik, dapat diunduh <a href="https://drive.google.com/file/d/1diomlFyTaUs_eFDkaGRLsYESl7vDo8c1/view?usp=sharing">di sini</a>.</p>

    

<div align = center>
 <h2>Layout PCB</h2>

![alt text](pcb.png)
</div>

<p> Menggunakan PCB 2 Layer <br>Ukuran jalur 0,75mm dan 0,3mm</p>

<p>Untuk file PCB, dapat diunduh <a href="https://drive.google.com/file/d/1fTUtGnzqFyHy10sOkZaSZF4weKkYOswV/view?usp=sharing">di sini</a>.</p>

# Software
# Hasil Produk
# Rincian Biaya
| No  | Item              | Jumlah | Harga  | Total   |
|-----|-------------------|--------|--------|---------|
| 1   | ESP32 Devikit 32   | 3      | 58.500 | 175.500 |
| 2   | Buzzer             | 2      | 5.000  | 10.000  |
| 3   | LED SMD 1206       | 4      | 140    | 560     |
| 4   | RFID MRFC 522      | 2      | 14.000 | 28.000  |
| 5   | Resistor SMD 1206  | 6      | 150    | 900     |
| 6   | Papan PCB          | 3      | 5.900  | 17.700  |
| 7   | Box Electric       | 3      | 5.800  | 17.400  |
| 8   | Spacer             | 12     | 900    | 10.800  |
|     | **TOTAL**          |        |        | 260.860 |

