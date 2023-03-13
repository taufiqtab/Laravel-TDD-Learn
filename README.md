#TEST DRIVEN DEVELOPMENT - Laravel
Test Driven Development adalah sebuah metode pengembangan perangkat lunak yang dikendalikan oleh pengujian atau test.
Jadi, lebih mudahnya adalah kita diwajibkan menulis kode untuk testing terlebih dulu sebelum menulis kode untuk aplikasi. Kurang lebih alur kerjanya seperti ini :

- Menulis skrip pengujian / test, usahakan menulikan semua kemungkinan atau ekspektasi yang bisa terjadi dalam kasus tersebut.
Jalankan test, pasti akan menemukan kegagalan, tentu saja karena kita belum menulis kode implementasinya.

- Tulis kode sesuai ekspektasi dari skrip pengujian / test, tujuannya agar bisa memenuhi skrip pengujian.

- Jalankan ulang test, jika masih terdapat test yang gagal, maka perbaiki lagi kodenya hingga memenuhi semua skrip pengujian / test.

- Jika merasa kode yang ditulis berantakan, kurang optimal, lakukan refactor. Jika test dijalankan kembali dan hasilnya tetap memenuhi test, maka tidak ada masalah dari hasil refactoring kita.

#Feature Test
test the whole apps features into one test case

#Unit Test
test smaller function, smaller -> better ;)

#Standart Assert Function
assertTrue()        = check if result true (bool)
assertFalse()       = check if result false (bool)
assertEquals()      = check if result equals to given value
assertNull()        = check if result null
assertContains()    = check if result contain some given value
assertCount()       = check if result data length is equal to given total
assertEmpty()       = check if result is empty
assertSee()         = check on rendered page if see/contain some given value
assertViewIs()      = check if rendered view is some view from given value
assertStatus()      = check if response status is equal to given value 

#Run the Test
run the test by calling : php artisan test

#notes 
##Gamma Testing
Setelah lolos Alpha & Beta Testing, keamanan dan fungsi, perbaikan hanya bug Critical, selebihnya di perbaiki setelah aplikasi Release

##Aplha Testing
ketika menjelang akhir development, tidak menggunakan unit test / functional test, melaikan dengan pengguna, bisa dari developer, team internal, atau end user khusus

##A/B Testing
melakukan uji coba pada dua hal berbeda di dalam dua kelompok. Sehingga, Anda bisa melihat strategi apa yang sebenarnya lebih disukai oleh para pelanggan