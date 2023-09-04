<?php include_once 'admin_header.php'; ?>

<div class="sidebar_content def_padding">


<h1>Songs </h1><br>

<table id="example" class="display" style="width:100%">
    <thead>
        <tr style="text-align: left;">
            <th>Sr__id</th>
            <th>Song Name</th>
            <th>Thumbnail</th>
            <th>Language</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1 ___ 2</td>
            <td>
                <div class="name_div">
                    <p>Yohovah hi karuna nidhan</p>
                    <span><small>2016</small></span>

                </div>
            </td>
            <td>
                <div class="thumbnail">
                    <img width="100%" src="<?= BASEURL ?>/admin/assets/img/Screenshot (1).png" alt="Thumbnail" />
                </div>
            </td>
            <td>Hindi</td>
            <td>2017 songs</td>
            <td><a href="edit.html"> <i class="fa-regular fa-pen-to-square"></i> Edit </a> &nbsp; &nbsp;
                <a href="edit.html"> <i class="fa-regular fa-trash-can"></i> Delete </a>
            </td>
        </tr>
        <tr>
            <td>1 ___ 2</td>
            <td>
                <div class="name_div">
                    <p>Yohovah hi karuna nidhan</p>
                    <span><small>2016</small></span>

                </div>
            </td>
            <td>
                <div class="thumbnail">
                    <img width="100%" src="<?= BASEURL ?>/admin/assets/img/Screenshot (1).png" alt="Thumbnail" />
                </div>
            </td>
            <td>Hindi</td>
            <td>2017 songs</td>
            <td><a href="edit.html"> <i class="fa-regular fa-pen-to-square"></i> Edit </a> &nbsp; &nbsp;
                <a href="edit.html"> <i class="fa-regular fa-trash-can"></i> Delete </a>
            </td>
        </tr>
        <tr>
            <td>1 ___ 2</td>
            <td>
                <div class="name_div">
                    <p>Yohovah hi karuna nidhan</p>
                    <span><small>2016</small></span>

                </div>
            </td>
            <td>
                <div class="thumbnail">
                    <img width="100%" src="<?= BASEURL ?>/admin/assets/img/Screenshot (1).png" alt="Thumbnail" />
                </div>
            </td>
            <td>Hindi</td>
            <td>2017 songs</td>
            <td><a href="edit.html"> <i class="fa-regular fa-pen-to-square"></i> Edit </a> &nbsp; &nbsp;
                <a href="edit.html"> <i class="fa-regular fa-trash-can"></i> Delete </a>
            </td>
        </tr>

        <!-- Add more rows as needed -->
    </tbody>
</table>


</div>
</div>

</div>

<script>
$(document).ready(function () {
$('#example').DataTable({
"pageLength": 10
});
});
</script>

<?php include_once 'admin_footer.php';?>






















