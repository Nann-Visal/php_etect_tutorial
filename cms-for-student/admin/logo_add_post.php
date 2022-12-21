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
                                        <select name="show_on_addpost" class="form-select">
                                            <option value="header">Header</option>
                                            <option value="footer">Footer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thumbnail <small style="color:orange;">(Recommend : 300x80 for Header & 120x120 for Footer )</small></label>
                                        <input name="thumbnail_addpost" type="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="btn_add_logo" class="btn btn-success">Add</button>
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