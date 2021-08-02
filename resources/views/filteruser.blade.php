@include('layout.header')


            <div>
                <center><h1><img height="70" width="70" src="{{ asset('/gambar/bengkulu.png') }}">&nbsp&nbspTARGET VAKSINASI TAHAP III PROVINSI BENGKULU&nbsp&nbsp<img height="70" width="70" src="{{ asset('/gambar/bengkulu.png') }}">&nbsp&nbsp<a href="{{ route('logout') }}" class="btn btn-danger">Logout</a></h1></center><hr />
                
            </div>
<br>
            <div id="cardfiltermap">
                <form action="{{ url('filtertanggal/proses') }}" method="GET">
                <center><label>Target Tanggal Awal : </label>                   
                    <input type="date" name="tanggal_awal" required></input><br><br>
                <label>Target Tanggal Akhir : </label>
                    <input type="date" name="tanggal_akhir" required></input><br><br>
                    
                <input type="submit" value="proses">
                
                
                </form>
                <a href="{{route ('home1') }}"><button type="button">Kembali</button></a>
                
                <br><br>
                <div id="cardfiltermap1">
                    <center>
                        <br><br>
                        <table border="1">
                            <tr>
                                <th>Tanggal</th>
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th>Lansia</th>
                                <th>ODGJ</th>
                                <th>Disabilitas</th>
                                <th>Belum Divaksin</th>
                                <th>Centroid 1</th>
                                <th>Centroid 2</th>
                                <th>C1</th>
                                <th>C2</th>
                                <th>C1</th>
                                <th>C2</th>
                                <th>C1</th>
                                <th>C2</th>
                            </tr>
                            <?php
                                $c1a = 100;
                                $c1b = 50;
    
                                $c2a = 50;
                                $c2b = 0;

                                $c1a_b = "";
                                $c1b_b = "";
                                
                                $c2a_b = "";
                                $c2b_b = "";
                                
                                $hc1=0;
                                $hc2=0;
                                
                                $no=0;
                                $arr_c1 = array();
                                $arr_c2 = array();
                                
                                $arr_c1_temp = array();
                                $arr_c2_temp = array();
                                
                                foreach($filteruser as $s){ 
                                    
                                    ?>
                                    <tr>
                                        <th><?php echo $s->tanggal; ?></th>
                                        <th><?php echo $s->nama; ?></th>
                                        <th><?php echo $s->nama_kec; ?></th>
                                        <th><?php echo $s->tlansia; ?>%</th>
                                        <th><?php echo $s->todgj; ?>%</th>
                                        <th><?php echo $s->tdisabilitas; ?>%</th>
                                        <th><?php echo $s->bvaksin; ?>%</th>
                                        
                                        <th><?php 
                                        $c1 = $s->bvaksin;
                                            if($c1 >= 50 ){
                                                $hc1 = (100+$c1)/2;
                                            }else{
                                                $hc1 = '100';
                                            }
                                            echo $hc1;

                                          ?></th>
              
                                          <th><?php 
                                            $hc2 = sqrt(pow(($s->bvaksin-$c2a),2)+pow(($s->bvaksin-$c2b),2));
                                            echo $hc2;
                                          ?></th>
    
                                        <th><?php
                                        $hc1 = sqrt(pow(($s->bvaksin/$jumlah-$c1a),2)+pow(($s->bvaksin/$jumlah-$c1b),2));
                                        echo $hc1;
                                        ?></th>
    
                                        <th><?php 
                                        $hc2 = sqrt(pow(($s->bvaksin/$jumlah-$c2a),2)+pow(($s->bvaksin/$jumlah-$c2b),2));
                                        echo $hc2;
                                        ?></th>

                                        <th><?php 

                                            //k adalah jumlah bobot yang tidak di boosting
                                            //j adalah jumlah bobot yang di boosting
                                            //centroid 1
                                            $jzona=$k+$j;
                                            $nbobot=1/$jumlah;
                                            $errorrate=$j/$jumlah;
                                            $bobotsuara=log((1-$errorrate)/$errorrate);
                                            $nilaie=(1-$errorrate)/$errorrate;
                                            $bobotbaru= $errorrate*$nilaie;
                                            $databaru= ($nbobot*$jzona)+($bobotbaru*$j);
                                            $normal= $bobotbaru/$databaru;
                                            
                                        $hc1 = sqrt(pow(($s->bvaksin-$normal),2)+pow(($s->bvaksin-$normal),2));
                                        echo $hc1;

                                        ?></th>

                                        <th><?php 
                                            
                                            //centroid 2
                                            //kz nilai bvaksin dibawah 50
                                            $bbaru= $nbobot/$databaru;
                                            $bbaru1= $j*$bobotbaru;
                                            $bbaru2= ($kz+$kz1+$kz2)*$bbaru;
                                            $errorrate1= $bbaru1+$bbaru2;
                                            $bobotsuara1=log((1-$errorrate1)/$errorrate1);
                                            $nilaie1=(1-$errorrate1)/$errorrate1;
                                            $bobotbaru1= $errorrate1*$nilaie1;
                                            $databaru1= ($bbaru2)+($bobotbaru1*$j);
                                            $normal1= $bobotbaru1/$databaru1;

                                        $hc2 = sqrt(pow(($s->bvaksin-$normal1),2)+pow(($s->bvaksin-$normal1),2));
                                        echo $hc2;

                                        ?></th>

    
                                        <?php 
    
                                        if($hc1<=$hc2){
                                            $arr_c1[$no] = 1;
                                        }else{
                                            $arr_c1[$no]= 0;
                                        }
                                        if($hc2<=$hc1){
                                            $arr_c2[$no] = 1;
                                        }else{
                                            $arr_c2[$no]= 0;
                                        }
    
                                        $arr_c1_temp[$no] = $s->bvaksin;
                                        $arr_c2_temp[$no] = $s->bvaksin;
    
                                        $warna1="";
                                        $warna2="";
                                        ?>
                                        <?php if($arr_c1[$no]==1){$warna1='#FFFF00';} else{$warna1='#ccc';} ?><td bgcolor="<?php echo $warna1; ?>"><?php echo $arr_c1[$no] ;?></td>
                                        <?php if($arr_c2[$no]==1){$warna2='#FFFF00';} else{$warna2='#ccc';} ?><td bgcolor="<?php echo $warna2; ?>"><?php echo $arr_c2[$no] ;?></td>
                                    </tr>
                                    <?php
    
                                    $q = "insert into centroid_temp(iterasi,c1,c2) values(1,'".$arr_c1[$no]."','".$arr_c2[$no]."')";
                                    
                                    $no++;
                                }
    
                       
    
                        ?>
                        </table>
                    </center>
    
                    <br>
                    Halaman : {{ $filteruser->currentPage() }} <br/>
                    Jumlah Data : {{ $filteruser->total() }} <br/>
                    Data Per Halaman : {{ $filteruser->perPage() }} <br/>
    
                    <center>
                    {{ $filteruser->links() }}
                    </center>
    
</div>
</div>

    

@include('layout.footerdata')