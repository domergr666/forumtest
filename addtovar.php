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
                                        <strong>Добавление товаров</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form method="post" id="addtovar" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Название</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Название для выдачи на сервере</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="code" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Категория</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category" id="select" class="form-control">
                                                        <option value="0">Выберите категорию</option>
                                                    <?
                                                        $sql = "SELECT * FROM `category`";
                                                        $result = $mysqli->query($sql);

                                                        $rows = $result->num_rows;
                                                        if($rows > 0)
                                                        {
                                                            for($x = 0; $x < $rows; $x++)
                                                            {
                                                                $result->data_seek($x);
                                                                $category = $result->fetch_assoc();
                                                                echo '<option value="' .$category['name']. '">' .$category['name']. '</option>';
                                                            }
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Сервер</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="server" id="select" class="form-control">
                                                        <option value="0">Выберите сервер</option>
                                                    <?
                                                        $sql = "SELECT * FROM `servers`";
                                                        $result = $mysqli->query($sql);

                                                        $rows = $result->num_rows;
                                                        if($rows > 0)
                                                        {
                                                            for($x = 0; $x < $rows; $x++)
                                                            {
                                                                $result->data_seek($x);
                                                                $server = $result->fetch_assoc();
                                                                echo '<option value="' .$server['name']. '">' .$server['name']. '</option>';
                                                            }
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Цена</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" name="price" class="form-control" required>
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
$('#addtovar').ajaxForm({
    url: '<?=$realdir?>/adminpanel/ajax/addtovar.php',
    dataType: 'text',
    success: function(data) {
        data = $.parseJSON(data);
        swal(data.title,  data.message,  data.status);
        if(data.status == "success")
        {
            setTimeout(function () {
                window.location.href = "<?=$realdir?>/admin/tovar";
            }, 1500);
        }
    },
});
</script>
