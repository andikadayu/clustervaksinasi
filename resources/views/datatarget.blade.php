@include('layout.header')

            <div>
                <center><h1><img height="70" width="70" src="{{ asset('/gambar/bengkulu.png') }}">&nbsp&nbspTARGET VAKSINASI TAHAP III PROVINSI BENGKULU&nbsp&nbsp<img height="70" width="70" src="{{ asset('/gambar/bengkulu.png') }}"></h1></center><hr />
            </div>
            <div>
                <center><h3>Hasil Pemasukkan Data Target Vaksinasi</h3></center><br>
            </div>
            <center><table class="table table-bordered table-striped">
            <tr>
                <td style="width:150px">tanggal</td>
                    <td>{{ $data->tanggal }}</td>
                </tr>

                <tr>
                    <td style="width:150px">Kecamatan</td>
                        <td>{{ $data->nama_kec }}</td>
                    </tr><tr>

                        <td style="width:150px">Kabupaten</td>
                            <td>{{ $data->nama }}</td>
                        </tr>

                        <tr>
                            <td style="width:150px">Zona</td>
                                <td>{{ $data->zona }}</td>
                            </tr>

                            <tr>
                                <td style="width:150px">Lansia</td>
                                    <td>{{ $data->lansia }}</td>
                                </tr>

                                <tr>
                                    <td style="width:150px">Vaksin Lansia</td>
                                        <td>{{ $data->vaksin_lansia }}</td>
                                    </tr>

                                    <tr>
                                        <td style="width:150px">ODGJ</td>
                                            <td>{{ $data->odgj }}</td>
                                        </tr>

                                        <tr>
                                            <td style="width:150px">Vaksin ODGJ</td>
                                                <td>{{ $data->vaksin_odgj }}</td>
                                            </tr>

                                            <tr>
                                                <td style="width:150px">Disabilitas</td>
                                                    <td>{{ $data->disabilitas }}</td>
                                                </tr>

                                                <tr>
                                                    <td style="width:150px">Vaksin Disabilitas</td>
                                                        <td>{{ $data->vaksin_disabilitas }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width:150px">Sudah Divaksin</td>
                                                            <td>{{ $data->svaksin }}%</td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width:150px">Belum Divaksin</td>
                                                                <td>{{ $data->bvaksin }}%</td>
                                                            </tr>
            </table></center><br><br>
            <center><a href="target"><button>Data Baru</button></a>
            <a href="/"><button>Konfirmasi</button></a></center>

    @include('layout.footerdata')