<?php
if(isset($_POST["submit"]))
{
	echo "<pre>";
	print_r($_POST);
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jquery Data Tables</title>
<script src="jquery.min.js"></script>
<script type="text/javascript">
function fnAddSubChild(parent_id)
{
	var child_hidden_id = jQuery("#child_hidden_id_"+parent_id).val();
	var ajaxURL = "ajax.php?child_id="+child_hidden_id+"&parent_id="+parent_id;
	jQuery.ajax({
		type: "GET",
		url: ajaxURL,
		success: function(result)
		{
			var newchildid = ++child_hidden_id;
			jQuery("#child_hidden_id_"+parent_id).val(newchildid);
			jQuery('#response_child_'+parent_id).append(result);
		}
	});
}

function fnRemoveChild(parent_id,child_id)
{
	jQuery("#new_child_"+parent_id+"_"+child_id).remove();
}

function fnAddRecords()
{
	var new_tr_id = jQuery("#new_tr_id").val();
	var ajaxURL = "ajax.php?tr_id="+new_tr_id;
	jQuery.ajax({
			type: "GET",
			url: ajaxURL,
			success: function(result)
			{
				jQuery("#new_tr_id").val(++new_tr_id);
				jQuery('#table_id').append(result);
			}
	});
}

function fnRemove(tr_id)
{
	jQuery("#tr_"+tr_id).remove();
}
</script>
</head>

<body>
<form name="frm" method="post" action="index.php">
	<input type="hidden" name="new_tr_id" id="new_tr_id" value="2" />
	<a onclick="fnAddRecords()">Add a record</a>
	<table cellpadding="1" cellspacing="1" border="0" id="table_id">
    	<tr class="tr" id="tr_1">
        	<td>
                <div class="artist">
                    Child Hidden : <input type="hi dden" id="child_hidden_id_1" value="1" />
                    Artist Name : <input type="text" name="artist_name[1]"/>
                    Act Size : <select name="act_size[1]">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    Description : <textarea name="description[1]"></textarea>
                    <a onclick="fnAddSubChild(1)">Add Child</a>
                    <div class="response_child" id="response_child_1"></div>
                </div>
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" id="submit" value="Save" />
</form>
</body>
</html>