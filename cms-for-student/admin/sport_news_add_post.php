<?php 
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Sport News</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input name="news_title" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>News Type</label>
                                        <select name="news_type" class="form-select">
                                            <option value="sport" selected>Sports</option>
                                            <option value="entertainment">Entertainment</option>
                                            <option value="socail">Socail</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="news_catogery" class="form-select">
                                            <option value="national" selected>National</option>
                                            <option value="international">International</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <input name="news_thumbnail" type="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Banner</label>
                                        <input name="news_banner" type="file" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="news_description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button name="acceptPublish" type="submit" class="btn btn-success">Publish</button>
                                        <a href="index.php" class="btn btn-danger">Cancel</a>
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