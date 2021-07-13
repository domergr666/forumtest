<?php
if(!defined("moonstudio")) return header("Location: /");
?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Добавление отзыва</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form method="post" id="addotziv" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Ник</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Оценка (1-5)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" name="stars" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Текст</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea type="text" name="text" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-cogs"></i> Добавить
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$('#addotziv').ajaxForm({
    url: '<?=$realdir?>/adminpanel/ajax/addotziv.php',
    dataType: 'text',
    success: function(data) {
        data = $.parseJSON(data);
        swal(data.title,  data.message,  data.status);
        if(data.status == "success")
        {
            setTimeout(function () {
                window.location.href = "<?=$realdir?>/admin/otziv";
            }, 1500);
        }
    },
});
</script>
