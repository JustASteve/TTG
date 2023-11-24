Project ini menggunakan framework laravel dan mysql migration.
Pada folder no. 3 ada 2 folder yaitu api-server dan api-client.

Instruksi:
1.Buka 2 terminal (misal cmd atau powershell atau built-in vs code) lalu cd ke masing-masing folder
2.Pada terminal api-client ketik "php artisan serve" lalu enter.
3.Pastikan database berjalan (XAMPP MySQL).
4.Pada terminal api-server ketik "php artisan migrate" lalu enter.
5.Pada terminal api-server ketik "php artisan serve" lalu enter.
6.Buka browser dan buka link "http://127.0.0.1:8080" (link dari serve api-client).

Langkah:
- GetAll
	Buka link "http://127.0.0.1:8080" (link dari serve api-client), semua data akan ditampilkan.
- GetOne/:id
	Klik salah satu barang (gambar atau nama barang) untuk menuju data barang tersebut.
- Create
	Klik button create, isi semua input, klik tombol tambah.
- Update/:id
	Klik button edit pada salah satu barang, akan dialihkan ke halaman edit.
	Ubah input lalu tekan tombol ubah.
- Delete/:id
	Klik button delete pada salah satu barang.