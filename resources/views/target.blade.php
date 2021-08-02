@include('layout.header')

            <div>
                <center><h1><img height="70" width="70" src="{{ asset('/gambar/bengkulu.png') }}">&nbsp&nbspTARGET VAKSINASI TAHAP III PROVINSI BENGKULU&nbsp&nbsp<img height="70" width="70" src="{{ asset('/gambar/bengkulu.png') }}"></h1></center><hr />
            </div>
            <div>
                <center><h3>MASUKKAN DATA TARGET VAKSINASI</h3></center>
            </div>
            <div>
                <form action="{{ route('simpan-vaksin') }}" method="post">
                    @csrf
                <center>
                <p>
                    <label>Tanggal : </label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }} " required />
                </p>

                <p>
                    <label>Kabupaten : </label>
                    <select name="nama" style="width: 200px" class="nama" id="nama" onchange="carikec();" value="{{ old('id_kab') }}" required />
                        <option value="" disabled="true" selected="true">-Select-</option>
                        @foreach($kabupaten as $id => $name)
                            <option value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>Kecamatan : </label>
                    <select name="nama_kec" style="width: 200px" class="nama_kec" id="nama_kec" value="{{ old('id_kec') }}" required />
                        <option value="0" disabled="true" selected="true">-Select-</option>
                    </select>
                </p>

                <p>
                    <label>Tipe Zona : </label>
                    <select name="zona" style="width: 200px" class="zona" id="zona" value="{{ old('zona') }}"required />
                        <option value="hijau">Hijau</option>
                        <option value="kuning">Kuning</option>
                        <option value="orange">Orange</option>
                        <option value="merah">Merah</option>
                     </select>

                </p>

                <p>
                    <label>Jumlah Lansia : </label>
                    <input type="text" name="lansia" id="lansia" value="{{ old('lansia') }}" required />
                    <label>Tervaksinasi : </label>
                    <input type="text" name="vaksin_lansia" id="vaksin_lansia" value="{{ old('vaksin_lansia') }}" required />
                    <br><br>
                    <label>Jumlah ODGJ : </label>
                    <input type="text" name="odgj" id="odgj" value="{{ old('odgj') }}" required />
                    <label>Tervaksinasi : </label>
                    <input type="text" name="vaksin_odgj" id="vaksin_odgj" value="{{ old('vaksin_odgj') }}" required />
                    <br><br>
                    <label>Jumlah Disabilitas : </label>
                    <input type="text" name="disabilitas" id="disabilitas" value="{{ old('disabilitas') }}" required />
                    <label>Tervaksinasi : </label>
                    <input type="text" name="vaksin_disabilitas" id="vaksin_disabilitas" value="{{ old('vaksin_disabilitas') }}" required />
                    <br>
                    <input type="hidden" name="tlansia" id="tlansia" value="tlansia" required />
                    <input type="hidden" name="todgj" id="todgj" value="todgj" required />
                    <input type="hidden" name="tdisabilitas" id="tdisabilitas" value="tdisabilitas" required />
                    <input type="hidden" name="svaksin" id="svaksin" value="{{ old('svaksin') }}" required />
                    <input type="hidden" name="bvaksin" id="bvaksin" value="{{ old('bvaksin') }}" required />
                    
                </p>
                <button onclick="goBack()">Kembali</button>
                <button>Konfirmasi</button>
                
            </center>
        </form>
            </div>

            @include('layout.footerdata')