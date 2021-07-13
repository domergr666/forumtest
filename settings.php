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
                                        <strong>Настройки сайта</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form method="post" id="settings" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Название сайта</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="ServerName" value="<? echo $config['ServerName']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Оповещение</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="Notify" value="<? echo $config['Notify']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Группа ВКонтакте</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="VkGroup" value="<? echo $config['VkGroup']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Youtube</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="Youtube" value="<? echo $config['Youtube']; ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Publickey из UnitPay</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="MerchantID" value="<? echo $config['MerchantID']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Секретное слово из UnitPay</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="SecretWord" value="<? echo $config['SecretWord']; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    	<div class="card-footer">
                                    	    <button type="submit" class="btn btn-primary btn-sm">
                                    	        <i class="fas fa-cogs"></i> Сохранить
                                    	    </button>
                                    	</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$('#settings').ajaxForm({
	url: '<?=$realdir?>/adminpanel/ajax/settings.php',
	dataType: 'text',
	success: function(data) {
        data = $.parseJSON(data);
        swal(data.title,  data.message,  data.status);
	},
});
</script>
