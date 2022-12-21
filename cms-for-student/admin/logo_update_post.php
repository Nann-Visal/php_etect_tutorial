<?php 
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Webside Logo</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Show On</label>
                                        <select name="show_on_updatepost" class="form-select">
                                            <option value="header">Header</option>
                                            <option value="footer">Footer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thumbnail <small style="color:orange;">(Recommend : 300x80 for Header & 120x120 for Footer )</small></label>
                                        <input name="thumbnail_updatepost" type="file" class="form-control">
                                        <?php
                                            $con=new mysqli('','root','','cms_web2');
                                            $post_id = $_GET['id'];
                                            $sql = "
                                                SELECT thumbnail FROM tbl_logo WHERE id = '$post_id'
                                            ";
                                            $res = $con->query($sql);
                                            $row = mysqli_fetch_assoc($res);
                                            $thumbnail = $row['thumbnail'];
                                        ?>
                                        <img src="assets/icon/<?php echo $thumbnail ?>" alt="">
                                        <input name="old_thumbnail" type="hidden" value="<?php echo  $thumbnail ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="btn_update_logo" class="btn btn-success">Update</button>
                                        <a href="" class="btn btn-danger">Concel</a>
                                    </div>
                                </form>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>