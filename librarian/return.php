<?php
include "connection.php";
$id = $_GET["id"];
$a = date("d-m-Y");
$res = mysqli_query($link, "update issue_books set books_return_date='$a' where id=$id;");


?>
 <script type="text/javascript">
                        alert("Books issued successfully");
                       
                        </script>

                        <?php
                        header('Location: return_book.php');
                        ?>