# LokerCLI
LokerCLI adalah aplikasi untuk mencatat data berupa kartu identitas yang disimpan ke dalam loker. Aplikasi ini dijalankan di Command Prompt.

## Run
Buka Command Prompt arahkan pada direktori aplikasi dan ketikkan:
```bash
$ php main.php
```

## Instructions
#### init [integer]
```bash
init 5
```
Menentukan banyaknya loker. <br>
Untuk memulai program anda harus menentukan banyaknya loker terlebih dahulu.
#### input [character] [integer]
```bash
input KTP 556802
```
Memasukkan jenis identitas dan nomor identitas ke dalam loker yang kosong.
#### leave [integer]
```bash
leave 3
```
Mengosongkan loker sesuai nomor yang ditentukan.
#### status
```bash
status
```
Menampilkan data yang disimpan ke loker dalam bentuk tabel.
#### find [integer]
```bash
find 556802
```
Mencari posisi kartu identitas dengan menampilkan nomor loker.
#### search [character]
```bash
search KTP
```
Mencari nomor identitas berdasarkan jenis identitas.
#### exit
```bash
exit
```
Keluar dari program.

## Built With
* PHP

## Authors
* **Ardian Daniswara Dharminto**
