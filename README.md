#TEST DRIVEN DEVELOPMENT - Laravel

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

#notes 
##Gamma Testing
Setelah lolos Alpha & Beta Testing, keamanan dan fungsi, perbaikan hanya bug Critical, selebihnya di perbaiki setelah aplikasi Release

##Aplha Testing
ketika menjelang akhir development, tidak menggunakan unit test / functional test, melaikan dengan pengguna, bisa dari developer, team internal, atau end user khusus

##A/B Testing
melakukan uji coba pada dua hal berbeda di dalam dua kelompok. Sehingga, Anda bisa melihat strategi apa yang sebenarnya lebih disukai oleh para pelanggan