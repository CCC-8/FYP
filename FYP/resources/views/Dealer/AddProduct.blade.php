<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dealer</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="DealerAssets/img/favicon.png" rel="icon">
    <link href="DealerAssets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/DealerAssets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/DealerAssets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/DealerAssets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/DealerAssets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/DealerAssets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/DealerAssets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/DealerAssets/css/style3.css" rel="stylesheet">

</head>

<body>
    @php $loggedInUser = session('loggedInUser'); @endphp

    <!-- ======= Add Product Section ======= -->
    <section id="addProduct" class="contact mt-5 mb-5">
        <div class="container">

            <div class="section-title">
                <h2>Products</h2>
                <p>Add Product</p>
            </div>

            <form action="/AddNewProduct" method="post" class="php-email-form mt-4" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4 mb-3" data-aos="fade-right">
                        <img src="" class="img-fluid" id="productPreviewImage"
                            style="object-fit: contain; width: 270px; height: 270px; transform: translate3d(0, 0, 1px);">
                        <h6 class="pt-3">Upload a product image...</h6>
                        <input type="file" id="productImageInput" name="product_image" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Product Name / Model">
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <select class="form-control" name="type"
                            style="border-radius: 0; box-shadow: none; font-size: 14px; background: rgba(255, 255, 255, 0.08); border: 0; transition: 0.3s; color: rgba(255, 255, 255, 0.3); padding: 10px 15px;">
                            <option selected disabled>Product Type</option>
                            <option value="Vehicle">Vehicle</option>
                            <option value="Tyre">Tyre</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 form-group">
                        <select class="form-control" name="condition"
                            style="border-radius: 0; box-shadow: none; font-size: 14px; background: rgba(255, 255, 255, 0.08); border: 0; transition: 0.3s; color: rgba(255, 255, 255, 0.3); padding: 10px 15px;">
                            <option selected disabled>Condition</option>
                            <option value="Good">Good</option>
                            <option value="Defected">Defected</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <select class="form-control" name="status"
                            style="border-radius: 0; box-shadow: none; font-size: 14px; background: rgba(255, 255, 255, 0.08); border: 0; transition: 0.3s; color: rgba(255, 255, 255, 0.3); padding: 10px 15px;">
                            <option selected disabled>Status</option>
                            <option value="Available">Available</option>
                            <option value="Reserved">Reserved</option>
                            <option value="Received">Received</option>
                            <option value="Returned">Returned</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="description" rows="3" placeholder="Product Description"></textarea>
                </div>
                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Add Product</button>
                    <a href="/DealerIndex"><button class="btn btn-danger m-4"
                            style="padding: 10px 30px;">Discard</button></a>
                </div>
            </form>
        </div>
    </section><!-- End Add Product Section -->

    <script>
        document.getElementById('productImageInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('productPreviewImage').src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
