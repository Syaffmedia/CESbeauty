 <h5>Keranjang Belanja</h5>
          <table class="table table-hover table-condensed">
          <tr>
          <th><center>Item</center></th>
          <th><center>Jml</center></th>
          <th><center>Harga</center></th>
        </tr>
      <?php
        //MENAMPILKAN DETAIL KERANJANG BELANJA//
       include 'include/config.php';         
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($koneksi, "SELECT br_id, br_nm, br_hrg FROM barang WHERE br_id = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['br_hrg'] * $val;
            $total += $jumlah_harga;
            //$no = 1;
            ?>
                <tr>
                <!-- <td><center><?php echo $no ++; ?></center></td> -->
                <td><center><?php echo $data['br_nm']; ?></center></td>
                <td><center><?php echo number_format($val); ?> Pcs</center></td>
                <td><center>Rp. <?php echo number_format($jumlah_harga); ?></center></td>
                </tr>
                
          <?php
                    //mysql_free_result($query);      
            }
              //$total += $sub;
            }?>
                        <?php
        if($total == 0){ ?>
          <td colspan="3" align="center"><?php echo "Keranjang Kosong!"; ?></td>
        <?php } else { ?>
          
                        <td colspan="2" style="font-size: 14px;"><div class="pull-right">Total: Rp. <?php echo number_format($total); ?>,- </div></td>
                        <td><div align="right">
            <a href="keranjang/detail.php" class="btn btn-sm btn-success">Atur</a>
            </div></td>
          
      <?php }
        ?>
                </table>