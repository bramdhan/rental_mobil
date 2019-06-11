<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <?=anchor('member', 'Rental Mobil', ['class'=>'navbar-brand'])?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li><?php echo anchor('member', 'Home');?></li>
        <li>
            <?php
                $text_cart_url  = '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>';

                $text_cart_url .= ' Booking Cart: '. $this->m_rental->edit_data(array('id_customer'=>$this->session->userdata('id_cst')),'transaksi')->num_rows() .'mobil';
            ?>
            <?=anchor('peminjaman/lihat_keranjang', $text_cart_url)?>
        </li>
        <?php if($this->session->userdata('id_cst')) { ?>
            <li><div style="line-height:50px;">Hello  <b><?=$this->session->userdata('nama_cst')?></b></div></li>
            <li><?php echo anchor('admin/logout', 'Logout');?></li>
        <?php } else { ?>
            <li><?php echo anchor('welcome', 'Login');?></li>
        <?php } ?>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
