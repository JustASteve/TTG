<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Client</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css'>

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        body {
            overflow-x: hidden;
            height: 100vh;
        }

        .nopadding {
            padding: 0 !important;
            margin: 0 !important;
        }

        .main-row,
        .setting {
            height: 100vh;
            overflow-y: scroll;
        }

        .row {
            overflow-y: scroll;
        }

        .head-nav {
            padding-left: 10px;
            background-color: lightcyan;
            height: 60px;
            line-height: 60px;
            font-size: 40px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .side-nav {
            background-color: #343A40;
            overflow-y: scroll;
            height: 100%;
            overscroll-behavior: contain;
        }

        #content {
            background-color: lightblue;
            overflow-y: scroll;
            overscroll-behavior: contain;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding-left: 10px;
            padding-right: 5px;
        }

        nav ul li a {
            display: block;
            padding: 10px 15px;
            color: #fff;
            text-decoration: none;
            -webkit-transition: 0.2s linear;
            -moz-transition: 0.2s linear;
            -ms-transition: 0.2s linear;
            -o-transition: 0.2s linear;
            transition: 0.2s linear;
        }

        nav ul li a:hover {
            background: #1d4f71;
            color: #fff;
        }

        nav ul li a .fa {
            width: 16px;
            text-align: center;
            margin-right: 0px;
            float: right;
        }

        .fa-caret-down,
        .fa-caret-up {
            padding-top: 5px;
        }

        nav ul ul {
            background: rgba(0, 0, 0, 0.2);
        }

        nav ul li ul li a {
            border-left: 4px solid transparent;
            padding: 10px 20px;
        }

        nav ul li ul li a:hover {
            border-left: 4px solid #3498db;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            width: 20rem;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            margin-top: 10px;
        }

        .card-img-actions {
            position: relative;
        }

        .card-body {
            flex: 1 1 auto;
            text-align: center;
            padding: 5px;
        }

        .card-img {
            width: 200px;
            height: 200px;
        }

        .star-gray {
            color: gray;
        }

        .star-yellow {
            color: yellow;
        }

        .bg-cart {
            background-color: lightseagreen;
            color: #fff;
        }

        .bg-cart:hover {
            color: #fff;
        }

        .bg-stock {
            background-color: #0f0;
            color: black;
        }

        .bg-trash {
            background-color: red;
            color: black;
        }

        .bg-buy {
            background-color: green;
            color: #fff;
            padding-right: 29px;
        }

        .bg-buy:hover {
            color: #fff;
        }

        a {
            text-decoration: none !important;
        }

        .btn-label {
            position: relative;
            left: -12px;
            display: inline-block;
            padding: 6px 12px;
            background: rgba(0, 0, 0, 0.15);
            border-radius: 3px 0 0 3px;
        }

        .btn-labeled {
            padding-top: 0;
            padding-bottom: 0;
        }

        .search {
            position: relative;
            /* box-shadow: 0 0 40px rgba(51, 51, 51, .1); */
            top: 10px;
        }

        .search input {
            height: 40px;
            text-indent: 20px;
            border: 2px solid;
        }

        .search input:focus {
            box-shadow: none;
            border: 2px solid blue;
        }

        .search .fa-search {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .search button {
            position: absolute;
            top: 0px;
            right: 0px;
            height: 40px;
            width: 70px;
            background: blue;
            font-size: 15px;
            border: 2px solid black;
            border-radius: 0 5px 5px 0;
        }

        .input-error {
            outline: 1px solid red;
        }
    </style>
</head>

<body style="background-color: lightgreen;">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

    <!-- Others -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <form id="form-tambah"> -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Barang">
                        <label>Harga Barang</label>
                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Barang" value="0" min="0">
                        <label>Deskripsi Barang</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Barang">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="submit-tambah" form="form-tambah">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control" placeholder="Cari barang..." id="searchBarang">
                <button class="btn btn-primary" id="cariButton">Cari</button>
            </div>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-labeled btn-success" id="btnAdd" data-toggle="modal" data-target="#addModal" style="margin-top: 12px;">
                <span class="btn-label"><i class="fa fa-plus"></i></span>Tambah Barang
            </button>
        </div>
        </span>
    </div>
    <div class="row">
        @foreach($barangs as $barang)
        <div class="col-md-3 mt-2">
            <div class="card">
                <div class="card-body" onclick="view(<?= $barang['id'] ?>)">
                    <div class="card-img-actions">
                        <img src="https://i.ebayimg.com/images/g/cqUAAOSwTbxhLKRf/s-l1200.jpg" class="card-img img-fluid" width="96" height="350" alt="">
                    </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2">
                            <a href="#" class="text-default mb-2" data-abc="true" onclick="view(<?= $barang['id'] ?>)">{{$barang['nama']}}</a>
                        </h6>
                        <a href="#" class="text-muted" data-abc="true">Smartphone</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">Rp {{number_format($barang['harga'],2,',','.')}}</h3>
                    <div>
                        <i class="fa fa-star star"></i>
                        <i class="fa fa-star star"></i>
                        <i class="fa fa-star star"></i>
                        <i class="fa fa-star star"></i>
                    </div>
                    <div class="text-muted mb-3">34 reviews</div>
                    <button type="button" class="btn bg-stock" onclick="update(<?= $barang['id'] ?>)" style="margin-bottom: 3px;"><i class="fa fa-pencil mr-2"></i> Edit</button>
                    <form action="/delete" method="post" style="width: auto;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="<?= $barang['id'] ?>">
                        <button type="submit" class="btn bg-trash"><i class="fa fa-trash mr-2"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
<script>
    function view(id) {
        window.location.href = 'http://127.0.0.1:8080/view/' + id;
    }

    function edit(id) {
        window.location.href = 'http://127.0.0.1:8080/edit/' + id;
    }
    // function del(id) {
    //     window.location.href = 'http://127.0.0.1:8080/hapus/' + id;
    // }

    $(function() {
        $("#searchBarang").keypress(function(e) {
            if (e.keyCode == 13) {
                var value = $(this).val().toLowerCase();
                $(".card").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            }
        });

        $("#cariButton").click(function() {
            var value = $("#searchBarang").val().toLowerCase();
            $(".card").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        })

        $('#submit-tambah').click(function(e) {
            e.preventDefault();

            let formData = {
                nama: $('#nama').val(),
                harga: $('#harga').val(),
                deskripsi: $('#deskripsi').val(),
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                    type: "POST",
                    url: "/tambah",
                    data: formData,
                    // dataType: "json",
                    // encode: true,
                })
                .done(function(data, textStatus, xhr) {
                    alert("Sukses menambah barang!");
                    location.reload(true);
                })
                .fail(function(xhr, textStatus) {
                    alert(xhr.status + '-' + textStatus);
                });
        });
    });
</script>

</html>