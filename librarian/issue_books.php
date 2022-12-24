<?php
include "header.php";
include "connection.php";
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
                        <h2>Issue book</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="" method="POST" name="form1">
                            <table>
                                <tr>

                                    <td>
                                        <select name="enr" class="form-control selectpicker" style="margin: 3px;">
                                            <?php
                                            $res = mysqli_query($link, "SELECT enrollment FROM `student_registration` ");

                                            while ($row = mysqli_fetch_array($res)) {
                                                echo "<option>";
                                                echo $row["enrollment"];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="submit" value="search" name="submit1" class="form-control btn btn-primary m-3" style="margin: 3px; margin-left: 3px;">
                                    </td>
                                </tr>

                            </table>

                            <?php

                            if (isset($_POST["submit1"])) {
                                $res1 = mysqli_query($link, "select * from student_registration where enrollment='$_POST[enr]'");

                                while ($row1 = mysqli_fetch_array($res1)) {

                                    $firstname = $row1["firstname"];
                                    $lastname = $row1["lastname"];
                                    $susername = $row1["username"];
                                    $email = $row1["email"];
                                    $contact = $row1["contact"];
                                    $sem = $row1["sem"];
                                    $enrollments = $row1["enrollment"];
                                }
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Enrollment number" name="enrollment" value="<?php echo $enrollments; ?>"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Student name" name="s_name" value="<?php echo $firstname . ' ' . $lastname; ?>"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Student sem" name="s_sem" value="<?php echo "$sem"; ?>"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Student contact" name="s_contact" value="<?php echo "$contact"; ?>"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Student email" name="s_email" value="<?php echo "$email"; ?>"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="booksname" class="form-control  selectpicker">

                                            <?php
                                $res = mysqli_query($link, "select books_name from add_books");
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<option>";
                                    echo $row["books_name"];
                                    echo "</option>";
                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Issue date" name="book_issue_date" value="<?php echo date("d-m-Y"); ?>">
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="User name" name="username" value="<?php echo $susername; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" class="form-control  btn btn-primary" name="submit2" value="Issue book">
                                    </td>
                                </tr>

                            </table>
                            <?php
                            }
                            ?>
                        </form>

                        <?php
                        if (isset($_POST["submit2"])) {
                            mysqli_query($link, "INSERT INTO `issue_books` (`student_enrollment`, `student_name`, `student_sem`, `student_contact`, `student_email`, `books_name`, `books_issue_date`, `books_return_date`, `student_username`) VALUES ( '$_POST[enrollment]', '$_POST[s_name]', '$_POST[s_sem]', '$_POST[s_contact]', '$_POST[s_email]', '$_POST[booksname]', '$_POST[book_issue_date]', ' ','$_POST[username]' )");

                           mysqli_query($link, "UPDATE add_books set available_qty=available_qty-1 where books_name='$_POST[booksname]'");



                        ?>
                        <script type="text/javascript">
                        alert("Books issued successfully");
                        window.location.href = window.location.href;
                        </script>
                        <?php

                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php
include "footer.php";
?>