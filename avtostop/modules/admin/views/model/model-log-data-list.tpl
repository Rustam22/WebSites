<style type="text/css">
    .display_block {
        display: block !important;
    }
    .display_none {
        display: none !important;
    }
    .window {
        max-width: 1000px;
    }
    .search-block {
        margin: 6px;
    }
    .search-block select {
        margin-left: 5px;
        width: 160px;
        height: 28px;
        padding: 3px;
        border-radius: 3px;
        border: 1px solid #b6b3b3;
    }
</style>



<script type="text/javascript">
    $(document).ready(function() {
        var DATA = '';
        var url = app.url + "/logs/getAll";
        url = url.replace("admin/", "");

        $(".search-block button:first").click(function() {
                var side =  $(".search-block #side").val();
                var email = $(".search-block input[name='email']").attr("value").trim();
                var phone = $(".search-block input[name='phone']").attr("value").trim();
                var date1 = $(".search-block input[name='date12']").attr("value").trim().substr(0, 10);
                var date2 = $(".search-block input[name='date12']").attr("value").trim().substr(14, 24);
                var status = "false";

                if(date1.length == 0) {
                    status = "false";
                } else {
                    status = "true";
                }

                ajaxRequest(url, email, phone, date1, date2, side, status);
                $('.data-results-add table tbody tr:not(:first-child)').remove();
                appendDataResults();
                nextEffect();
        });
        $(".search-block button:last").click(function() {
            $(".search-block input[name='email']").attr("value", '');
            $(".search-block input[name='phone']").attr("value", '');
            preEffect();
        });

        function ajaxRequest(url, email, phone, date1, date2, side, status) {
            $.ajax({
                type: 'post',
                url:  url,
                async: false,
                data: 'email=' + email + '&phone=' + phone + '&date1=' + date1 + '&date2=' + date2 + '&side=' + side + '&status=' + status,
                dataType: 'json',
                success: function(data) {
                    DATA = JSON.parse(JSON.stringify(data));
                    console.log(DATA);
                },
                error: function (status) {
                    alert("Error Connection");
                }
            });
        }
        function appendDataResults() {
            for(var i = 0; i < DATA.length; i++) {
                var txt = "<tr class='model-data-list-tr model-data-list-tr-bg'><td></td>" +
                          "<td>" + DATA[i].side + "</td>" +
                          "<td>" + DATA[i].name + "</td>" +
                          "<td>" + DATA[i].email + "</td>" +
                          "<td>" + DATA[i].mobile + "</td>" +
                          "<td>" + DATA[i].eventType + "</td>" +
                          "<td>" + DATA[i].date + "</td>" +
                          "<td>" + DATA[i].adminUser + "</td>" +
                          "<td><a href='javascript:void(0);' class='new-window table-action' title='{$messages.interface_common.edit}' reload-parent='1' have-parent='1' data-url='{$app_url}/{$admin_title}/edit/2/" + DATA[i].id + "'><img src='{$static_url}/{$theme_folder}/img/edit-icon-dark.png' /></a></td>" +
                          "<td></td></tr>";
                $(".data-results-add table tbody").append(txt);
            }
        }
        function nextEffect() {
            $(".data-field").slideUp(400);
            $(".paginator-container").slideUp(400);
            $(".data-results-add").removeClass("display_none");
            $(".data-results-add").addClass("display_block");
            $(".data-results-add").animate({
                height: '100%'
            });
        }
        function preEffect() {
            $(".data-field").slideDown(400);
            $(".paginator-container").slideDown(400);
            $(".data-results-add").removeClass("display_block");
            $(".data-results-add").addClass("display_none");
            $(".data-results-add").animate({
                height: '0px'
            });
        }
    })
</script>

<link rel="stylesheet" href="{$app_url}/client/date-interval/daterangepicker.css" />
        <script src="{$app_url}/client/date-interval/jquery-1.5.1.min.js"></script>
        <script src="{$app_url}/client/date-interval/moment.min.js"></script>
        <script src="{$app_url}/client/date-interval/jquery.daterangepicker.js"></script>
<script src="{$app_url}/client/date-interval/demo.js"></script>

<div class="search-block">
   <p>Axtarış: </p>
    <select style="float: left;" id="side">
        <option value="" selected>Tərəf</option>
        <option value="Lsim">Lsim</option>
        <option value="Admin">Admin User</option>
        <option value="Site">Site User</option>
    </select>
   <input type="text" name="email" placeholder="Email:">
   <input type="text" name="phone" placeholder="Phone:">
    <input type="text" name="date12" id="date-range0" size="40" value="" placeholder="Tarix, müddət:">
    <button id="search">Axtar</button>
   <button>Təmizlə</button>
</div>
<div style="clear: both;"></div>

<div class="data-field">
    <table cellpadding="0" cellspacing="0" class="model-list-table">
        <tr class="model-data-list-tr model-data-list-head-tr">
            <td>{*
			<!--
			<div id="checkbox-controller-{$model_id}">
				<div class="checkbox-controller-container check-all" val="1" key="check">
					<div class="checkbox-controller-icon"></div>
					<div class="checkbox-controller-title"></div>
					<div class="clear"></div>
					<input type="checkbox" class="delete-id hide" item-id="{$field_item}" />
				</div>
			</div>
			<script>
				new CheckBoxController('#checkbox-controller-{$model_id}');
			</script>
			-->*}
            </td>
            {foreach from=$table_headers.title item=h}
                <td>
                    {$h}
                </td>
            {/foreach}
            <td></td>
        </tr>
        {foreach from=$table_content.fields item=f name=table_content}
            <tr class="model-data-list-tr {if ($smarty.foreach.table_content.index % 2 == 0)}model-data-list-tr-bg{/if}">
                {foreach from=$f item=field_item name=field_item_foreach}
                    {if ($smarty.foreach.field_item_foreach.first)}
                        <td id="checkbox-container-{$smarty.foreach.table_content.index}-{$model_id}" class="model-data-list-checkbox-td" >
                            <div class="checkbox-controller-container" val="1" key="check">
                                <div class="checkbox-controller-icon"></div>
                                <div class="checkbox-controller-title"></div>
                                <div class="clear"></div>
                                <input type="checkbox" class="delete-id hide" item-id="{$field_item}" />
                            </div>
                            <script>
                                (new CheckBoxController('#checkbox-container-{$smarty.foreach.table_content.index}-{$model_id}')).onCheck(showDeleteButton).onUnCheck(hideDeleteButton);
                            </script>
                        </td>
                    {else}
                        <td>
                            {$field_item}
                        </td>
                    {/if}
                    {if ($smarty.foreach.field_item_foreach.last)}
                        <td>
                            <a href="javascript:void(0);" class="new-window table-action" title="{$messages.interface_common.edit}" reload-parent="1" have-parent="1" data-url="{$app_url}/{$admin_title}/edit/{$model_id}/{$f.id}" >
                                <img src="{$static_url}/{$theme_folder}/img/edit-icon-dark.png" />
                            </a>
                        </td>
                    {/if}
                {/foreach}
            </tr>
        {/foreach}
    </table>
</div>
<div class="data-results-add" style="height: 0px; display: none;">
    <table cellpadding="0" cellspacing="0" class="model-list-table">
        <tbody>
            <tr class="model-data-list-tr model-data-list-head-tr">
                <td></td>
                <td>Tərəf</td>
                <td>Adı</td>
                <td>E-mail</td>
                <td>Mobil</td>
                <td>Əməliyyat Növü</td>
                <td>Tarix</td>
                <td>Admin(adı və email)</td>
                <td></td><td></td>
            </tr>

        </tbody>
    </table>
</div>

