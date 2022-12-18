<?php
session_start();
include "connection.php";
include "header.php";

?>

<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Books Info</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form name="form1" action="" method="POST" class="col-sm-6" enctype="multipart/form-data">

                            <table class="table table-bordered">
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Book name" name="books_name" required""></td>
                                </tr>
                                <tr>
                                    <td><input type="file" class="form-control" placeholder="Username" name="books_image" required""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Author name" name="books_author_name" required""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Publication name" name="books_publication_name" required""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Purchase date" name="books_purchase_date" required""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Book price" name="books_price" required""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Book quantity" name="books_qty" required""></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Available quantity" name="available_qty" required""></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="btn btn-primary submit" placeholder="Book quantity" name="submit1" value="insert books details"></td>
                                </tr>
                            </table>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


<?php

if (isset($_POST["submit1"])) {
    $tm = md5(time());
    $fnm = $_FILES["f1"]["name"];
    $dst = "./books_image/" . $tm . $fnm;
    $dst1 = "./books_image/" . $tm . $fnm;
    move_uploaded_file($_FILES["f1"]["tmp_name"], $dst);

    mysqli_query($link, "INSERT INTO `add_books` ( `books_name`, `books_image`, `books_author_name`, `books_publication_name`, `books_purchase_date`, `books_price`, `books_qty`, `available_qty`, `librarian_username`) VALUES ( '$_POST[books_name]', '$dst1]', '$_POST[books_author_name]', '$_POST[books_publication_name]', '$_POST[books_purchase_date]', '$_POST[books_price]', '$_POST[books_qty]', '$_POST[available_qty]', ' $_SESSION[librarian]')");


    ?>
<script type="text/javascript">
    alert("Book inserted successfully");
</script>
<?php
}

    ?>
<br>
<?php
include "footer.php";
?>