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
- assertTrue()                  = check if result true (bool)
- assertFalse()                 = check if result false (bool)
- assertEquals()                = check if result equals to given value
- assertNull()                  = check if result null
- assertContains()              = check if result contain some given value
- assertCount()                 = check if result data length is equal to given total
- assertEmpty()                 = check if result is empty
- assertSee()                   = check on rendered page if see/contain some given value
- assertViewIs()                = check if rendered view is some view from given value
- assertStatus()                = check if response status is equal to given value 
- assertRedirect()              = Asserts that the server redirects to a specific endpoint once the form is submitted
- assertSessionHasNoErrors()    = Asserts that the server didn’t return any errors via a flash session. This is typically used to verify that there are no form validation errors.
- assertSessionHas()            = Asserts that the session has particular data in it. If it’s an array, you can use the index to refer to the specific index you want to check.

### FYI
The first thing you need to keep in mind when starting a project using TDD is that you have to write the test code before the actual functionality that you need to implement.

This is easier said than done, right? How do you test something when it doesn’t even exist yet? This is where “coding by wishful thinking” comes in. The idea is to write test code as if the actual code you are testing already exists. Therefore, you’re basically just interacting with it as if it’s already there. Afterward, you run the test. Of course, it will fail, so you need to use the error message to guide you on what needs to be done next. Just write the simplest implementation to solve the specific error returned by the test and then run the test again. Repeat this step over until the test passes.

It’s going to feel a bit weird when you’re just starting out, but you’ll get used to it after writing a few dozen tests and going through the whole cycle.

### Phase Test Function

- Arrange :
mempersiapkan data / komponen yang dibutuhkan untuk pengujian, misal memasukan beberapa data sample / dummy, membuat object, dll
```
    Product::factory()->count(3)->create(); // create 3 products
```

- Act :
melakukan action yang ingin di uji
```
    $response = $this->get('/');
```

- Assert :
melakukan penegasan dan pemeriksaan dari output act sesuai skema test yang dibutuhkan
```
    $response->assertViewIs('search');
```

Full Code Example : 
```
/** @test */
    public function food_search_page_has_all_the_required_page_data()
    {
        // Arrange
        Product::factory()->count(3)->create();

        // Act
        $response = $this->get('/'); // untuk method get
        $response = $this->post('/cart', [ 'id' => 1]); //untuk method post

        //Assert
        $response->assertViewIs('search');
    }
```

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
- https://www.honeybadger.io/blog/laravel-tdd/

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