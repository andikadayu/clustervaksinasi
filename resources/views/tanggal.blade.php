@include('layout.header')
            
            <div>
                <center><h1><img height="70" width="70" src="{{ asset('/gambar/bengkulu.png') }}">&nbsp&nbspTARGET VAKSINASI TAHAP III PROVINSI BENGKULU&nbsp&nbsp<img height="70" width="70" src="{{ asset('/gambar/bengkulu.png') }}"></h1></center><hr />
            </div>
            <div>
                <center><h3>Data Target Vaksinasi Zona Hijau/Kuning/Oranye/Merah </h3>
                    <button onClick="window.print();" class="btn btn-danger">Print</button></center><br>
            </div>
            <center><table class="table table-bordered table-striped">
                <tr>
                    <th>Tanggal</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Belum Tervaksinasi</th>
                    <th>Zona</th>
                </tr>
                @foreach ($tanggal as $vaksin)
                <tr>
                    <td> {{ $vaksin->tanggal }} </td>
                    <td> {{ $vaksin->nama }} </td>
                    <td> {{ $vaksin->nama_kec }} </td>
                    <td> {{ $vaksin->bvaksin }} %</td>
                    <td> {{ $vaksin->zona }} </td>
                </tr>
                @endforeach
            </table></center><br><br>
            

        Halaman : {{ $tanggal->currentPage() }} <br/>
	    Jumlah Data : {{ $tanggal->total() }} <br/>
	    Data Per Halaman : {{ $tanggal->perPage() }} <br/>
	
	<center>
	{{ $tanggal->links() }}
	</center>

    <center>
        <a href="homeadmin"><button>Kembali</button></a>
        <a href="target"><button>Data Baru</button></a></center>

@include('layout.footerdata')