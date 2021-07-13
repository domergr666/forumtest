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
                                <h3 class="title-5 m-b-35">Отзывы</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <a href="<?=$realdir?>/admin/addotziv" style="color: white;"><i class="zmdi zmdi-plus"></i>Добавить отзыв</a>
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                    	<?
											$sql = "SELECT * FROM `otziv` ORDER BY `id` DESC";
											$result = $mysqli->query($sql);
											$rows = $result->num_rows;
											if($rows > 0)
											{
												for ($i; $i < $rows; $i++)
												{
													$result->data_seek($i);
													$server = $result->fetch_assoc();

													$tableresult .=
													'<tr class="tr-shadow">
                                            		    <td>'.$server['id'].'</td>
                                            		    <td>'.$server['name'].'</td>
                                                        <td>'.$server['stars'].'</td>
                                                        <td><button type="submit" id="showotziv" data-id="'.$server['id'].'" class="btn btn-primary btn-sm">Показать</button></td>
                                                        <td>
                                            		    <div class="deleteotziv" data-id="'.$server['id'].'">
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
                                                <th>Ник</th>
                                                <th>Оценка (1-5)</th>
                                                <th>Текст</th>
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
$(document).on( 'click', '#showotziv', function() {
    var ID = $(this).data("id")
    $.ajax({
        url: '<?=$realdir?>/adminpanel/ajax/showotziv.php',
        type: 'POST',
        dataType: "text",
        data: {id: ID},
        success: function(data){
            data = $.parseJSON(data);
            swal(data.title,  data.message,  data.status);
        }
    });
});
$(document).on( 'click', '.deleteotziv', function() {
    swal({
        title: "Удалить отзыв?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["Отмена", "Удалить"],
    })
    .then((willDelete) =>{
        if (willDelete) {
            var ID = $(this).data("id")
            $.ajax({
                url: '<?=$realdir?>/adminpanel/ajax/deleteotziv.php',
                type: 'POST',
                dataType: "text",
                data: {id: ID},
                success: function(data){
                    window.location.href = "<?=$realdir?>/admin/otziv";
                }
            });
        }
    });
});
</script>
