<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joy Thrift</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- My Style -->
  <link rel="stylesheet" href="../public/css/style.css">

  <!-- AlpineJS -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- App -->
  <!-- <script src="src/app.js" async></script> -->
  <script src="../public/src/app.js" async></script>
  
  
  <!-- midtrans -->
  <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-65rWpnTLc1Pb77c4"></script>
</head>

<body>

  <!-- Navbar start -->
  <nav class="navbar" x-data>
    <a href="#" class="navbar-logo">Joy<span>Thrift</span>.</a>

    <div class="navbar-nav">
      <a href="#home">Home</a>
      <a href="#about">Tentang Kami</a>
      <!-- <a href="#menu">Menu</a> -->
      <a href="#products">Produk</a>
      <a href="#contact">Kontak</a>
    </div>

    <div class="navbar-extra">
      <a href="#" id="search-button"><i data-feather="search"></i></a>
      <a href="#" id="shopping-cart-button">
        <i data-feather="shopping-cart"></i>
        <span class="quantity-badge" x-show="$store.cart.quantity" x-text="$store.cart.quantity"></span>
      </a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- Search Form start -->
    <div class="search-form">
      <input type="search" id="search-box" placeholder="search here...">
      <label for="search-box"><i data-feather="search"></i></label>
    </div>
    <!-- Search Form end -->

    <!-- Shopping Cart start -->
    <div class="shopping-cart">
      <template x-for="(item, index) in $store.cart.items" x-keys="index">
        <div class="cart-item">
          <img :src="`../public/img/products/${item.img}`" :alt="item.name">
          <div class="item-detail">
            <h3 x-text="item.name"></h3>
            <div class="item-price">
              <span x-text="rupiah(item.price)"></span>&times;
              <button id="remove" @click="$store.cart.remove(item.id)">&minus;</button>
              <span x-text="item.quantity"></span>
              <button id="add" @click="$store.cart.add(item)">&plus;</button>&equals;
              <span x-text="rupiah(item.total)"></span>
            </div>
          </div>
          <!-- <i data-feather="trash-2" class="remove-item"></i> -->
        </div>
      </template>
      <!-- <div class="cart-item">
        <img src="img/products/1.jpg" alt="Product 1">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 30K</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
      <div class="cart-item">
        <img src="img/products/1.jpg" alt="Product 1">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 30K</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div> -->
      <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem;">Cart is Empty</h4>
      <h4 x-show="$store.cart.items.length">Total : <span x-text="rupiah($store.cart.total)"></span></h4>
      <div class="form-container" x-show="$store.cart.items.length">
        <form action="" id="checkoutForm">
          <input type="hidden" name="items" x-model="JSON.stringify($store.cart.items)">
          <input type="hidden" name="total" x-model="$store.cart.total">
          <h5>Customer Detail</h5>
          <label for="name">
            <span>Name</span>
            <input type="text" name="name" id="name">
          </label>
          <label for="email">
            <span>Email</span>
            <input type="email" name="email" id="email">
          </label>
          <label for="phone">
            <span>Phone</span>
            <input type="number" name="phone" id="phone" autocomplete="off">
          </label>
          <button class="checkout-button disabled" type="submit" id="checkout-button" value="checkout">Chcekout</button>
        </form>
      </div>
    </div>
    <!-- Shopping Cart end -->

  </nav>
  <!-- Navbar end -->

  <!-- Hero Section start -->
  <section class="hero" id="home">
    <div class="mask-container">
      <main class="content">
        <h1>Timeless Treasures</h1>
        <h1><span>Budget Pleasures</span></h1>
        <p><b><i>
        Destinasi utama bagi para pencari harta tanpa merogoh kocek dalam-dalam</i></b>
        </p>
        <a href="#products" class="cta">Pilih Sekarang</a>
      </main>
    </div>
  </section>
  <!-- Hero Section end -->

  <!-- About Section start -->
  <section id="about" class="about">
    <h2><span>Tentang</span> Kami</h2>

    <div class="row">
      <div class="about-img">
        <img src="../public/img/tentang-kami.jpg" alt="Tentang Kami">
      </div>
      <div class="content">
        <h3>Kenapa memilih Toko kami?</h3>
        <p>Kami adalah destinasi utama bagi para pencari harta tanpa merogoh kocek dalam-dalam. Di Toko Thrift kami, kami menawarkan pilihan pakaian, sepatu, dan aksesoris berkualitas tinggi dengan harga yang terjangkau. Setiap item yang kami tawarkan memiliki sejarah dan karakter unik yang akan memberi nilai tambah pada koleksi Anda.</p>
      </div>
    </div>
  </section>
  <!-- About Section end -->

  <!-- Menu Section start -->
  <!-- <section id="menu" class="menu">
    <h2><span>Menu</span> Kami</h2>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, repellendus numquam quam tempora voluptatum.
    </p>

    <div class="row">
      <div class="menu-card">
        <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Espresso -</h3>
        <p class="menu-card-price">IDR 15K</p>
      </div>
      <div class="menu-card">
        <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Capuccino -</h3>
        <p class="menu-card-price">IDR 25K</p>
      </div>
      <div class="menu-card">
        <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Latte -</h3>
        <p class="menu-card-price">IDR 20K</p>
      </div>
      <div class="menu-card">
        <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Espresso -</h3>
        <p class="menu-card-price">IDR 15K</p>
      </div>
      <div class="menu-card">
        <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Espresso -</h3>
        <p class="menu-card-price">IDR 15K</p>
      </div>
      <div class="menu-card">
        <img src="img/menu/1.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Espresso -</h3>
        <p class="menu-card-price">IDR 15K</p>
      </div>
    </div>
  </section> -->
  <!-- Menu Section end -->

  <!-- Products Section start -->
  <section class="products" id="products" x-data="products">
    <h2><span>Produk</span> Kami</h2>
    <p>Eksplorasi Koleksi Berharga: Penemuan Abadi, Harga Terjangkau</p>

    <div class="row">
      <template x-for="(item, index) in items" x-key="index">
        <div class="product-card">
          <div class="product-icons">
            <a href="#" @click.prevent="$store.cart.add(item)">
              <svg
                width="24"
                height="24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <use href="../public/img/feather-sprite.svg#shopping-cart" />
              </svg>
            </a>
            <a href="#" class="item-detail-button" @click.prevent="showDetails(item)">
              <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <use href="../public/img/feather-sprite.svg#eye" />
              </svg>
          </a>
          </div>
          <div class="product-image">
            <img :src="`../public/img/products/${item.img}`" :alt="item.name">
          </div>
          <div class="product-content">
            <h3 x-text = "item.name"></x-text></h3>
            <!-- <div class="product-stars">
              <svg
                width="24"
                height="24"
                fill="currentColor"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <use href="img/feather-sprite.svg#star" />
              </svg>
              <svg
                width="24"
                height="24"
                fill="currentColor"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <use href="img/feather-sprite.svg#star" />
              </svg>
              <svg
                width="24"
                height="24"
                fill="currentColor"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <use href="img/feather-sprite.svg#star" />
              </svg>
              <svg
                width="24"
                height="24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <use href="img/feather-sprite.svg#star" />
              </svg>
            </div> -->
            <div class="product-price"><span x-text="rupiah(item.price) "></span></div>
          </div>
        </div>
      </template>
    </div>
    <!-- Product details popup -->
    <div class="product-details-popup" x-show="selectedProduct" @click.away="selectedProduct = null">
      <div class="popup-content">
          <span class="close-button" @click="selectedProduct = null">&times;</span>
          <h2 x-text="selectedProduct ? selectedProduct.name : ''"></h2>
          <p x-text="selectedProduct ? rupiah(selectedProduct.price) : ''"></p>
          <!-- Add more details as needed -->
      </div>
  </div>

  </section>
  <!-- Products Section end -->

  <!-- Contact Section start -->
  <section id="contact" class="contact">
    <h2><span>Kontak</span> Kami</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, provident.
    </p>

    <div class="row">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.57311709235512!3d-6.903444341687889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1672408575523!5m2!1sen!2sid"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

      <form action="">
        <div class="input-group">
          <i data-feather="user"></i>
          <input type="text" placeholder="nama">
        </div>
        <div class="input-group">
          <i data-feather="mail"></i>
          <input type="text" placeholder="email">
        </div>
        <div class="input-group">
          <i data-feather="phone"></i>
          <input type="text" placeholder="no hp">
        </div>
        <button type="submit" class="btn">kirim pesan</button>
      </form>

    </div>
  </section>
  <!-- Contact Section end -->

  <!-- Footer start -->
  <footer>
    <div class="socials">
      <a href="#"><i data-feather="instagram"></i></a>
      <a href="#"><i data-feather="twitter"></i></a>
      <a href="#"><i data-feather="facebook"></i></a>
    </div>

    <div class="links">
      <a href="#home">Home</a>
      <a href="#about">Tentang Kami</a>
      <!-- <a href="#menu">Menu</a> -->
      <a href="#contact">Kontak</a>
    </div>

    <div class="credit">
      <p>Created by <a href="">Khilmi</a>. | &copy; 2024.</p>
    </div>
  </footer>
  <!-- Footer end -->

  <!-- Modal Box Item Detail start -->
  <div class="modal" id="item-detail-modal" x-data="products">
    <div class="modal-container">
      <a href="#" class="close-icon"><i data-feather="x"></i></a>
      <div class="modal-content">
        <img src="../public/img/products/1.jpg" alt="Product 1">
        <div class="product-content">
          <h3>Product 1</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, tenetur cupiditate facilis obcaecati
            ullam maiores minima quos perspiciatis similique itaque, esse rerum eius repellendus voluptatibus!</p>
          <!-- <div class="product-stars">
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star" class="star-full"></i>
            <i data-feather="star"></i>
          </div> -->
          <div class="product-price">IDR 30K <span>IDR 55K</span></div>
          <a href="#"><i data-feather="shopping-cart"></i> <span>add to cart</span></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Box Item Detail end -->

  <!-- Feather Icons -->
  <script>
    feather.replace()
  </script>

  <!-- My Javascript -->
  <script src="../public/js/script.js"></script>
  <!-- <script src="src/app.js"></script> -->
</body>

</html>