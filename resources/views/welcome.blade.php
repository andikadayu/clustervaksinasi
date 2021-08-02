
@include('layout.header')

<div>
    &nbsp&nbsp&nbsp&nbsp<h1>&nbsp&nbsp&nbsp&nbspTARGET VAKSINASI TAHAP III PROVINSI BENGKULU<img height="70" width="70" src="{{ asset('/gambar/bengkulu.png') }}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="{{ route('logout1') }}" class="btn btn-danger">Logout</a></h1><hr />
</div>


<div id="card">
<a href="datakabprov"><button class="buttons">Daftar Kabupaten Dan Provinsi</button></a><br><br>
<a href="target"><button class="buttons">Data Baru</button></a><br><br>
<a href="datatarget"><button class="buttons">Data Target</button></a><br><br>
<a href="filtertanggal1"><button class="buttons">Filter Tanggal</button></a><br><br>
</div>

<div id="mapid">
</div>

<div id="card2">
    <center><h3>Tipe Zona</h3></center>
    <center><a href="hijau"><button class="button button2">Hijau</button></a>
    <a href="kuning"><button class="button button3">Kuning</button></a>
    <a href="orange"><button class="button button4">Orange</button></a>
    <a href="merah"><button class="button button5">Merah</button></a></center>
</div>

@include('layout.footer')