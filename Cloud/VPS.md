# Membuat Cloud di AWS Console (EC2)
<div align="justify">
VPS (Virtual Private Server) adalah sebuah server virtual yang dihosting di dalam server fisik dan digunakan untuk menyediakan sumber daya khusus kepada pengguna. Dalam VPS, satu server fisik dibagi menjadi beberapa server virtual melalui teknologi virtualisasi, dan setiap server virtual bertindak seolah-olah seperti server fisik tersendiri dengan sistem operasi, CPU, RAM, dan penyimpanan (storage) yang terpisah dari VPS lain.

VPS (Virtual Private Server) di Amazon EC2 (Elastic Compute Cloud) AWS adalah layanan server virtual yang memungkinkan pengguna membuat dan mengelola server secara fleksibel di lingkungan cloud. Di AWS, VPS berbasis EC2 menyediakan kapasitas komputasi yang bisa disesuaikan dan diatur seperti server fisik, tetapi berjalan di infrastruktur virtual Amazon.
</div>

## Cara Kerja
<div align="justify">
VPS bekerja melalui teknologi virtualisasi. Penyedia hosting menggunakan perangkat lunak virtualisasi seperti KVM, VMware, atau Hyper-V untuk membagi satu server fisik menjadi beberapa server virtual. Masing-masing server virtual memiliki sistem operasi, memori, penyimpanan, dan prosesor yang terpisah. Pengguna dapat mengakses VPS mereka melalui SSH (untuk Linux) atau Remote Desktop (untuk Windows).
</div>


## Langkah-langkah
Untuk membuat VPS (Virtual Private Server) di AWS menggunakan EC2 (Elastic Compute Cloud), Anda dapat mengikuti langkah-langkah berikut:<br>

### Langkah 1: Buat Akun AWS
1. Buka [AWS Management Console](https://aws.amazon.com/console/).
2. Buat akun AWS jika belum punya. Proses ini     membutuhkan kartu kredit/debit untuk proses verifikasi.

### Langkah 2: Akses ke AWS Management Console
1. Login ke AWS Management Console.
2. Pilih region yang diinginkan di pojok kanan atas (misalnya, Asia Pacific (Singapore) untuk koneksi yang lebih cepat jika Anda berada di Indonesia).

### Langkah 3: Buka Layanan EC2
1. Dari dashboard, cari dan pilih layanan EC2 (Elastic Compute Cloud).
2. Di halaman EC2, klik Launch Instance untuk membuat instance baru.

### Langkah 4: Konfigurasi Instance
1. Name and Tags: Beri nama instance Anda (misalnya, `MyVPS`).

2. Application and OS Images (AMI): Pilih sistem operasi yang diinginkan. AWS menyediakan beberapa pilihan seperti:
- Amazon Linux (gratis untuk Free Tier)
- Ubuntu (versi 20.04 LTS atau lainnya)
- Windows Server (jika ingin menggunakan sistem operasi Windows)
3. Instance Type: Pilih tipe instance yang sesuai. Untuk pemakaian gratis (Free Tier), pilih tipe `t2.micro` yang menyediakan 1 vCPU dan 1 GB RAM.

4. Key Pair: Buat atau pilih key pair. Key pair digunakan untuk mengakses server melalui SSH.
- Jika belum memiliki key pair, pilih Create new key pair dan beri nama.
- Download file `.pem` yang diberikan. Simpan file ini dengan baik, karena diperlukan untuk mengakses server nantinya.
5. Network Settings:
- Pada VPC dan Subnet, Anda bisa menggunakan konfigurasi default.
- Auto-assign Public IP sebaiknya diaktifkan agar instance mendapatkan IP publik.
- Firewall (security group): Buat security group baru dan atur izin untuk akses ke server.
- Tambahkan aturan untuk SSH dengan port 22 (untuk server Linux) dan RDP dengan port 3389 (untuk server Windows).
- Tambahkan juga aturan untuk HTTP (port 80) dan HTTPS (port 443) jika Anda ingin menjalankan web server.
6. Configure Storage: Secara default, AWS menyediakan 8 GB untuk Free Tier. Anda bisa menambah kapasitas jika diperlukan, tapi perhatikan bahwa penambahan mungkin dikenakan biaya.

7. Launch Instance: Setelah semua pengaturan selesai, klik Launch Instance.

### Langkah 5: Akses ke Instance Anda
1. Setelah instance berjalan, Anda akan melihatnya di dashboard EC2 dengan status running.
2. Klik pada instance tersebut, dan catat Public IPv4 address atau Public DNS yang dapat digunakan untuk mengakses server.
 ### Mengakses Instance Windows dengan RDP
- Pilih instance Windows di dashboard EC2.
- Klik Connect, lalu pilih Get Password.
- Unggah file .pem key pair, lalu klik Decrypt Password.
- Gunakan password yang didekripsi untuk login via Remote Desktop Connection.

### Langkah 6: Konfigurasi VPS Anda
<div align="justify">
Setelah terhubung ke instance, Anda bisa mengkonfigurasi server sesuai kebutuhan, seperti menginstal web server (misalnya, Apache atau Nginx), database, dan software lainnya.</div>

### Catatan
AWS menawarkan Free Tier selama 12 bulan dengan batasan tertentu (contohnya tipe t2.micro gratis untuk penggunaan hingga 750 jam per bulan). Pastikan untuk memantau penggunaan dan biaya agar tidak dikenakan biaya tambahan.