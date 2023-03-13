# TEST DRIVEN DEVELOPMENT - Laravel
Test Driven Development adalah sebuah metode pengembangan perangkat lunak yang dikendalikan oleh pengujian atau test.
Jadi, lebih mudahnya adalah kita diwajibkan menulis kode untuk testing terlebih dulu sebelum menulis kode untuk aplikasi. Kurang lebih alur kerjanya seperti ini :

- Menulis skrip pengujian / test, usahakan menulikan semua kemungkinan atau ekspektasi yang bisa terjadi dalam kasus tersebut.
Jalankan test, pasti akan menemukan kegagalan, tentu saja karena kita belum menulis kode implementasinya.

- Tulis kode sesuai ekspektasi dari skrip pengujian / test, tujuannya agar bisa memenuhi skrip pengujian.

- Jalankan ulang test, jika masih terdapat test yang gagal, maka perbaiki lagi kodenya hingga memenuhi semua skrip pengujian / test.

- Jika merasa kode yang ditulis berantakan, kurang optimal, lakukan refactor. Jika test dijalankan kembali dan hasilnya tetap memenuhi test, maka tidak ada masalah dari hasil refactoring kita.

### Feature Test
test the whole apps features into one test case

### Unit Test
test smaller function, smaller -> better ;)

## Run the Test
Create Feature Test by execute this command :
```
php artisan make:test NamaTest
```
or Unit Test by Execute this command :
```
php artisan make:test NamaTest --unit
```
run the test by calling : 
```
php artisan test
```
run spesific test unit class : 
```
php artisan test tests/Feature/BismillahTest.php
```

## Standart Assert Function
- assertTrue()        = check if result true (bool)
- assertFalse()       = check if result false (bool)
- assertEquals()      = check if result equals to given value
- assertNull()        = check if result null
- assertContains()    = check if result contain some given value
- assertCount()       = check if result data length is equal to given total
- assertEmpty()       = check if result is empty
- assertSee()         = check on rendered page if see/contain some given value
- assertViewIs()      = check if rendered view is some view from given value
- assertStatus()      = check if response status is equal to given value 

## notes 
### Gamma Testing
Setelah lolos Alpha & Beta Testing, keamanan dan fungsi, perbaikan hanya bug Critical, selebihnya di perbaiki setelah aplikasi Release

### Aplha Testing
ketika menjelang akhir development, tidak menggunakan unit test / functional test, melaikan dengan pengguna, bisa dari developer, team internal, atau end user khusus

### A/B Testing
melakukan uji coba pada dua hal berbeda di dalam dua kelompok. Sehingga, Anda bisa melihat strategi apa yang sebenarnya lebih disukai oleh para pelanggan

## Referensi : 
- https://www.kawankoding.id/belajar-tdd-laravel-menulis-test-pertama/
- https://blog.enggartivandi.com/tutorial-laravel-testing-unit-test/
- https://accurate.id/marketing-manajemen/unit-testing/

# Example Code 
```
<?php

namespace Tests\Feature;

use App\Http\Controllers\BismillahController;
use App\Models\BismillahModel;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BismillahTest extends TestCase
{
    use DatabaseTransactions; //revert / rollback table setelah menjalani test ke kondisi sblm menjalani test
    //use DatabaseMigrations; //drop all table setelah menjalani test

    /**
     * A basic feature test example.
     */
    public function test_user_can_see_all_articles(): void
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
        $response->assertSee('Judul Blog pak zaky');
        $response->assertViewIs('articles.index');
    }

    //Negative Test
    public function test_cuma_iseng_doang() : void {
        $response = $this->get('/ulala');
        $response->assertStatus(404);
    }

    //Unit Test Function Positive Result
    public function test_add_function(){
        $result = BismillahController::add(10,5);
        $this->assertEquals(15, $result);
    }

    //Unit Test Function Negative Result
    public function test_add_negative_function(){
        $result = BismillahController::add(10,5);
        $this->assertNotEquals(10, $result);
    }

    //Unit Test interaksi dengan Model / Database
    public function test_add_data_to_table(){
        BismillahController::insertNewData();
        $result = BismillahModel::get();
        $this->assertCount(3, $result);
    }
}
```