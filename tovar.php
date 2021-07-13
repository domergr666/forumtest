<?php
if(!defined("moonstudio")) return header("Location: /");
?>


			<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Товары</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <a href="<?=$realdir?>/admin/addtovar" style="color: white;"><i class="zmdi zmdi-plus"></i>Добавить товар</a>
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                    	<?
											$sql = "SELECT * FROM `tovari` ORDER BY `id` DESC";
											$result = $mysqli->query($sql);
											$rows = $result->num_rows;
											if($rows > 0)
											{
												for ($i; $i < $rows; $i++)
												{
													$result->data_seek($i);
													$tovar = $result->fetch_assoc();

													$tableresult .=
													'<tr class="tr-shadow">
                                            		    <td>'.$tovar['id'].'</td>
                                            		    <td>'.$tovar['name'].'</td>
                                                        <td>'.$tovar['code'].'</td>
                                            		    <td>'.$tovar['price'].'</td>
                                                        <td>'.$tovar['category'].'</td>
                                                        <td>'.$tovar['server'].'</td>
                                                        <td>
                                            		    <div class="deletetovar" data-id="'.$tovar['id'].'">
                                                            <div class="table-data-feature">
                                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Удалить">
                                                                    <i class="zmdi zmdi-delete"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        </td>
                                            		</tr>
                                            		<tr class="spacer"></tr>';
												}
											}
                                        ?>
                                        <? if($rows > 0) echo
                                        '<thead>
                                            <tr>
                                                <th>Номер (ID)</th>
                                                <th>Название</th>
                                                <th>Название для выдачи на сервере</th>
                                                <th>Цена</th>
                                                <th>Категория</th>
                                                <th>Сервер</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	'.$tableresult.'
                                        </tbody>';
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
$(document).on( 'click', '.deletetovar', function() {
    swal({
        title: "Удалить товар?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Отмена", "Удалить"],
    })
    .then((willDelete) =>{
        if (willDelete) {
            var ID = $(this).data("id")
            $.ajax({
                url: '<?=$realdir?>/adminpanel/ajax/deletetovar.php',
                type: 'POST',
                dataType: "text",
                data: {id: ID},
                success: function(data){
                    window.location.href = "<?=$realdir?>/admin/tovar";
                }
            });
        }
    });
});
</script>
